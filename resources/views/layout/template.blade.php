<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{URL::to('bst/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('fa/css/all.css')}}" rel="stylesheet">
</head>
<body>

@yield('content')

<script src="{{asset('bst/js/jquery.js')}}"></script>
<script src="{{asset('bst/js/Popper.js')}}"></script>
<script src="{{asset('bst/js/bootstrap.js')}}"></script>
</body>
</html>