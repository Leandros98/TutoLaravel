@extends('base')
@section('title', $property->title)
@section('content')
<div class="container mt-5">
@include('shared.Flash')
    
<h1>{{$property->title}}</h1>
<h2>{{$property->rooms}} pieces - {{$property->surface}} m2 </h2>
<div class="text-primary fw-bold" style="font-size: 4rem;">
     {{ number_format($property->price, 0, ',', ' ') }} Fbu
</div>
<div class="mt-4">
    <h4>Interesse par ce bien ?</h4>
    <form action="{{route('properti.contact',$property)}}" class="vstack gap-3" method="get">
        @csrf
        <div class="row">
             @include('shared.input',['class'=>'col','label'=>'Prenom','name'=>'firstName', 'value'=>'Leandre'])
             @include('shared.input',['class'=>'col','label'=>'Nom','name'=>'lastName','value'=>'NIMPAGARITSE'])
        </div>
        <div class="row">
             @include('shared.input',['class'=>'col','label'=>'Telephone','name'=>'phone','value'=>'+25761207471'])
             @include('shared.input',['type'=>'email','class'=>'col','label'=>'Votre email','name'=>'email','value'=>'leandrepublic@gmail.com'])
        </div>
             @include('shared.input',['type'=>'textarea','class'=>'col','label'=>'Votre message','name'=>'message','value'=>'mon petit message' ])
        <div>
            <button class="btn btn-primary">
                Nous contactons
            </button>
        </div>
    </form>
</div>
<div class="mt-4">
    <p>{{!!nl2br($property->description)!!}}</p>
    <div class="row">
        <div class="col-8">
            <h2>Caracteristique</h2>
            <table class="table table-striped">
                <tr>
                    <td>Surface habitable</td>
                    <td>{{$property->surface}}</td>
                </tr>
                <tr>
                    <td>Pieces</td>
                    <td>{{$property->rooms}}</td>
                </tr>
                <tr>
                    <td>Chambres</td>
                    <td>{{$property->bedrooms}}</td>
                </tr>
                <tr>
                    <td>Etage</td>
                    <td>{{$property->floor ?: 'rez de chausse'}}</td>
                </tr>
                <tr>
                    <td>Localisation</td>
                    <td>
                        {{$property->address}} <br>
                        {{$property->city}}   {{$property->postal_code}}

                    </td>
                </tr>
            </table>
        </div>
        <div class="col-4">
            <h2>Specificite</h2>
            <ul class="list-group">
                <!--foreach($property->$options as $option)
                <li class="list-group-item">
                   option->name}}
                </li>
                endforeach-->
            </ul>
        </div>
    </div>
</div>
</div>
@endsection