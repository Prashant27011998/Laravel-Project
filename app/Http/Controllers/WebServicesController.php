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
    public function save(Request $request){
        $validator=$this->verify($request);

        if ($validator->fails()){
           
            return response()->json([
                'status' => 1, 
                'message' => 'Email Failed',    
            ],400);
        }
        
        $this->Savee($request); 
        
        
        return response()->json([
                'status' => 0,
                'message' => 'Email Sent Successfully'
            ],201);
            
        

    }

}
