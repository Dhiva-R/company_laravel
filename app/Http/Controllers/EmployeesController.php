<?php

namespace App\Http\Controllers;
use App\Mail\WelcomeMail;
use App\Models\Companies;
use App\Models\Employees;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use League\Csv\Writer;
use Symfony\Component\HttpFoundation\StreamedResponse;


class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $company=Companies::all();
        $employee = Employees::paginate(5);
        return view('employees.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companyname=Companies::all();

        return view('employees.create',['companyname'=>$companyname],compact('companyname'));

        // return view('employees.create');
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
            'Email' => 'required|email|unique:employees|max:255',
            'Phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);
        $employee = Employees::create($storeData);
        Mail::to($employee->Email)->send(new WelcomeMail($employee));
        return redirect('/admin/employees')->with('completed', 'employee has been saved!');
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
        $companyname=Companies::all();

        // return view('employees.create',compact('companyname'));
        $employee = Employees::findorFail($id);
        return view('employees.edit' ,['companyname'=>$companyname,'employee=>$employee'],compact('companyname','employee'));
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
            'Phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);
        Employees::whereId($id)->update($updateData);
        return redirect('/admin/employees')->with('completed', 'employee has been updated');
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
        return redirect('/admin/employees')->with('completed', 'employee has been deleted');
    }
    public function getCompanyName(Request $request){
        $companyname=Companies::where('Name',$request->Name)->get();

        return view('employees.create',['$companyname'=>$companyname]);
    }

     public function addNew(){
        $employee = new Employee();


       Mail::to($employees->email)->send(new WelcomeEmail($employee));
     }


     public function export()
     {
         $employees = Employees::all();

         $callback = function () use ($employees) {
             $csv = Writer::createFromFileObject(new \SplTempFileObject());
             $csv->insertOne(['FirstName','LastName','company' ,'Email','Phone', 'Created At']);

             foreach ($employees as $employee) {
                 $csv->insertOne([$employee->FirstName, $employee->LastName, $employee->company->Name,
                 $employee->Email,$employee->Phone ,$employee->created_at]);
             }

             $csv->output('employees.csv');
         };

         $headers = [
             'Content-Type' => 'text/csv',
             'Content-Disposition' => 'attachment; filename="employees.csv"',
         ];

         return new StreamedResponse($callback, 200, $headers);
     }


}
