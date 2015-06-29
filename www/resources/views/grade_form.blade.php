<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hello - @yield('title')</title>
</head>

<body>
    <form method="post" action="{{ route('grade_calculate') }}">
        <label for="name">Your name</label>
        <input type="text" name="name" id="name">
        <label for="grade">Your score</label>
        <input type="text" name="score" id="score">
        {{-- For PUT/DELETE --}}
        {{--<input type="hidden" name="_method" value="DELETE">--}}

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit">Submit</button>
    </form>
</body>

</html>