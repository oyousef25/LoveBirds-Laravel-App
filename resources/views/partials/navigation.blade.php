<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav > a {
            padding: 6px 6px 6px 32px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
        }

        .sidenav > a:hover {
            background-color: #FFC9C9;
        }

        .sidenav .btn-container {
            text-align: center;
            padding-top: 30px;
        }

        .sidenav .btn-container a{
            padding: 15px;
            background-color: #f48b8b;
            border: 2px solid #f48b8b;
            border-radius: 10px;
            text-decoration: none;
            color: white;
        }

        .sidenav .btn-container a:hover{
            background-color: transparent;
            transition: 0.2s;
            color: #f48b8b;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav > a {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

<div class="sidenav align-items-center">
    <img src="{{asset("/images/ic_logo.png")}}" width="75%" height="75%"/>
    <a href="{{ url('/home') }}">Home</a>
    <a href="{{ url('/planning') }}">Planning</a>
    <a href="{{ url('/guests') }}">Guests</a>
    <a href="{{ url('/explore-vendors') }}">Vendors</a>
    <a href="{{ url('/account') }}">My Account</a>
    <div class="btn-container">
        <a href="{{ url('/logout') }}">Sign out</a>
    </div>
</div>
</body>
</html>
