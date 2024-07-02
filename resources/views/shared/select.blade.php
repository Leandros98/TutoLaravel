@php
$type ??= 'text';
$class ??= null;
$name ??= '';
$value ??= '';
$label ??= ucfirst($name);
@endphp
<div @class([ "form-group" , $class])>
<label for="{{$name}}" class="form-control">{{$label}}</label>
    <select name="{{$name}}[]" id="{{$name}}" multiple>
        @foreach($options as $cle=>$valeur)
        <option @selected($value->contains($cle)) value="{{$cle}}">{{$valeur}}</option>
        @endforeach
    </select>
@error($name) 
    <div class="invalid-feedback">
         {{$message}}
       </div>
@enderror
</div>