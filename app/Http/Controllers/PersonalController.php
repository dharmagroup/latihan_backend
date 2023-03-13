<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PersonalController extends Controller
{
    public function getData(Request $request,$a,$b){
        return "ini halaman personal ini via api.php = $a + $b, name=". $request->get('name');
    }

    public function personal(Request $request){
        $data = Personal::all();
        return Response()->json([
            'status' => true,
            'data'   => $data,
        ],200,[],JSON_PRETTY_PRINT);
    }

    
    public function receiveDataFromPostMethod(Request $request){
        $fullname = $request->input('fullname');        
        $email = $request->input('email');
        $education = $request->input('education');       
        $data = [
            'fullname' => $fullname,
            'email' => $email,
            'education' => $education,
        ];

        $create = Personal::create($data);
        if($create){
            return Response()->json([
                'status' => true,
                'message'=> 'Successfully created'
            ], 200, [], JSON_PRETTY_PRINT);            
        }
        return Response()->json([
            'status' => false,
            'message'=> 'Unsuccessfully created'
        ], 200, [], JSON_PRETTY_PRINT);            

    }

    public function delete(Request $request, $id){
        $delete = Personal::find($id)->delete();
        if($delete){
            return Response()->json([
                'status' => true,
                'message'=> 'Successfully deleted'
            ], 200, [], JSON_PRETTY_PRINT);
        }
        return Response()->json([
            'status' => false,
            'message'=> 'Unsuccessfully deleted'
        ], 200, [], JSON_PRETTY_PRINT);

    }

    public function update(Request $request){
        $id = $request->input('id');        
        $fullname = $request->input('fullname');        
        $email = $request->input('email');
        $education = $request->input('education');       
        $data = [
            'fullname' => $fullname,
            'email' => $email,
            'education' => $education,
        ];            
        $save = Personal::where('id', $id)->update($data);
        if($save){
            return Response()->json(['status' => true,'message' => 'Success updated']);
        }
        return Response()->json(['status' => false,'message' => 'Failed to updated']);
    }
}
