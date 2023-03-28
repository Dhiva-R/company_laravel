<?php

namespace App\Http\Controllers;
use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employees::paginate(10);
        return view('employees.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
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
            'FirstName' => 'required|max:255',
            'LastName' => 'required|max:255',
            'company_id' => 'required|max:255',
            'Email' => 'required|max:255',
            'Phone' => 'required|numeric',
        ]);
        $employee = Employees::create($storeData);
        return redirect('/employees')->with('completed', 'employee has been saved!');
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
        $employee = Employees::findorFail($id);
        return view('employees.edit', compact('employee'));
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
            'FirstName' => 'required|max:255',
            'LastName' => 'required|max:255',
            'company_id' => 'required|max:255',
            'Email' => 'required|max:255',
            'Phone' => 'required|numeric',
        ]);
        Employees::whereId($id)->update($updateData);
        return redirect('/employees')->with('completed', 'employee has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employees::findOrFail($id);
        $employee->delete();
        return redirect('/employees')->with('completed', 'employee has been deleted');
    }
}
