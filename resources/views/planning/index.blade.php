<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body a {
            text-decoration: none;
        }

        .container {
            display: flex;
        }

        .side-nav{
            height: 100%;
            width: 20%;
            box-shadow: inset 0 0 5px lightgray;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            padding-top: 50px;
        }

        .main {
            width: 60%;
            background-color: white;
        }

        .task-item {
            border: 1px solid #eaecee;
            border-radius: 8px;
            min-height: 150px;
            transition: all 0.25s ease;
            overflow: hidden;
            cursor: pointer;
            margin-top: 40px;
            padding: 10px;
        }

        .task-item:hover {
            transform: translate3d(0, -5px, 0);
            box-shadow: 0 2rem 5rem 0 rgba(0, 0, 0, 0.1);
        }

        .task-title {
            font-size: 20px;
        }

        .task-price {
            font-size: 18px;
            text-align: right;
            font-weight: bold;
            margin-right: 10px;
        }

        .task-date {
            color: #525252;
            font-size: 15px;
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
    </style>
</head>
<body>
<div class="add-post">
    <a href="{{action('TaskController@create')}}">
        <div class="nav-button new-post-button">+</div>
    </a>
</div>
<div class="container">
    <div class="item side-nav">
        @include('partials.navigation')
    </div>

    <div class="item main">
        @foreach($tasks as $task)
            <div class="task-container">
                <a href="{{action('TaskController@show', $task->id)}}">
                    <div class="task-item">
                        <div class="task-title">{{$task->task_title}}</div>
                        <div class="task-price">${{$task->task_price}} ></div>
                        <div class="task-date">Due by {{$task->due_date}}</div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
