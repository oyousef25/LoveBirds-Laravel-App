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
<h1>Edit Vendor</h1>
<form method="POST" action="{{ action('CustomVendorController@update', $vendor->id) }}">
    {{method_field('PATCH')}}
    {{ csrf_field() }}
    <div class="form-group">
        <label for="vendor_name">Vendor Name</label>
        <input name="vendor_name" type="text" class="form-control" id="vendor_name"
               placeholder="e.g john, omar, alex" value="{{$vendor->vendor_name}}">
    </div>
    <div class="form-group">
        <label for="vendor_description">Vendor Description</label>
        <input name="vendor_description" type="text" class="form-control" id="vendor_description"
               placeholder="e.g doe, yousef, anderson" value="{{$vendor->vendor_description}}">
    </div>
    <div class="form-group">
        <label for="job_title">Job Title</label>
        <input name="job_title" type="text" class="form-control" id="job_title"
               placeholder="YYYY-MM-DD" value="{{$vendor->job_title}}">
    </div>
    <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <input name="phone_number" type="text" class="form-control" id="phone_number"
               placeholder="" value="{{$vendor->phone_number}}">
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
