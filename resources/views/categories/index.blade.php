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
            margin: 5%;
        }

        .task-item {
            border: 1px solid #eaecee;
            border-radius: 8px;
            min-height: 150px;
            transition: all 0.25s ease;
            overflow: hidden;
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

        #chartContainer{
            margin-top: 35px;
        }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
<script type="text/javascript">
    window.onload = function () {
        var data = [];
        @foreach($categories as $category)
            data.push({label: "{{$category->category_name}}", y: {{$category->tasks()->count()}}})
        @endforeach
        var options = {
            title: {
                text: "Budget Categories"
            },
            data: [{
                type: "pie",
                startAngle: 45,
                showInLegend: "true",
                legendText: "{label}",
                indexLabel: "{label} ({y})",
                yValueFormatString: "#,##0.#" % "",
                dataPoints: data
            }]
        };
        $("#chartContainer").CanvasJSChart(options);

    }
</script>
<div class="add-post">
    <a href="{{action('BudgetCategoriesController@create')}}">
        <div class="nav-button new-post-button">+</div>
    </a>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="item side-nav">
            @include('partials.navigation')
        </div>
    </div>
    <div class="col-sm-8">
        <div>
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
        </div>
        @foreach($categories as  $category)
            <div class="row-cols-2">
                <div class="col-sm-6 task-container">
                    <a href="{{action('BudgetCategoriesController@show', $category->id)}}">
                        <div class="task-item">
                            <div class="guest-name">{{$category->category_name}}</div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>
