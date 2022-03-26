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
<h1>New Guest</h1>
<form method="POST" action="{{ action('CustomVendorController@store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="vendor_name">Vendor Name</label>
        <input name="vendor_name" type="text" class="form-control" id="vendor_name"
               placeholder="Task Title">
    </div>
    <div class="form-group">
        <label for="vendor_description">Vendor Description</label>
        <input name="vendor_description" type="text" class="form-control" id="vendor_description" placeholder="Task Description">
    </div>
    <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <input name="phone_number" type="text" class="form-control" id="phone_number" placeholder="YYYY-MM-DD">
    </div>

    <div class="form-group">
        <label for="job_title">Job Title</label>
        <input name="job_title" type="text" class="form-control" id="job_title" placeholder="Choose One">
    </div>
    <button type="submit" class="btn btn-primary">Add Vendor</button>
</form>
</body>
</html>
