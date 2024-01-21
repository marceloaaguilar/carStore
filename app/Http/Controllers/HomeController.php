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
            $r -> request -> add(['user_id' => Auth::user() -> id]);
            $r -> request -> add(['status' => "In Progress"]);
            $r -> validate([
            'name'      => ['max:255'],
            'email'     => ['max:255'],
            'message'   => ['max:255'],   
            'phone'     => ['required', 'max:255'],
            'service'   => ['required'],
            'user_id'   => ['required'],
            'status'    => ['required']
        ]);
        



        Appointment::create($r->all());
        return back() -> with('message','Message Sent Succefully');
 

    }


    public function myappointment(){
        if (Auth::id()){
            $appointment = appointment::where(('user_id'),Auth::id()) -> get();
            return view('user.myappointment', compact('appointment'));

        }

        return view('auth.login');
    }


    public function cancelAppointment($id){
        $data = Appointment::find($id);
        $data -> update(['status' => 'Canceled']);
        return back() -> with('message','Appointment Canceled Succefully');

    }
}
