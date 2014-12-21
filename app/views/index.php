<!doctype html>
<html lang="en" ng-app="mainApp">
<head>
    <meta charset="UTF-8">
    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--  Mobile Viewport Fix -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angularjs | Laravel</title>

    <!-- Bootstrap -->
    <link href="packages/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="container" ng-controller="TodosController">
        <div class="header">
            <h3>Todos
                <small ng-show="selected().length">
                    ({{ selected().length }} selected)
                </small>
            </h3>


        </div>
        <div class="jumbotron">
            <div class="clearfix">
                <input type="text" class="form-control" placeholder="Filter todos" ng-model="search">
            </div>
            <div>&nbsp;</div>

            <div class="row">
                <div class="col-lg-6" ng-repeat="todo in todos | filter:search">
                    <form class="form-inline" role="form">
                        <div class="ckeckbox">
                            <input type="checkbox" ng-model="todo.completed" ng-change="changeTodo(todo)">
                            <label>{{ todo.body }}</label>
                            <button type="button" class="btn btn-link btn-xs" ng-click="removeTodo(todo.id)"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        </div>
                    </form>
                </div>
            </div>

            <form class="form-inline" ng-submit="addTodo()" role="form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Add new todo task" ng-model="newTodoBody">
                </div>
                <button class="btn btn-default" type="submit">Add Task</button>
            </form>
        </div>

        <footer class="footer">
            <p>© Plastikaweb 2014</p>
        </footer>
    </div>

    <script src="/packages/angularjs/angular.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/todosFactory.js"></script>
    <script src="/js/todosController.js"></script>
</body>
</html>
