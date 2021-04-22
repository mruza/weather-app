<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Weather</title>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="{{route('weather.index')}}">Weather</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-4">
            <h2>Add city: </h2>
            <form action="{{ route('weather.create') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm">
                        <input type="text" class="form-control" id="city" name="city" placeholder="Berlin">
                    </div>
                    <div class="col-sm">

                        <button type="submit" class="btn btn-primary mb-3">Add</button>
                    </div>
                </div>
            </form>
        </div>
        @yield('content')
    </div>
</div>

</body>
</html>
