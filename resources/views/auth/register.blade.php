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
    <h1>Register</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">Username</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                   value="{{ old('name') }}" required autocomplete="name" autofocus>
            @if ($errors->has('name'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
            @endif
        </div>
        <div class="form-group">
            <label for="email">E-Mail Address</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="task_description">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password" required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                   autocomplete="new-password">
        </div>
        <button type="submit" class="btn login-btn">Register</button>
        <div class="row register-box align-items-center">
            <p class="register-text">Already have an account?</p>
            <a href="{{route('login')}}" class="btn register-btn">Login</a>
        </div>
    </form>
</div>
</body>
</html>
