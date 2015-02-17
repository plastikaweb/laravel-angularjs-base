<!doctype html>
<html lang="en" ng-app="mainApp">
<head>
    <meta charset="UTF-8">
    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <!--  Mobile Viewport Fix -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angularjs | Laravel</title>

    <!-- Bootstrap -->
    <link href="packages/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="container" ng-controller="TodosController">
<div class="row-fluid">
    <div class="col-md-8 col-md-offset-2">
        <div class="jumbotron">
            <h1>My Todo List</h1>

            <form name="todoForm" ng-submit="addTodo()">
                <div class="input-group input-group-lg">
                    <input required ng-minlength="3" name="body" type="text" class="form-control input-lg"
                           placeholder="Add new todo task" ng-model="newTodo.body">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-success" ng-disabled="todoForm.$invalid">Add task</button>
                      </span>
                </div>
                <small>Type a word of 3 or more characters</small>
            </form>
        </div>

        <div class="clearfix">
            <input type="text" class="form-control input-lg" placeholder="Filter todos" ng-model="search.body">
        </div>

        <div id="taskList" class="list-group">
            <div class="list-group-item task"
                 ng-repeat="todo in todos | filter:search:strict | orderBy: 'body' ">
                <label class="description" ng-class="{strike: todo.completed}">
                    <input autofocus type="checkbox" ng-model="todo.completed"
                           ng-change="changeTodo(todo)">
                    {{ todo.body }}</label>
                <button type="button" class="btn btn-primary btn-xs" ng-click="removeTodo(todo)">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>

            </div>
        </div>

        <span id="todo-count">
      <h4>{{ pendingCount }}
          <ng-pluralize count="pendingCount" when="{one: 'item left', other: 'items left'}">
          </ng-pluralize>

      </h4>
    </span>


        <footer class="footer">
            <p>© Plastikaweb 2014 - 2015</p>
        </footer>
    </div>

    <script src="/packages/angularjs/angular.min.js"></script>
    <script src="/packages/angularjs/angular-animate.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/todosFactory.js"></script>
    <script src="/js/todosController.js"></script>
</body>
</html>
