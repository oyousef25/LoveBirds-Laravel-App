<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>

    <style>
        body {
            font-family: 'Roboto Slab';
<<<<<<< Updated upstream
        }

        .main{
            margin: 45px;
=======
>>>>>>> Stashed changes
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
            /*box-shadow: 0 1rem 2rem 0 rgba(0, 0, 0, 0.1);*/
        }

        button {
            height: 45px;
            width: 100%;
            color: white;
            background-color: #ff8585;
        }
    </style>
</head>
<body>
<<<<<<< Updated upstream
<div class="add-post">
    <a href="{{action('GuestController@create')}}">
        <div class="nav-button new-post-button">+</div>
    </a>
</div>
=======
>>>>>>> Stashed changes
<div class="row">
    <div class="col-sm-3">
        <div class="item side-nav">
            @include('partials.navigation')
        </div>
<<<<<<< Updated upstream
    </div>
    <div class="col-sm-6">
        <div class="main">
            <h1>New Category</h1>
            <form method="POST" action="{{ action('BudgetCategoriesController@store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input name="category_name" type="text" class="form-control" id="category_name"
                           placeholder="e.g Food, Venue">
                </div>
                <button type="submit" class="btn">Add Category</button>
            </form>
        </div>
    </div>
=======
    </div>
    <div class="col-sm-6">
        <div class="main align-items-center">
            <h1>New Category</h1>
            <form method="POST" action="{{ action('BudgetCategoriesController@store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input name="category_name" type="text" class="form-control" id="category_name"
                           placeholder="e.g Food, Venue">
                </div>
                <button type="submit" class="btn">Add Category</button>
            </form>
        </div>
    </div>
>>>>>>> Stashed changes
</div>
</body>
</html>
