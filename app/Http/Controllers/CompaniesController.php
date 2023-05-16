<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Companies::paginate(2);
        return view('companies.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'Name' => 'required|max:255',
            'Address' => 'required|max:255',
            'Website' => 'required|max:255',
            'Email' => 'required|max:255',
        ]);
        $company = Companies::create($storeData);
        return redirect('/admin/company')->with('completed', 'company has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Companies::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'Name' => 'required|max:255',
            'Address' => 'required|max:255',
            'Website' => 'required|max:255',
            'Email' => 'required|max:255',
        ]);
        Companies::whereId($id)->update($updateData);
        return redirect('/admin/company')->with('completed', 'company has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Companies::findOrFail($id);
        $company->delete();
        return redirect('/admin/company')->with('completed', 'company has been deleted');
    }


}
