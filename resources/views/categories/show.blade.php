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

        .main {
            min-height: 150px;
            margin: 5%;
            flex-basis: 80%;
            overflow: hidden;
            cursor: pointer;
            font-size: 20px;
        }

        .guest-box {
            text-align: center;
            padding-bottom: 25px;
            border: 1px solid #eaecee;
            border-radius: 8px;
            box-shadow: 0 0.5rem 0.5rem 0 rgba(0, 0, 0, 0.1);
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

        .modal-header {
            background-color: #92dfd8;
        }

        .modal-title {
            font-weight: bold;
            font-size: 20px;
        }

        .actions-container {
            display: flex;
            justify-content: center;
            margin-top: 25px;
            color: white;
        }

        .task-actions button {
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

        .task-item {
            border: 1px solid #eaecee;
            border-radius: 8px;
            min-height: 150px;
            transition: all 0.25s ease;
            cursor: pointer;
            margin-top: 5%;
            padding: 10px;
        }

        .task-item:hover {
            transform: translate3d(0, -5px, 0);
            box-shadow: 0 2rem 5rem 0 rgba(0, 0, 0, 0.1);
        }

        .task-title {
            font-size: 20px;
        }

        .task-price {
            font-size: 18px;
            text-align: right;
            font-weight: bold;
            margin-right: 10px;
        }

        .task-date {
            color: #525252;
            font-size: 15px;
        }

        .task-container > a {
            text-decoration: none;
            color: black;
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
            <div class="main">
                <div class="guest-box align-items-center">
                    <div class="task-header">
                        Category Information
                        <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil"
                     viewBox="0 0 16 16"><path
                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
            </span>
                    </div>
                    <div class="task-title">
                        <div class="title title-label">Category Name</div>
                        <div>{{$category->category_name}}</div>
                    </div>
                </div>
                <div class="actions-container align-items-center">
                    <div class="row task-actions">
                        <div class="col-sm-6">
                            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"
                                    style="background-color: #ff8585">Remove Category
                            </button>
                        </div>
                    </div>
                </div>
                <div class="task-list">
                    @foreach($category->tasks as $task)
                        <div class="task-container">
                            <a href="{{action('TaskController@show', $task->id)}}">
                                <div class="task-item">
                                    <div class="task-title">{{$task->task_title}}</div>
                                    <div class="task-price">${{$task->task_price}} ></div>
                                    <div class="task-date">Due by {{$task->due_date}}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Deletion Confirmation</h5>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete the category "{{$category->category_name}}"
                            </div>
                            <div class="modal-footer">
                                <button type="button" style="background-color: #ff8585" class="btn"
                                        data-dismiss="modal">Cancel
                                </button>
                                <form method="post"
                                      action="{{action('BudgetCategoriesController@destroy', $category->id)}}">
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
