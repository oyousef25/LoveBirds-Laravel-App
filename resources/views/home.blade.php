<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>

    <style>
        .main {
            font-family: 'Roboto Slab';
            margin: 5%;
        }

        a, a:hover, a:link, a:active, a:visited {
            text-underline: none !important;
            text-decoration: none !important;
        }

        .home-image {
            /*margin-top: 45px;*/
        }

        .home-image img {
            width: 100%;
        }

        h1 {
            position: absolute;
        }

        .main h2 {
            margin-top: 50px;
            font-size: 20px;
            color: black;
            font-weight: bold;
        }

        .task-item {
            border: 1px solid #eaecee;
            border-radius: 8px;
            transition: all 0.25s ease;
            overflow: hidden;
            cursor: pointer;
            margin: 5% 5%;
            padding: 10px;
        }

        .task-title {
            font-size: 23px;
        }

        .task-price {
            font-size: 18px;
            text-align: right;
            font-weight: bold;
            margin-right: 10px;
        }

        .task-date {
            color: #525252;
            font-size: 16px;
        }

        .task-item:hover {
            transform: translate3d(0, -5px, 0);
            box-shadow: 0 2rem 5rem 0 rgba(0, 0, 0, 0.1);
        }

        .task-title {
            font-size: 20px;
        }

        .task-date {
            color: #525252;
            font-size: 15px;
        }

        .task-container > a {
            text-decoration: none;
            color: black;
        }

        .card {
            color: black;
            text-align: center;
            max-width: 300px;
            /*border: 1px solid gray;*/
            border-radius: 10px;
            margin: 5%;
        }

        .card-title {
            padding: 15px;
            font-size: 25px;
            font-weight: bold;
            background-color: #92dfd8;
        }

        .card-text {
            font-size: 20px;
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
    <div class="col-sm-9">
        <div class="home-image">
            <img src="{{asset("/images/welcome-header.png")}}"/>
        </div>
        <div class="main">
            <h2>Overview</h2>
            <div class="header">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Budget</h5>
                                <p class="card-text">$455</p>
                                <p class="card-text">Confirmed Guests</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Guests</h5>
                                <p class="card-text">36</p>
                                <p class="card-text">confirmed guests</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tasks">
                <h2>Next on your TODO list</h2>
                @foreach($tasks as $task)
                    <div class="task-container">
                        <a href="{{action('TaskController@show', $task->id)}}">
                            <div class="task-item">
                                <div class="task-title">{{$task->task_title}}</div>
                                <div class="task-price">
                                    <p>${{$task->task_price}}</p>
                                    <img src="{{asset("/images/item-arrow.png")}}" width="25px" height="25px">
                                </div>
                                <div class="task-date">Due by {{$task->due_date}}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="vendors">
                <h2>Recently saved vendors</h2>
                @foreach($vendors as $vendor)
                    <div class="task-container">
                        <a href="{{action('SavedVendorsController@show', $vendor->id)}}">
                            <div class="task-item">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="vendor-image">
                                            <img src="{{$vendor->vendor_image}}" width="100px" height="100px">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="vendor-details">
                                            <div class="task-title">{{$vendor->vendor_title}}</div>
                                            <div class="task-date">{{$vendor->vendor_rating}}</div>
                                            <div class="task-date">{{$vendor->vendor_description}}</div>
                                        </div>
                                    </div>
                        </a>
                    </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
</div>
</body>
</html>
