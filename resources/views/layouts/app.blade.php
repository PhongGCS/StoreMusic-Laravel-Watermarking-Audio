<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Music Store</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  
</head>
<body>
<div class="content-area" style="background-image:url({{ @asset('images/background.jpg') }})">
@include('partials.contents.login')
@include('partials.header')
@yield('content')
</div>


</body>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
</html>