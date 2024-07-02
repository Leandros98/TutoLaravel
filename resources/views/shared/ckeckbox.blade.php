@php 
$class ??=null;
@endphp 
<div @class(["form-check form-switch", $class])>
    <input type="hidden" name="{{$name}}" value="0">
    <input value="1" @checked(old($name, $value ?? false )) class="form-check-input  @error($name) is-invalid @enderror" type="checkbox"  id="{{$name}}" name="{{$name}}" role="switch">
    <label for="{{$name}}" class="form-check-label">{{$label}}</label>
    @error($name) 
    <div class="invalid-feedback">
         {{$message}}
       </div>
@enderror
</div>