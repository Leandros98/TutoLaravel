@extends('base')
@section('titre','formulaire du post')
<form action="" method="post">
     @csrf
     @method($post->id? "PATCH":"POST")
     <div class="form-group">
          <label for="titre">Titre</label>
          <input type="text" class="form-control form-control-sm @error('titre') is-invalid @enderror" id="titre" name="titre" value="{{ old('titre',$post->titre) }}">
           @error('titre')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control form-control-sm @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug',$post->slug) }}" required>
        @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control form-control-sm @error('content') is-invalid @enderror" id="content" name="content" required>{{ old('content') }}</textarea>
        @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="btn btn-primary">
        @if($post->id)
        Modifier
        @else
        Créer
        @endif
    </div>
</form>