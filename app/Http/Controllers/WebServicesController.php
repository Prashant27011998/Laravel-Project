<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Traits\PhpTrait;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Log;
class WebServicesController extends Controller
{
    use PhpTrait;
    public function display(){
        return response()->json(Post::get(),200);

    }
    public function create()
    {
        return view('forms.create');
    }

    public function save(Request $request){
        $validator=$this->verify($request);
      
        if ($validator->fails()){
            Log::info($request);
            // return response()->json([
            //     'status' => 1, 
            //     'message' => 'Email Failed',    
            // ],400);
            
            return response()->json($validator->errors());
            
            
        }
        else{


        $this->Savee($request); 
        $arr = array('msg' => 'Email Sent Successfully', 'status' => true);
        return response()->json($arr);
        // return response()->json([
        //         'status' => 0,
        //         'message' => 'Email Sent Successfully'
        //     ]);
            
        }

    }

}
