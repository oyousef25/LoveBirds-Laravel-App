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
        }

        .main{
            margin: 45px;
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
            /*box-shadow: 0 1rem 2rem 0 rgba(0, 0, 0, 0.1);*/
        }

        button {
            height: 45px;
            width: 100%;
            color: white;
            background-color: #ff8585;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-sm-3">
        <div class="item side-nav">
            @include('partials.navigation')
        </div>
    </div>
    <div class="col-sm-6">
        <div class="main">
            <h1>Create Vendor</h1>
            <form method="POST" action="{{ action('CustomVendorController@store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="vendor_name">Vendor</label>
                    <input name="vendor_name" type="text" class="form-control" id="vendor_name"
                           placeholder="Enter the name of the vendor(ie. Omar)">
                </div>
                <div class="form-group">
                    <label for="vendor_description">Description</label>
                    <textarea name="vendor_description" type="text" class="form-control" id="vendor_description"
                              placeholder="Enter a description"></textarea>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input name="phone_number" type="text" class="form-control" id="phone_number"
                           placeholder="(123)456-7890">
                </div>

                <div class="form-group">
                    <label for="job_title">Job Title</label>
                    <input name="job_title" type="text" class="form-control" id="job_title"
                           placeholder="Enter the job title(ie. barber)">
                </div>
                <button type="submit" class="btn">Add Vendor</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
