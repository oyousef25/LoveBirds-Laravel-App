<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .page-container{
            display: flex;
            justify-content: center;
        }

        .main {
            max-width: 500px;
            min-height: 150px;
            margin: 45px;
            flex-basis: 80%;
            border: 1px solid #eaecee;
            border-radius: 8px;
            transition: all 0.25s ease;
            overflow: hidden;
            cursor: pointer;
            font-size: 20px;
            box-shadow: 0 2rem 2rem 0 rgba(0, 0, 0, 0.1);
        }

        .vendor-details {
            margin: 25px 45px;
        }

        .vendor-image {
            max-width: 300px;
            max-height: 300px;
            display: flex;
            justify-content: center;
        }

        .vendor-title {
            margin-bottom: 15px;
            font-weight: bold;
        }

        .vendor-data {
            color: #969696;
            font-size: 75%;
            margin-bottom: 25px;
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
        <div class="page-container">
            <div class="main">
                <div class="vendor-image">
                    @if(!empty($vendor->photos))
                        <img
                            src="{{$vendor->photos[0]->prefix . 'original' . $vendor->photos[0]->suffix}}">
                    @else
                        <img
                            src="https://oyousef.scweb.ca/lovebirds/images/default.png">
                    @endif
                </div>
                <div class="vendor-details">
                    <div class="vendor-title">
                        <div>{{$vendor->name ?? 'N/A'}}</div>
                    </div>
                    <div class="vendor-data">
                        <div>{{$vendor->rating ?? 'N/A'}}</div>
                    </div>
                    <div class="vendor-data">
                        <div> {{$vendor->description ?? 'N/A'}}</div>
                    </div>
                    <div class="vendor-data">
                        <div> {{$vendor->location->address ?? 'N/A'}}</div>
                    </div>
                    <div class="vendor-data">
                        <div> {{$vendor->tel ?? 'N/A'}}</div>
                    </div>
                    <div class="vendor-data">
                        <div> {{$vendor->website ?? 'N/A'}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
