<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


            <div class="container">
                <form action="{{ route('order_create') }}" method="post">
                    @csrf

                    <h3>Proizvodi</h3>
                    @foreach ($products as $product)
                        @if ($loop->index % 3 == 0)
                            <div class="row">
                        @endif
                        <div class="col-4">
                            <div class="row">
                                <div class="col">
                                    {{ $product->name }} - {{ $product->price }}€
                                </div>
                                <div class="col">
                                    <input type="checkbox" name="product[]" value="{{ $product->id }}" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{ $product->description }}
                                </div>
                                <hr>
                            </div>
                        </div>
                        @if ($loop->index % 3 == 2 || $loop->last)
                            </div>
                        @endif
                    @endforeach

                    <h3>Stolovi</h3>
                    @foreach ($tables as $table)
                        @if ($loop->index % 3 == 0)
                            <div class="row">
                        @endif
                        <div class="col-4">
                            <div class="row">
                                <div class="col">
                                    {{ $table->name }}
                                </div>
                                <div class="col">
                                    <input type="radio" name="table" value="{{ $table->id }}" >
                                </div>
                            </div>
                        </div>
                        @if ($loop->index % 3 == 2 || $loop->last)
                            </div>
                        @endif
                    @endforeach
                    <hr>
                    <button type="submit" class="btn btn-success">Naruci</button>
                </form>
            </div>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>
