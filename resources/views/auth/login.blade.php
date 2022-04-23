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

        .register-text {
            margin: 10px;
            font-size: 16px;
        }

        .register-btn {
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
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">E-Mail Address</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn login-btn">Sign In</button>
        <div class="row register-box align-items-center">
            <p class="register-text">Dont have an account?</p>
            <a href="{{route('register')}}" class="btn register-btn">Register</a>
        </div>
    </form>
</div>
</body>
</html>
