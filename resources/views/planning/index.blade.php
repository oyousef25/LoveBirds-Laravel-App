<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            display: flex;
            flex-wrap: nowrap;
            overflow: hidden;
        }

        body > div {
            width: 100px;
            margin: 10px;
        }

        .main {
            flex-basis: 80%;
        }

        .side-nav {
            flex-basis: 20%;
        }
    </style>
</head>
<body>

<div class="side-nav">
    @include('partials.navigation')
</div>

<div class="main">
    @foreach($tasks as $task)
        Task Title: {{$task->task_title}}<br><br>
        Description: {{$task->task_description}}<br><br>
        Due Date: {{$task->due_date}}<br><br>
    @endforeach
</div>

</body>
</html>
