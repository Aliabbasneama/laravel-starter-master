<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agent;
use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\PropertyRequest;

class PropertyController extends Controller
{
   
    public function index(): View
    {
        $properties = Property::get();

        return view('admin.properties.index', compact('properties'));
    }

    public function create(): View
    {
        $agents = Agent::get();

        return view('admin.properties.create',compact('agents'));
    }

    public function store(PropertyRequest $request): RedirectResponse
    {
         if($request->validated()){
             $banner = $request->file('banner')->store('asset/property','public');
             $slug = Str::slug($request->title, '-');
               Property::create($request->except('banner') + ['banner' => $banner,'slug' => $slug]);

         }

        return redirect()->route('admin.properties.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }


    public function edit(Property $property): View
    {
           $agents = Agent::get();

        return view('admin.properties.edit', compact('property','agents'));
    }

    public function update(PropertyRequest $request, Property $property): RedirectResponse
    {
          
          if($request->validated()){
              $slug = Str::slug($request->title, '-');
             if($request->banner){
             File::delete('storage/' . $property->banner);
              $banner = $request->file('banner')->store('asset/property','public');
              $property->update($request->except('banner') + ['banner' => $banner,'slug' =>$slug]);
              
             }else{
               $property->update($request->validated() + ['slug' => $slug]);

             }
          }

        return redirect()->route('admin.properties.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Property $property): RedirectResponse
    {
        File::delete('storage/' . $property->banner);
        $property->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}