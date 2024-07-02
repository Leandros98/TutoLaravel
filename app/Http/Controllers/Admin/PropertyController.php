<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    
    public function index()
    {
      return view('admin.property.index',['properties'=>Property::orderBy('created_at','desc')->paginate(25)]); //1  
    }

    public function create()
    {  
        $property=new Property();
        $property->fill([
            'surface'=>40,
            'rooms'=>3,
            'bedrooms'=>1,
            'floor'=>0,
            'city'=>'Bujumbura',
            'postal_code'=>34000,
            'sold'=>false,
        ]);
        // verification qu'on trouve les valeurs dd(Option::pluck('name','id'));
        return view('admin.property.form',[
         'property'=>$property,
        'options'=>Option::pluck('name','id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $property=Property::create($request->validated());
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success','Le bien a été bien sauvegardé');
    }

    public function edit(Property $property)
    {
        return view('admin.property.form',[
            'property'=>$property,
            'options'=>Option::pluck('name','id')
           ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success','Le bien a été bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Property $property)
    {  
        $property->delete();
        return to_route('admin.property.index')->with('success','Le bien a été bien supprimé');
    }
}
