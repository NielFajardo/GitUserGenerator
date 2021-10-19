<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Generator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redis;
use \Cache;
use Log;

class GeneratorController extends Controller
{

	  public function index() 
    {
        return view("generator");
    }

    public function generator()
    {
        if(Auth::check()){
            return view('generator');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    

     public function submitForm(Request $request)
    { 

    $redis = Redis::connection();

foreach ($request->multiInput as $key => $value) {
    
    $cachedGitUsers = Cache::store('redis')->get($value['username']);


    if(isset($cachedGitUsers)) {


   $response = Cache::store('redis')->get($value['username']);
 
 

   }

   else {

	$client = new \GuzzleHttp\Client(); 
	$request = $client->get('https://api.github.com/users/'.$value['username'].'');

	$response = (string) $request->getBody(); 
    
	Cache::store('redis')->put($value['username'], $response , 120); // 2 Minutes
   
 }


 $list[] = json_decode($response); 

asort($list);

    
    }
return view('list', compact('list')); 
   
}

}
