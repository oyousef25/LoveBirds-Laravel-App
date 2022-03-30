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
<h1>New Guest</h1>
<form method="POST" action="{{ action('GuestController@store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input name="first_name" type="text" class="form-control" id="first_name"
               placeholder="John">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Smith">
    </div>
    <div class="form-group">
        <div class="dropdown">
            <label for="guest_relationship">Relationship</label>
            <select class="form-control" name="guest_relationship">
                @foreach ($relationships as $id => $relationship)
                    <option value="{{$id}}">{{$relationship}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="email_address">E-mail Address</label>
        <input name="email_address" type="text" class="form-control" id="email_address" placeholder="email@example.com">
    </div>
    <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <input name="phone_number" type="text" class="form-control" id="phone_number"
               placeholder="(123)456-7890">
    </div>
    <button type="submit" class="btn">Add Guest</button>
</form>
</body>
</html>
