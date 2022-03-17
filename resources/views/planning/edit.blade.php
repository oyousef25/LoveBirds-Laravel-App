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
<form method="POST" action="{{ action('TaskController@update', $task->id) }}">
    {{method_field('PATCH')}}
    {{ csrf_field() }}
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input name="task_title" type="text" class="form-control" id="task_title"
               placeholder="Task Title" value="{{$task->task_title}}">
        {{--        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
    </div>
    <div class="form-group">
        <label for="task_description">Description</label>
        <input name="task_description" type="text" class="form-control" id="task_description"
               placeholder="Task Description" value="{{$task->task_description}}">
    </div>
    <div class="form-group">
        <label for="due_date">Due Date</label>
        <input name="due_date" type="text" class="form-control" id="due_date"
               placeholder="YYYY-MM-DD" value="{{$task->due_date}}">
    </div>
    <div class="form-group">
        <label for="assigned_user">Assigned User</label>
        <input name="assigned_user" type="text" class="form-control" id="assigned_user"
               placeholder="Choose One" value="{{$task->assigned_user}}">
    </div>
    <div class="form-group">
        <label for="task_price">Task Price</label>
        <input name="task_price" type="text" class="form-control" id="task_price"
               placeholder="e.g 22.00, 25, 76.00, etc" value="{{$task->task_price}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@if($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}<br>
    @endforeach
@endif
</body>
</html>
