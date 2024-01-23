<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Service;

class AdminController extends Controller
{
    public function addView(){
        return view('admin.add_service');
    }

    public function upload(Request $r){
        $service    = new Service;
        $image      = $r->file('serviceImage');
        $imageName  = time().'.'.$image->getClientOriginalExtension();
        $image      -> move('services_images', $imageName);
        $service    -> image = $imageName;
        $service    -> name = $r -> name;
        $service    -> description = $r -> description;
        $service    -> save();
        return redirect()-> back()->with('message','Service Added Succefully');
    }

    public function showAppointment(){
        $dataAppointment = Appointment::all();
        return view('admin.showappointment', compact('dataAppointment'));
    }

    public function cancelAppointment($id){
        $data = Appointment::find($id);
        if ($data -> status == 'Canceled'){
            return back() -> with('error', 'Appointment already canceled!');
        }

        $data -> update(['status' => 'Canceled']);
        return back() -> with('message','Appointment Canceled Succefully');

    }

    public function showService(){
        $dataServices = Service::all();
        return view ('admin.showServices', compact('dataServices'));

    }


    public function updateService($id){
        $serviceData = Service::find($id);
        return view('admin.updateService', compact('serviceData'));
    }


    public function editService(Request $r, $id){
        $serviceData = Service::find($id);
        $image = $r -> image;
        $imageName = time(). $image->getClientOriginalExtension();
        $serviceData -> image = $imageName;
        $r ->image -> move('services_images', $imageName);
        $serviceData -> name = $r -> name;
        $serviceData -> description = $r -> description;
        $serviceData -> save();
        return back() -> with('message', 'Service Udpdated Succefully');




    }
}
