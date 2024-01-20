<?php

namespace App\Http\Controllers;

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
}
