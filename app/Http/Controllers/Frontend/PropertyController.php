<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    public function index(){
        
        return view('frontend.property.index');
    }

    public function show(Property $property ){
        
        
        return view('frontend.property.single',compact('property'));
    }
}
