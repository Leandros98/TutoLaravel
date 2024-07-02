<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Administration</title>
    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
--> 
    @vite('resources/css/app.css', 'resources/js/app.js')
     <!-- tom select --> 
     <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
     <style>
      @layer reset{
        bottom{
          all:unset;
        }
      }
     </style>
</head>
<body>
    <div class="container mt-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Agence</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           @php 
             $route=request()->route()->getName();
           @endphp
           <li><a  href="{{route('admin.property.index')}}" @class(['nav-link','active'=>str_contains($route,'property.')])>Gerer les proprietes</a></li>
           <li><a  href="{{route('admin.option.index')}}" @class(['nav-link','active'=>str_contains($route,'option.')])>Gerer les options </a></li>
      </ul>
      <div class="ms-auto">
        @auth
        <ul class="navbar-nav">
          <li class="nav-item">
            <form action="{{route('logout')}}" method="post">
              @csrf 
              @method('delete')
              <button class="nav-link">Se deconnecter</button>
            </form>
          </li>
        </ul>
        @endauth
      </div>
    </div>
  </div>
</nav>
        @yield('content')
        @include('shared.Flash')
    <script>
      new TomSelect('select[multiple]',{Plugins:{remove_button:{title:'supprimer'}}})
    </script>
</body>
</html>