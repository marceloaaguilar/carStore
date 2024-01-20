<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->usertype == '0'){
                $services = Service::all();
                return view('user.home', compact('services'));
            }
            else {
                 return view('admin.home');
                }

        }
        else{
            return redirect() -> back();
        }
    }

    public function index(){

        if (Auth::id())
            return redirect('home');

        $services = Service::all();
        return view('user.home', compact('services'));
    }

    public function contact(Request $r){

            $r -> validate([
            'name'      => ['max:255'],
            'email'     => ['max:255'],
            'message'   => ['max:255'],   
            'phone'     => ['required', 'max:255'],
            'service'   => ['required']
        ]);


        Appointment::create($r->all());
        return back() -> with('message','Message Sent Succefully');
 

    }
}
