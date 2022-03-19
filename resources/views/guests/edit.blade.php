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
<h1>edit Guest</h1>
<form method="POST" action="{{ action('GuestController@update', $guest->id) }}">
    {{method_field('PATCH')}}
    {{ csrf_field() }}
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input name="first_name" type="text" class="form-control" id="first_name"
               placeholder="e.g john, omar, alex" value="{{$guest->first_name}}">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input name="last_name" type="text" class="form-control" id="last_name"
               placeholder="e.g doe, yousef, anderson" value="{{$guest->last_name}}">
    </div>
    <div class="form-group">
        <label for="guest_relationship">Relationship</label>
        <input name="guest_relationship" type="text" class="form-control" id="guest_relationship"
               placeholder="YYYY-MM-DD" value="{{$guest->guest_relationship}}">
    </div>

    <div class="form-group">
        <label for="status_id">Status</label>
        <input name="status_id" type="text" class="form-control" id="status_id"
               placeholder="YYYY-MM-DD" value="{{$guest->status_id}}">
    </div>

    <div class="form-group">
        <label for="email_address">E-mail Address</label>
        <input name="email_address" type="text" class="form-control" id="email_address"
               placeholder="Choose One" value="{{$guest->email_address}}">
    </div>
    <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <input name="phone_number" type="text" class="form-control" id="phone_number"
               placeholder="" value="{{$guest->phone_number}}">
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>
@if($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}<br>
    @endforeach
@endif
</body>
</html>
