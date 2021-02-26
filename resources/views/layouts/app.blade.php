<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>


   <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
   </script> -->
   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

   <!-- Styles -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integri
      ty="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
   <link href="public/sass/app.scss" rel="stylesheet">

   <style>
   a.btn {
      color: #fff;
   }
   </style>
   @yield("css")

</head>

<body>
   <div id="app">
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
         <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
               {{ config('app.name', 'CMS') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
               <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <!-- Left Side Of Navbar -->
               <ul class="navbar-nav mr-auto">

               </ul>

               <!-- Right Side Of Navbar -->
               <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                  @guest
                  @if (Route::has('login'))
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @endif

                  @if (Route::has('register'))
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
                  @endif
                  @else
                  <li class="nav-item dropdown">
                     <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                     </a>

                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('users.edit-profile') }}">
                           My Profile
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                        </form>
                     </div>
                  </li>
                  @endguest
               </ul>
            </div>
         </div>
      </nav>

      <main class="py-4">

         @auth
         <div class="container">
            @if(session()->has('success'))
            <div class="alert alert-success">
               {{session()->get('success')}}

            </div>
            @endif
            @if(session()->has('error'))
            <div class="alert alert-danger">
               {{session()->get('error')}}

            </div>
            @endif
            <div class="row">
               <div class="col-md-4">
                  <ul class="list-group">
                     @if(auth()->user()->isAdmin())
                     <li class="list-group-item">
                        <a href="{{route('users.index')}}">Users</a>
                     </li>
                     @endif
                     <li class="list-group-item">
                        <a href="{{route('posts.index')}}">Posts</a>
                     </li>

                     <li class="list-group-item">
                        <a href="{{route('categories.index')}}">Categories</a>
                     </li>
                     <li class="list-group-item">
                        <a href="{{route('tags.index')}}">Tags</a>
                     </li>
                  </ul>
                  <ul class="list-group mt-5">
                     <li class="list-group-item">
                        <a href="{{route('trashed-posts.index')}}">Trashed Posts</a>
                     </li>
                  </ul>
               </div>
               <div class="col-md-8">
                  @yield('content')
               </div>
            </div>
         </div>
         @else
         @yield('content')
         @endauth
      </main>
   </div>


   <!-- 
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous">
   </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous">
   </script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous">
   </script> -->

   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
   </script>
   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}"></script>
   @yield("scripts")

</body>

</html>