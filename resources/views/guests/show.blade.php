<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        a, a:link, a:hover, .card-text {
            color: white;
            text-decoration: none !important;
        }

        .main {
            min-height: 150px;
            margin: 45px;
            flex-basis: 80%;
            overflow: hidden;
            cursor: pointer;
            text-align: center;
            font-size: 20px;
        }

        .guest-box {
            padding-bottom: 25px;
            border: 1px solid #eaecee;
            border-radius: 8px;
            box-shadow: 0 0.5rem 0.5rem 0 rgba(0, 0, 0, 0.1);
        }

        .task-header {
            display: flex;
            justify-content: center;
            padding: 15px;
            font-size: 25px;
            font-weight: bold;
            background-color: #92dfd8;
        }

        .task-header a {
            right: 0;
        }

        .title {
            margin-top: 25px;
            margin-bottom: 5px;
            font-size: 18px;
            color: #92dfd8;
        }

        .task-actions {
            margin-top: 35px;
        }

        .modal-header {
            background-color: #92dfd8;
        }

        .modal-title {
            font-weight: bold;
            font-size: 20px;
        }

        .task-actions {
            width: 100%;
            margin: 0 auto;
            color: white;
        }

        .actions-container {
            width: 100%;
            margin: 30px auto 30px auto;
        }

        .task-actions .btn {
            padding: 16px;
            width: 300px;
            margin: 4px;
        }

        .modal-footer {
            display: flex;
            flex-wrap: nowrap;
            overflow: hidden;
            width: 400px;
            margin: 0 auto;
            color: white;
        }

        .modal-footer button, .modal-footer input {
            padding: 16px;
            width: 150px;
            margin: 16px;
            outline: none;
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
            <div>
                @if($guest->guest_relationship == 2 || $guest->guest_relationship == 4 || $guest->guest_relationship == 7)
                    <div><img src="{{asset("/images/male.png")}}"></div><br>
                @elseif($guest->guest_relationship == 3 || $guest->guest_relationship == 5 || $guest->guest_relationship == 8)
                    <div><img src="{{asset("/images/female.png")}}"></div><br>
                @else
                    <div><img src="{{asset("/images/user.png")}}"></div><br>
                @endif
            </div>
            <div class="guest-box align-items-center">
                <div class="task-header">
                    <p>Guest Information</p>
                        <a class="" href="{{action('GuestController@edit', $guest->id)}}">
                            <img src="{{asset("/images/ic_edit.png")}}"/>
                        </a>
                </div>
                <div class="task-title">
                    <div class="title title-label">Full Name</div>
                    <div>{{$guest->first_name}} {{$guest->last_name}}</div>
                </div>
                <div class="task-date">
                    <div class="title date-label">Relationship</div>
                    <div>{{$relationship_value}}</div>
                </div>
                <div class="task-description">
                    <div class="title description-label">E-mail Address</div>
                    <div> {{$guest->email_address}}</div>
                </div>
                <div class="task-cost">
                    <div class="title cost-label">Phone Number</div>
                    <div> {{$guest->phone_number}}</div>
                </div>
            </div>
            <div class="actions-container align-items-center">
                <div class="row task-actions">
                    <div class="col-sm-6">
                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"
                                style="background-color: #ff8585">Remove Guest
                        </button>
                    </div>
                    <div class="col-sm-6">
                        <a href="mailto:{{$guest->email_address}}" class="btn" style="background-color: #95e28e">Contact Guest</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deletion Confirmation</h5>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete the guest "{{$guest->first_name}} {{$guest->last_name}}"
                        </div>
                        <div class="modal-footer">
                            <button type="button" style="background-color: #ff8585" class="btn" data-dismiss="modal">
                                Cancel
                            </button>
                            <form method="post" action="{{action('GuestController@destroy', $guest->id)}}">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <div><input type="submit" style="background-color: #95e28e" value="Confirm" class="btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
