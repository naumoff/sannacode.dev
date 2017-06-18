<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>sannacode</title>

        {{-- CSS libraries --}}
        <link href="{{mix('/css/app.css')}}" type="text/css" rel="stylesheet">
        {{-- JS libraries --}}
        <script type="text/javascript" src="{{mix('/js/app.js')}}"></script>

    </head>
    <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                @if (Route::has('login'))
                    <div class="top-right links text-right">
                        @if (Auth::check())
                            <a role="button" class="btn btn-primary btn-xs" href="{{ url('/home') }}">Home</a>
                        @else
                            <a role="button" class="btn btn-primary btn-xs" href="{{ url('/login') }}">Login</a>
                            <a role="button" class="btn btn-primary btn-xs" href="{{ url('/register') }}">Register</a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 page-header">
                <h1 class="text-center">sannacode</h1>
            </div>
        </div>
        <div cass="row">
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-10 col-md-10">
                <div class="btn-group btn-group-justified">
                    <a href="#" class="btn btn-primary">Teams List</a>
                    <a href="#" class="btn btn-primary">Plays List</a>
                    <a href="#" class="btn btn-primary">CRUD</a>
                </div>
            </div>
            <div class="col-lg-1 col-md-1"></div>

        </div>
    </div>
    </body>
</html>
