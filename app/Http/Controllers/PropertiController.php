<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertiRequest;
use App\Http\Requests\PropertiContactRequest;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class PropertiController extends Controller
{
    public function index(SearchPropertiRequest $request){
        $query=Property::query()->orderBy('created_at','desc');
        if($price=$request->validated('price')){
            $query=$query->where('price','<=',$price);
        }
        if($surface=$request->validated('surface')){
            $query=$query->where('surface','>=',$surface);
        }
         if($rooms=$request->validated('rooms')){
            $query=$query->where('rooms','>=',$rooms);
        }
        if($title=$request->validated('title')){
            $query=$query->where('title','like',"%{$title}%");
        }
        return view('properti.index',['properties'=>$query->paginate(16),
        'input'=>$request->validated()
    
    ]);//2

    }
    public function show(string $slug, Property $property){
        $expectedSlug=$property->getSlug();
        if($slug !=$expectedSlug){
            return to_route('properti.show',['slug'=>$expectedSlug, 'property'=>$property]);
        }
        return view('properti.show',[
            'property'=>$property
        ]);
        
    }
    public function contact(Property $property, PropertiContactRequest $request){
        Mail::send(new PropertyContactMail($property, $request->validated()));
        return back()->with('success','votre demande de contact a bien ete envoye');
    }
}
