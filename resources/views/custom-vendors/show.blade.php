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
            color: white;
        }

        .main {
            min-height: 150px;
            margin: 45px;
            flex-basis: 80%;
            border: 1px solid #eaecee;
            border-radius: 8px;
            transition: all 0.25s ease;
            overflow: hidden;
            cursor: pointer;
            text-align: center;
            font-size: 20px;
            box-shadow: 0 2rem 2rem 0 rgba(0, 0, 0, 0.1);
        }

        .task-header {
            padding: 15px;
            font-size: 25px;
            font-weight: bold;
            background-color: #92dfd8;
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
            margin: 30px 0 30px 0;
            color: white;
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
            <div class="task-header">
                Vendor Details
                <link src="{{asset("./images/ic_edit.png")}}"/>
                {{--        <button type="button" class="carousel-control-next-icon">--}}
                {{--            <span aria-hidden="true">&times;</span>--}}
                {{--        </button>--}}
            </div>
            <div class="task-title">
                <div class="title title-label">Vendor</div>
                <div>{{$vendor->vendor_name}}</div>
            </div>
            <div class="task-date">
                <div class="title date-label">Description</div>
                <div>{{$vendor->vendor_description}}</div>
            </div>
            <div class="task-description">
                <div class="title description-label">Job Title</div>
                <div> {{$vendor->job_title}}</div>
            </div>
            <div class="task-cost">
                <div class="title cost-label">Phone Number</div>
                <div> {{$vendor->phone_number}}</div>
            </div>
            <div class="task-actions align-items-center">
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"
                        style="background-color: #ff8585">Delete Vendor
                </button>
                <div>
                    <a href="tel:{{$vendor->phone_number}}" class="btn" style="background-color: #95e28e">Contact Vendor</a>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deletion Confirmation</h5>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete the vendor "{{$vendor->vendor_name}}"
                        </div>
                        <div class="modal-footer">
                            <button type="button" style="background-color: #ff8585" class="btn"
                                    data-dismiss="modal">Cancel
                            </button>
                            <form method="post" action="{{action('CustomVendorController@destroy', $vendor->id)}}">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <div><input type="submit" style="background-color: #95e28e" value="Confirm"
                                            class="btn"></div>
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
