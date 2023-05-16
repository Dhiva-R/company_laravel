<?php

namespace App\Http\Controllers\Api;

use App\Models\Companies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class CompanyController extends Controller
{
    public function index(){

        $company=Companies::all();
        if($company->count()>0){
            return response()->json([
                'status'=>200,
                'company'=>$company
            ],200);
        }
        else{
            return response()->json([
                'status'=>404,
                'company'=>'No Records Found'
            ],200);
        }
    }

    public function store(Request $request){

        $validator=Validator::make($request->all(),[
            'Name'=>'required|string|max:191',
            'Address'=>'required|string|max:191',
            'Website'=>'required|string|max:191',
            'Email'=>'required|email|max:191',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'error'=>$validator->messages()
            ],422);
        }
        else{

            $company=Companies::create([
                'Name'=> $request->Name,
                'Address'=> $request->Address,
                'Website'=> $request->Website,
                'Email'=> $request->Email,
            ]);

            if($company){
                return response()->json([
                    'status'=>200,
                    'message'=>"company created successfully"
                ],200);
            }else{
                return response()->json([
                    'status'=>500,
                    'company'=>"Something Wrong"
                ],500);
            }
        }
    }


    public function show($id){

        $company=Companies::find($id);
        if($company){
            return response()->json([
                'status'=>200,
                'company'=>$company
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'company'=>"Company not found"
            ],404);
        }

    }




    public function update(Request $request ,int $id){

        $validator=Validator::make($request->all(),[
            'Name'=>'required|string|max:191',
            'Address'=>'required|string|max:191',
            'Website'=>'required|string|max:191',
            'Email'=>'required|email|max:191',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'error'=>$validator->messages()
            ],422);
        }
        else{

            $company=Companies::find($id);

            if($company){
                $company->update([
                    'Name'=> $request->Name,
                    'Address'=> $request->Address,
                    'Website'=> $request->Website,
                    'Email'=> $request->Email,
                ]);

                return response()->json([
                    'status'=>200,
                    'message'=>"company updated successfully"
                ],200);
            }else{
                return response()->json([
                    'status'=>404,
                    'company'=>"Company not found "
                ],404);
            }
        }
    }

    public function destroy ($id){

        $company=Companies::find($id);

        if($company){

            $company->delete();
            return response()->json([
                'status'=>200,
                'message'=>"company deleted successfully"
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>"company not found"
            ],404);
        }
    }
}
