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

        img {
            border: 0 transparent;
            border-radius: 5px;
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
            border: 1.5px solid #e1e1e1;
            border-radius: 8px;
            transition: all 0.25s ease;
            overflow: hidden;
            cursor: pointer;
            margin: 15px;
            padding: 5px;
        }

        .task-title {
            font-size: 1rem;
            font-weight: bold;
        }

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
            max-width: 65%;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.8em;
            max-height: 1.8em;
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
                    <a class="nav-link active" aria-current="page" href="{{route("explore-vendors.index")}}">Explore
                        Vendors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("saved-vendors.index")}}">Saved Vendors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("custom-vendors.index")}}">My Vendors</a>
                </li>
            </ul>
        </div>
        <div class="main">
            @foreach($allVendors as $vendor)
                <div class="task-container">
                    @if(isset($vendor->name))
                        <a href="{{action('ExploreVendorsController@showDetails', $vendor->name)}}">
                            @endif
                            <div class="task-item">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="vendor-image">
                                            @if(!empty($vendor->photos))
                                                <img
                                                    src="{{$vendor->photos[0]->prefix . 'original' . $vendor->photos[0]->suffix}}"
                                                    width="110px" height="110px">
                                            @else
                                                <img
                                                    src="https://oyousef.scweb.ca/lovebirds/images/default.png"
                                                    width="110px" height="110px">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="vendor-details">
                                            <div class="task-title">{{$vendor->name ?? "N/A"}}</div>
                                            <div class="task-date">{{$vendor->rating ?? "N/A"}}</div>
                                            <div class="task-date">{{$vendor->description ?? "N/A"}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
