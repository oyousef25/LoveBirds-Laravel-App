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
            color: white;
            display: flex;
            justify-content: center;
        }

        .task-actions button {
            font-weight: bold;
            padding: 16px 75px;
            border: 2px solid #ff8585;
            border-radius: 10px;
            margin: 4px;
            background-color: #ff8585
        }

        .task-actions button:hover{
            background-color: transparent;
            transition: 0.2s;
            color: #f48b8b;
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
        <div class="page-container">
            <div class="main">
                <div class="vendor-image">
                    <img src="{{$vendor->vendor_image}}"/>
                </div>
                <div class="vendor-details">
                    <div class="vendor-title">
                        <div>{{$vendor->vendor_title}}</div>
                    </div>
                    <div class="vendor-data">
                        <div>{{$vendor->vendor_rating}}</div>
                    </div>
                    <div class="vendor-data">
                        <div> {{$vendor->vendor_description}}</div>
                    </div>
                    <div class="vendor-data">
                        <div> {{$vendor->vendor_location}}</div>
                    </div>
                    <div class="vendor-data">
                        <div> {{$vendor->vendor_phone}}</div>
                    </div>
                    <div class="vendor-data">
                        <div> {{$vendor->vendor_website}}</div>
                    </div>
                    <div class="task-actions align-items-center">
                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">Remove from saved
                        </button>
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
</div>
</body>
</html>
