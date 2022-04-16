<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        a, a:link, a:hover{
            color: black;
            text-decoration: none !important;
        }

        .main{
            margin-top: 45px;
        }

        .vendors-tabs{
            width: 75%;
            font-size: 20px;
            margin: 45px auto;
        }

        .active{
            border-bottom: 4px solid #ff8585;
        }

        .nav a{
            text-align: center;
        }

        .task-container > a {
            text-decoration: none;
            color: black;
        }

        .nav-button.new-post-button {
            content: "+";
            position: fixed;
            bottom: 30px;
            right: 30px;
            font-size: 30px;
            width: 55px;
            height: 55px;
            background-color: #92dfd8;
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            vertical-align: center;
            transition: all 0.25s ease;
            z-index: 1;
        }
    </style>
</head>
<body>
<div class="add-post">
    <a href="{{action('GuestController@create')}}">
        <div class="nav-button new-post-button"></div>
    </a>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="item side-nav">
            @include('partials.navigation')
        </div>
    </div>
    <div class="col-sm-6">
        <div class="vendors-tabs">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Explore Vendors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("saved-vendors.index")}}">Saved Vendors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("custom-vendors.index")}}">My Vendors</a>
                </li>
            </ul>
        </div>
        <div class="main">
        </div>
    </div>
</div>
</body>
</html>
