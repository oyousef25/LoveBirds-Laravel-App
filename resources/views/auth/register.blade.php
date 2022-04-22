<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>

    <style>
        a, a:link, a:hover, .card-text {
            color: black;
            text-decoration: none !important;
        }

        body {
            font-family: 'Roboto Slab';
        }

        .main {
            max-width: 50%;
            margin: 0 auto;
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
        }

        .login-btn {
            color: white;
            height: 45px;
            width: 100%;
            background-color: #ff8585;
        }

        .register-box {
            margin-top: 25px;
            display: flex;
            justify-content: center;
        }

        .register-text{
            margin: 10px;
            font-size: 16px;
        }

        .register-btn{
            border: 1px solid lightgray;
            box-shadow: 1px 2px 2px 1px rgba(0, 0, 0, 0.1);
            color: #ff8585;
            background-color: white;
            transition: 0.4s;
        }

        .register-btn:hover {
            color: white;
            background-color: #ff8585;
        }
    </style>
</head>
<body>
<div class="main">
    <h1>Register</h1>
    <form method="POST">
        {{method_field('PATCH')}}
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input name="task_title" type="text" class="form-control" id="task_title">
        </div>
        <div class="form-group">
            <label for="task_description">E-Mail Address</label>
            <input name="task_description" type="text" class="description form-control" id="task_description">
        </div>
        <div class="form-group">
            <label for="task_description">Password</label>
            <input name="task_description" type="text" class="description form-control" id="task_description">
        </div>
        <div class="form-group">
            <label for="task_description">Confirm Password</label>
            <input name="task_description" type="text" class="description form-control" id="task_description">
        </div>
        <button type="submit" class="btn login-btn">Register</button>
        <div class="row register-box align-items-center">
            <p class="register-text">Already have an account?</p>
            <button onclick="{{action()}}" class="btn register-btn">Login</button>
        </div>
    </form>
    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
</div>
</body>
</html>
