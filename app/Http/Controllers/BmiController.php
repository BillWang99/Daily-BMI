<?php

namespace App\Http\Controllers;

use App\Models\bmi;
use App\Http\Requests\StorebmiRequest;
use App\Http\Requests\UpdatebmiRequest;
use Illuminate\Http\Request;

class BmiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = bmi::first();
        if(!$user){
            return view('index');
        }else{
            $user = bmi::orderBy('id','desc')->first();
            
            $bind=['user'=>$user];
            return view('weight',$bind);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'username'=>'required',
            'userheight'=>'required',
        ]);

        $userdata = $request->all();
        $user = bmi::create($userdata);
        return redirect('/');
    }

    /**
     * 
     * weight
     */
    public function weight(Request $request)
    {
        $validated = $request->validate([
            'userweight'=>'required',
        ]);

        $weight = $request['userweight'];
        if($weight <= 0){
            return redirect()->back()->withErrors('體重不得為0或小於0');
        }
        $user = bmi::first();
        $height = $user['userheight']/100;
        $userBMI = round($weight/pow($height,2),2);
        $userdata = [
            'username'=>$user['username'],
            'userheight'=>$user['userheight'],
            'userweight'=>$weight,
            'userbmi'=>$userBMI,];
        
        $dailyBMI = bmi::create($userdata);
        
        return redirect('/')->with(['userBMI',$userBMI]);

    }

    
}
