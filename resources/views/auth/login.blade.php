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
    <h1>Login</h1>
    <form method="POST">
        {{method_field('PATCH')}}
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">E-Mail Address</label>
            <input name="task_title" type="text" class="form-control" id="task_title"
                   placeholder="example@example.com">
            {{--        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
        </div>
        <div class="form-group">
            <label for="task_description">Password</label>
            <input name="task_description" type="text" class="description form-control" id="task_description"
                   placeholder="Password">
        </div>
        <button type="submit" class="btn login-btn">Sign In</button>
        <div class="row register-box align-items-center">
            <p class="register-text">Dont have an account?</p>
            <button class="btn register-btn">Register</button>
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
