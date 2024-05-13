<!doctype html>
<html lang="it">
<head>
   @include('includes.head')
</head>
<body>
<div class="container mt">
   <header class="row">
       @include('includes.header')
   </header>
   <div id="main" class="container mt-4">
           @yield('content')
   </div>
   <footer class="row">
       @include('includes.footer')
   </footer>
</div>
</body>
</html>
