<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
<head>
    <title>Transparent - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body>
<div id="app">
    <transactions></transactions>
</div>

{{--<div class="container">--}}
    {{--@yield('content')--}}
{{--</div>--}}
<script>
    window.Laravel = { csrfToken: '{{ csrf_token() }}' };
</script>
<script src="js/app.js"></script>

</body>
</html>
