<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        a, a:hover, a:link, a:active, a:visited {
<<<<<<< Updated upstream
            text-underline: none;
            text-decoration: none;
        }

        .main {
            margin: 5%;
=======
            text-underline: none !important;
            text-decoration: none !important;
>>>>>>> Stashed changes
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
            text-align: center;
        }

        .task-item:hover {
            transform: translate3d(0, -5px, 0);
            box-shadow: 0 2rem 5rem 0 rgba(0, 0, 0, 0.1);
        }

        .guest-name {
            font-size: 20px;
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
    <a href="{{action('BudgetCategoriesController@create')}}">
        <div class="nav-button new-post-button">+</div>
    </a>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="item side-nav">
            @include('partials.navigation')
        </div>
    </div>
    <div class="col-sm-6">
<<<<<<< Updated upstream
        <div class="main">
=======
        <div class="main align-items-center">
>>>>>>> Stashed changes
            @foreach($categories as  $category)
                <div class="row-cols-2">
                    <div class="col-sm-6 task-container">
                        <a href="{{action('BudgetCategoriesController@show', $category->id)}}">
                            <div class="task-item">
                                <div class="guest-name">{{$category->category_name}}</div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
            {{--    <div class="row pagination-links">--}}
            {{--        {{$categories->links()}}--}}
            {{--    </div>--}}
        </div>
<<<<<<< Updated upstream
=======
    </div>
</div>
>>>>>>> Stashed changes
</body>
</html>
