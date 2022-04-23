<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>

        .main {
            margin: 45px;
            text-align: center;
        }

        .side-nav {
            flex-basis: 20%;
        }

        a, a:link, a:hover, .card-text {
            color: black;
            text-decoration: none !important;
        }

        body {
            font-family: 'Roboto Slab';
        }

        h1 {
            font-size: 25px;
            font-weight: bold;
            text-align: center;
        }

        label {
            color: #61d2c6;
        }

        .form-control {
            height: 45px;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-sm-3">
        <div class="item side-nav">
            @include('partials.navigation')
        </div>
    </div>
    <div class="col-sm-3">
        <div class="main align-items-center">
            <form method="POST" action="{{ action('InvitePartnerController@process', \Illuminate\Support\Facades\Auth::user()->email) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Partner E-Mail</label>
                    <input id="email" name="email" type="email" class="form-control"/>
                </div>
                <button class="btn" type="submit">Send invite</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
