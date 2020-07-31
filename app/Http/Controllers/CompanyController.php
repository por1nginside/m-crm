<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use App\Traits\SaveImages;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use SaveImages;
    /**
     * Display a listing of the resource.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //$company = Company::orderBy('id', 'desc')->paginate(10);
        //10 entries per page, but we don't need that, because i'm using datatables. Main action in @getCompanies
        return view('company.companies');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('company.create-company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CompanyRequest $request)
    {
        $data = $request->all();

        if ($request->has('logo')) {
            $data['logo'] = $this->saveLogo($request->file('logo'));
        }

        $company = new Company;
        $company->create($data);

        return redirect()->back()->with('message', 'Successfully create!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);

        return view('company.show-company')->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('company.edit-company')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CompanyRequest $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->update($request->all());

        return redirect()->back()->with('message', 'Successfully update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->back()->with('message', 'Successfully delete!');
    }

    public function getCompanies(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'name',
            2 => 'email',
            3 => 'domain',
            4 => 'created',
            5 => 'action',
        ];

        $totalData = Company::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Company::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Company::count();
        } else {
            $search = $request->input('search.value');
            $posts = Company::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('domain', 'like', "%{$search}%")
                ->orWhere('created', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();


            $totalFiltered = Company::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('domain', 'like', "%{$search}%")
                ->orWhere('created', 'like', "%{$search}%")
                ->count();
        }

        $data = [];

        if ($posts) {
            foreach ($posts as $key) {
                $needleData['id'] = $key->id;
                $needleData['name'] = $key->name;
                $needleData['email'] = $key->email;
                $needleData['domain'] = $key->website;
                $needleData['created'] = $key->created_at;
                $needleData['action'] = view('layouts.buttons')
                    ->with([
                        'edit' => 'companies.edit',
                        'destroy' => 'companies.destroy',
                        'company' => $key->id,
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
