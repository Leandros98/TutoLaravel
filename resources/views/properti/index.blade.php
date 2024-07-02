@extends('base')
@section('title','Tous nos biens')
@section('content')
<div class="container">
    <div class="big-light p-5 mb-5 text-center">
    <form action="" method="get" class="container d-flex gap-2">
        <input type="number" name="rooms" id="" class="form-control" value="{{$input['rooms']?? ''}}" placeholder="Nombre de piece min">
        <input type="number" name="surface" id="" class="form-control" value="{{$input['surface']?? ''}}" placeholder="Surface min">
        <input type="number" name="price" id="" class="form-control" value="{{$input['price']?? ''}}" placeholder="Budget max">
        <input name="title" id="" class="form-control" value="{{$input['title']?? ''}}" placeholder="Mot clef">
        <button class="btn btn-primary btn-sm flex-grow">
            Rechercher
        </button>
    </form>
    </div>

    <div class="row">
    @forelse($properties as $property)
                <div class="col-3 mb-4"> 
                    @include('properti.card')
                </div>
                @empty
                <div class="col-3 mb-4"> 
                    Aucun element trouve dans la recherche
                </div>
            @endforelse
    </div>
    <div class="container m-4">
    {{ $properties->links() }}
</div>
</div>
@endsection