<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        a, a:link, a:hover, .card-text {
            color: black;
            text-decoration: none !important;
        }

        .main{
            margin-top: 45px;
        }

        .header{
            display: flex;
            justify-content: center;
        }

        .task-item {
            border: 1px solid #eaecee;
            border-radius: 8px;
            min-height: 150px;
            transition: all 0.25s ease;
            cursor: pointer;
            margin-top: 40px;
            padding: 10px;
            text-align: center;
        }

        .task-item:hover {
            transform: translate3d(0, -5px, 0);
            box-shadow: 0 2rem 5rem 0 rgba(0, 0, 0, 0.1);
        }

        .guest-name {
            font-size: 20px;
        }

        .guest-relationship {
            color: #525252;
            font-size: 15px;
        }

        .task-container > a {
            text-decoration: none;
            color: black;
        }

        .nav-button.new-post-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            font-size: 30px;
            width: 55px;
            height: 55px;
            background-color: #92dfd8;
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            vertical-align: center;
            transition: all 0.25s ease;
            z-index: 1;
        }

        .pagination-links {
            text-align: center;
        }

        .card {
            width: 50%;
            padding: 25px;
            background-color: #92dfd8;
            text-align: center;
            border: 1px solid transparent;
            border-radius: 10px;
            margin: 25px;
        }

        .card-title {
            font-size: 25px;
            font-weight: bold;
        }

        .card-text {
            font-size: 20px;
        }
    </style>
</head>
<body>
<div class="add-post">
    <a href="{{action('GuestController@create')}}">
        <div class="nav-button new-post-button">+</div>
    </a>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="item side-nav">
            @include('partials.navigation')
        </div>
    </div>
    <div class="col-sm-6">
        <div class="main">
            <div class="header">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Guests</h5>
                        <p class="card-text">{{count($guests)}} Guests</p>
                    </div>
                </div>
            </div>
            @foreach($guests as $guest)
                <div class="row-cols-2">
                    <div class="col-sm-6 task-container">
                        <a href="{{action('GuestController@show', $guest->id)}}">
                            <div class="task-item">
                                @if($guest->guest_relationship == 2 || $guest->guest_relationship == 4 || $guest->guest_relationship == 7)
                                    <div><img src="{{asset("/images/male.png")}}"></div><br>
                                @elseif($guest->guest_relationship == 3 || $guest->guest_relationship == 5 || $guest->guest_relationship == 8)
                                    <div><img src="{{asset("/images/female.png")}}"></div><br>
                                @else
                                    <div><img src="{{asset("/images/user.png")}}"></div><br>
                                @endif
                                <div class="guest-name">{{$guest->first_name}} {{$guest->last_name}}</div>
                                <div class="guest-relationship">
                                    {{App\Relationship::find($guest->guest_relationship)->relationship_value}}</div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
            <div class="row pagination-links">
                {{$guests->links()}}
            </div>
        </div>
    </div>
</div>
</body>
</html>
