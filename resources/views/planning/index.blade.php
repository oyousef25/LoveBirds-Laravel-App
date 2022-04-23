<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        a, a:link, a:hover, .card-text {
            color: black;
            text-decoration: none !important;
        }

        .main{
            color: black;
            margin: 5%;
        }

        .task-item {
            border: 1px solid #eaecee;
            border-radius: 8px;
            min-height: 150px;
            transition: all 0.25s ease;
            overflow: hidden;
            cursor: pointer;
            margin: 5% 5%;
            padding: 10px;
        }

        .task-item:hover {
            transform: translate3d(0, -5px, 0);
            box-shadow: 0 2rem 5rem 0 rgba(0, 0, 0, 0.1);
        }

        .task-title {
            font-size: 23px;
        }

        .task-price {
            display: flex;
            justify-content: right;
            font-size: 18px;
            text-align: right;
            font-weight: bold;
            margin-right: 10px;
        }

        .task-date {
            color: #525252;
            font-size: 16px;
        }

        .task-container > a {
            text-decoration: none;
            color: black;
        }

        .nav-button.new-post-button {
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

        .card {
            padding: 25px;
            background-color: #92dfd8;
            text-align: center;
            max-width: 500px;
            border: 1px solid transparent;
            border-radius: 10px;
            margin: 5%;
        }

        .card-title {
            font-size: 25px;
            font-weight: bold;
        }

        .card-text {
            font-size: 20px;
        }
    </style>
</head>
<body>
<div class="add-post">
    <a href="{{action('TaskController@create')}}">
        <div class="nav-button new-post-button">+</div>
    </a>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="item side-nav">
            @include('partials.navigation')
        </div>
    </div>
    <div class="col-sm-8">
        <div class="main align-items-center">
            <div class="item">
                <div class="header">
                    <div class="row">
                        <div class="col-sm-6">
                            <a class="header-link" href="{{route("categories.index")}}">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Budget Total</h5>
                                        <p class="card-text">$455</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Spent</h5>
                                    <p class="card-text">$576</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                </div>
            </div>
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
        <div class="row pagination-links">
            {{$tasks->links()}}
        </div>
    </div>
</div>
</body>
</html>
