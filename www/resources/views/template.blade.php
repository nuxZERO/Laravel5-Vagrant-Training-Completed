<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hello - @yield('title')</title>
</head>

<body>
    <div style="width:100px; float: left;">

        <!-- Sidebar -->
        @include('sidebar')

    </div>
    <div style="width: auto; float: left;">

        <!-- Content -->
        @yield('content')

    </div>
</body>

</html>