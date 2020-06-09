<?php namespace App\Traits;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
trait PhpTrait{
    public function verify(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:posts,email',
            'pin' => 'required|digits:6|integer',
            
        ];
        $validator = Validator::make($request->all(),$rules);
        return $validator;
        
    }
    public function Savee(Request $request){
        Log::info('EMAIL SENT');    
        Post::create($request->all());
       
        
    }
}