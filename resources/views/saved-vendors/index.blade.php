<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        a, a:hover, a:link, a:active, a:visited {
            text-underline: none !important;
            text-decoration: none !important;
        }

        .main {
            margin: 5%;
        }

        .vendors-tabs {
            display: flex;
            justify-content: center;
            width: 75%;
            font-size: 20px;
            margin: 45px auto;
        }

        .active {
            border-bottom: 4px solid #ff8585;
        }

        .task-item {
            border: 1px solid #eaecee;
            border-radius: 8px;
            transition: all 0.25s ease;
            overflow: hidden;
            cursor: pointer;
            margin: 5% 5%;
            padding: 10px;
        }

        .task-title {
            font-size: 23px;
        }

        /*.task-price {*/
        /*    font-size: 18px;*/
        /*    text-align: right;*/
        /*    font-weight: bold;*/
        /*    margin-right: 10px;*/
        /*}*/

        .task-date {
            color: #525252;
            font-size: 16px;
        }

        .task-item:hover {
            transform: translate3d(0, -5px, 0);
            box-shadow: 0 2rem 5rem 0 rgba(0, 0, 0, 0.1);
        }

        .task-title {
            font-size: 20px;
        }

        .task-date {
            color: #525252;
            font-size: 15px;
        }

        .task-container > a {
            text-decoration: none;
            color: black;
        }

        body {
            color: black;
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
    <div class="col-sm-8">
        <div class="vendors-tabs">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route("explore-vendors.index")}}">Explore
                        Vendors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Saved Vendors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("custom-vendors.index")}}">My Vendors</a>
                </li>
            </ul>
        </div>
        <div class="main">
            @foreach($vendors as $vendor)
                <div class="task-container">
                    <a href="{{action('SavedVendorsController@show', $vendor->id)}}">
                        <div class="task-item">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="task-price">
                                        <img src="{{$vendor->vendor_image}}" width="100px" height="100px">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="vendor-details">
                                        <div class="task-title">{{$vendor->vendor_title}}</div>
                                        <div class="task-date">{{$vendor->vendor_rating}}</div>
                                        <div class="task-date">{{$vendor->vendor_description}}</div>
                                    </div>
                                </div>
                    </a>
                </div>
        </div>
    </div>
    @endforeach
</div>
</div>
</div>
</div>
</body>
</html>
