@extends('base')
@section('content')
<div class="big-light p-5 mb-5 text-center">
    <div class="container">
        <h1>Mon agence</h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae vero ducimus eligendi exercitationem aperiam alias quisquam dignissimos eum! Et ut doloremque enim recusandae rem numquam modi sequi autem voluptatem sint.
        </p>
    </div>
    <div class="container">
        <div class="row">
             @foreach($properties as $property)
                <div class="col"> 
                    @include('properti.card')
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection