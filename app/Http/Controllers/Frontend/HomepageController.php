<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Property;
use App\Models\Testimonial;

class HomepageController extends Controller
{
    public function index(){
        
        $sliders = Slider::get();
        $testimonials = Testimonial::get();
        $agents = Agent::get();
        $properties = Property::get();

        return view('frontend.homepage',compact('sliders','testimonials','agents','properties'));
    }
}
