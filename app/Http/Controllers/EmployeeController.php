<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('employee.employees');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('employee.create-employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmployeeRequest $request)
    {
        $data = $request->all();

        $employee = new Employee;
        $employee->create($data);

        return redirect()->back()->with('message', 'Successfully create!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        return view('employee.edit-employee')->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EmployeeRequest $request, $id)
    {
        $company = Employee::findOrFail($id);
        $company->update($request->all());

        return redirect()->back()->with('message', 'Successfully update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $company = Employee::findOrFail($id);
        $company->delete();

        return redirect()->back()->with('message', 'Successfully delete!');
    }

    public function getEmployees(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'first_name',
            2 => 'last_name',
            3 => 'email',
            4 => 'company_id',
            5 => 'phone',
            6 => 'created',
            7 => 'action',
        ];

        $totalData = Employee::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $employees = Employee::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Employee::count();
        } else {
            $search = $request->input('search.value');
            $employees = Employee::where('id', 'LIKE', "%{$search}%")
                ->orWhere('first_name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();


            $totalFiltered = Employee::where('id', 'LIKE', "%{$search}%")
                ->orWhere('first_name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->count();
        }

        $data = [];

        if ($employees) {
            foreach ($employees as $key) {
                $needleData['id'] = $key->id;
                $needleData['first_name'] = $key->first_name;
                $needleData['last_name'] = $key->last_name;
                $needleData['email'] = $key->email;
                $needleData['company_id'] = $key->company_id;
                $needleData['phone'] = $key->phone;
                $needleData['created'] = $key->created_at;
                $needleData['action'] = view('layouts.buttons')
                    ->with([
                        'edit' => 'employees.edit',
                        'destroy' => 'employees.destroy',
                        'entity' => $key->id,
                    ])
                    ->render();

                $data[] = $needleData;
            }
        }

        $jsonData = [
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        ];

        return response()->json($jsonData);
    }
}
