<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('company.companies');
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('company.create-company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $company = new Company;
        $company->create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
