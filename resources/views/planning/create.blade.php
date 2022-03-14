<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        body {
            width: 900px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
<h1>New Task</h1>
<form method="POST" action="{{ action('TaskController@store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input name="task_title" type="text" class="form-control" id="exampleInputEmail1"
               placeholder="Task Title">
        {{--        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <input name="task_description" type="text" class="form-control" id="exampleInputPassword1" placeholder="Task Description">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Due Date</label>
        <input name="due_date" type="text" class="form-control" id="exampleInputPassword1" placeholder="YYYY-MM-DD">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Assigned User</label>
        <input name="assigned_user" type="text" class="form-control" id="exampleInputPassword1" placeholder="Choose One">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Task Price</label>
        <input name="task_price" type="text" class="form-control" id="exampleInputPassword1" placeholder="e.g 22.00, 25, 76.00, etc">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
