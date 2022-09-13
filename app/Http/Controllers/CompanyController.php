<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        if ($request->hasFile('logo')) {
            $logo_path =    $request->file('logo')->store('logos', 'public');
        } else {
            $logo_path = null;
        }
        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' =>  $logo_path,
            'website' => $request->website,
        ]);

        return redirect()->route('companies.index')->with('success', 'You have successfully created the company');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        if ($request->hasFile('logo')) {
            $logo =    $request->file('logo')->store('logos', 'public');
        } else {
            $logo = $company->logo;
        }

        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' =>  $logo,
            'website' => $request->website,
        ]);

        return back()->with('success', 'You have successfully updated the company');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return back()->with('success', 'You have successfully deleted the company');
    }
}
