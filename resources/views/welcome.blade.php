<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Laravel</title>

        <link
                href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                rel="stylesheet"
                type="text/css"
        >

        <!-- Fonts -->
        <link
                href="https://fonts.googleapis.com/css?family=Raleway:100,600"
                rel="stylesheet"
                type="text/css"
        >

        <script>
            window.App = '<?php echo json_encode(['user' => auth()->user()] ); ?>';
        </script>
      
    </head>
    <body>
        <div id="app" class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="title m-b-md">
                Laravel
            </div>


            <task-list> </task-list>

        </div>
    <script src="../js/app.js"> </script>

    </body>
</html>
