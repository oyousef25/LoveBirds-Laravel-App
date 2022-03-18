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
        <label for="first_name">Title</label>
        <input name="first_name" type="text" class="form-control" id="first_name"
               placeholder="Task Title">
    </div>
    <div class="form-group">
        <label for="last_name">Description</label>
        <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Task Description">
    </div>
    <div class="form-group">
        <label for="guest_relationship">Due Date</label>
        <input name="guest_relationship" type="text" class="form-control" id="guest_relationship" placeholder="YYYY-MM-DD">
    </div>
    <div class="form-group">
        <label for="email_address">Assigned User</label>
        <input name="email_address" type="text" class="form-control" id="email_address" placeholder="Choose One">
    </div>
    <div class="form-group">
        <label for="phone_number">Task Price</label>
        <input name="phone_number" type="text" class="form-control" id="phone_number" placeholder="e.g 22.00, 25, 76.00, etc">
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
