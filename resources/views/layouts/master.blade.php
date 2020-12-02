<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title') - Apps Futami </title>

  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  {{-- CSS Libraries --}}
  @yield('page-styles')

  {{-- Template CSS  --}}
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">
</head>

<body class="sidebar-gone sidebar-mini">
  <div id="app">
    <div class="main-wrapper">
      @include('layouts.header')
      @include('layouts.sidebar')

      {{-- Main Content  --}}
      <div class="main-content">
        
        @yield('content')

      </div>
      <footer class="main-footer">
        <div class="footer-left">
            Futami Food & Beverages &copy; {{ date('Y') }} 
              <!-- </div> Design By <a href="https://www.instagram.com/dimasrizqi">RADJA RIZQI RAMADHAN </a>  -->
        </div>
        
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/js/jquery-3.3.1.min.js')}}" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/js/popper.min.js')}}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js')}}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/js/jquery.nicescroll.min.js')}}"></script>
  <script src="{{ asset('assets/js/moment.min.js')}}"></script>
  <script src="{{ asset('assets/js/stisla.js')}}"></script>

  {{-- JS Libraies --}}

  {{-- Template JS File  --}}
  <script src="{{ asset('assets/js/scripts.js')}}"></script>
  <script src="{{ asset('assets/js/custom.js')}}"></script>

   <!-- Page Specific JS File  -->
   
  @stack('page-scripts')
</body>
</html>
