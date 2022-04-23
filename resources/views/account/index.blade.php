<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
    <style>
        .main {
            font-family: 'Roboto Slab', serif;
        }

        .box {
            min-height: 150px;
            margin: 45px;
            border: 1px solid #eaecee;
            border-radius: 8px;
            transition: all 0.25s ease;
            overflow: hidden;
            cursor: pointer;
            font-size: 20px;
            box-shadow: 0 2rem 2rem 0 rgba(0, 0, 0, 0.1);
        }

        .main > h1 {
            margin: 45px;
            font-weight: bold;
        }

        .account-header {
            padding: 15px;
            font-size: 25px;
            font-weight: bold;
            background-color: #92dfd8;
            display: flex;
            justify-content: space-between;
        }

        .account-header-title {
            text-align: center;
            width: 200%;
        }

        .account-header-icon {
            max-width: 35px;
            max-height: 35px;
            float: right;
        }

        .account-box {
            margin: 10px;
        }

        .account-label {
            color: #969696;
        }

        .partner-box {
            margin-top: 20px;
        }

        .tasks-box {
            text-align: center;
            margin-top: 135px;
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
            <h1>Welcome, {{$currentUser->name}}!</h1>
            <div class="box user-box">
                <div class="account-header">
                    <p class="account-header-title">Account Details</p>
                    <a class="" href="{{action('AccountController@edit', $currentUser->id)}}">
                        <img class="account-header-icon" src="{{asset("./images/ic_edit.png")}}"/>
                    </a>
                </div>
                <div class="account-box">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="account-label">Name</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="account-value">{{$currentUser->name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="account-label">Email</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="account-value">{{$currentUser->email}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="account-label">Password</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="account-value">*****</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="account-label">Wedding Day</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="account-value">{{$currentUser->wedding_date}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box partner-box">
                <div class="account-header">
                    <p class="account-header-title">Partner Details</p>
                    <a class="" href="{{route('invite')}}">
                        <img class="account-header-icon" src="{{asset("./images/ic_edit.png")}}"/>
                    </a>
                </div>
                <div class="account-box">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="account-label">Name</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="account-value">{{$userPartner->name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="account-label">Email</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="account-value">{{$userPartner->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box tasks-box">
            <div class="account-header">
                <p class="account-header-title">Tasks</p>
            </div>
            <div class="account-box">
                <p>{{count($currentUserTasks)}}</p>
                <p>remaining</p>
            </div>
        </div>
        <div class="box tasks-box">
            <div class="account-header">
                <p class="account-header-title">Partner</p>
            </div>
            <div class="account-box">
                <p>{{count($userPartnerTasks)}}</p>
                <p>remaining</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
