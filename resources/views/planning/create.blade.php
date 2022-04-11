<!DOCTYPE html>
<html>
<head>
    <title>LoveBirds - Create Task</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>

    <style>
        body {
            font-family: 'Roboto Slab';
            width: 900px;
            margin: 0 auto;
        }

        h1 {
            font-size: 25px;
            font-weight: bold;
            text-align: center;
        }

        label{
            color: #61d2c6;
        }

        .form-control{
            height: 45px;
            /*box-shadow: 0 1rem 2rem 0 rgba(0, 0, 0, 0.1);*/
        }

        button{
            height: 45px;
            width: 100%;
            color: white;
            background-color: #ff8585;
        }
    </style>
</head>
<body>
<h1>Create Task</h1>
<form method="POST" action="{{ action('TaskController@store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="exampleInputEmail1">Task</label>
        <input name="task_title" type="text" class="form-control" id="task_title"
               placeholder="Task Title">
        {{--        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
    </div>
    <div class="form-group">
        <label for="task_description">Description</label>
        <textarea name="task_description" type="text" class="description form-control" id="task_description" placeholder="Task Description"></textarea>
    </div>
    <div class="form-group">
        <label for="due_date">Due date</label>
        <input name="due_date" type="text" class="form-control" id="due_date" placeholder="YYYY-MM-DD">
    </div>
    <div class="form-group">
        <label for="assigned_user">Assigned to</label>
        <input name="assigned_user" type="text" class="form-control" id="assigned_user" placeholder="Choose One">
    </div>
    <div class="form-group">
        <label for="task_price">Cost</label>
        <input name="task_price" type="text" class="form-control" id="task_price" placeholder="e.g 22.00, 25, 76.00, etc">
    </div>
    <div class="form-group">
        <div class="dropdown">
            <label for="budget_category_id">Category</label>
            <select class="form-control" name="budget_category_id">
                @foreach ($categories as $id => $category)
                    <option value="{{$id}}">{{$category}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="btn">Create</button>
</form>
</body>
</html>
