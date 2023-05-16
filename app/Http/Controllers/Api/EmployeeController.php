<?php

namespace App\Http\Controllers\Api;

use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class EmployeeController extends Controller
{
    public function index(){
        $employee=Employees::with('company')->get();
        if($employee->count()>0){
            return response()->json([
                'status'=>200,
                'employee'=>$employee
            ],200);
        }
        else{
            return response()->json([
                'status'=>404,
                'employee'=>'No Records Found'
            ],200);
        }

    }



    public function store(Request $request){

        $validator=Validator::make($request->all(),[
            'FirstName'=>'required|string|max:191|unique:employees',
            'LastName'=>'required|string|max:191',
            'company_id'=>'required|numeric|max:191',
            'Email'=>'required|email|max:191|unique:employees',
            'Phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:employees',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'error'=>$validator->messages()
            ],422);
        }
        else{
                $employee=Employees::create([
                    'FirstName'=> $request->FirstName,
                    'LastName'=> $request->LastName,
                    'company_id'=> $request->company_id,
                    'Email'=> $request->Email,
                    'Phone'=> $request->Phone,
                ]);

                if($employee){
                    return response()->json([
                        'status'=>200,
                        'message'=>"employee created successfully"
                    ],200);
                }else{
                    return response()->json([
                        'status'=>500,
                        'employee'=>"Something Wrong"
                    ],500);

            }

        }
    }

    public function show($id){

        $employee=Employees::find($id);
        if($employee){
            return response()->json([
                'status'=>200,
                'employee'=>$employee
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'employee'=>"Employee not found"
            ],404);
        }

    }



    public function update(Request $request ,int $id){

        $validator=Validator::make($request->all(),[
            'FirstName'=>'required|string|max:191',
            'LastName'=>'required|string|max:191',
            'company_id'=>'required|numeric|max:191',
            'Email'=>'required|email|max:191',
            'Phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'error'=>$validator->messages()
            ],422);
        }
        else{

            $employee=Employees::find($id);

            if($employee){
                $employee->update([
                    'FirstName'=> $request->FirstName,
                'LastName'=> $request->LastName,
                'company_id'=> $request->company_id,
                'Email'=> $request->Email,
                'Phone'=> $request->Phone,
                ]);

                return response()->json([
                    'status'=>200,
                    'message'=>"employee updated successfully"
                ],200);
            }else{
                return response()->json([
                    'status'=>404,
                    'employee'=>"employee not found "
                ],404);
            }
        }
    }

    public function destroy ($id){

        $employee=Employees::find($id);

        if($employee){

            $employee->delete();
            return response()->json([
                'status'=>200,
                'message'=>"employee deleted successfully"
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>"employee not found"
            ],404);
        }
    }
}
