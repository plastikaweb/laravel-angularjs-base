/**
 * @fileOverview angularjs todosController.js
 * @author info@plastikaweb.com (Carlos Matheu)
 */
(function(){
    "use strict";

    var TodosController = function($scope, $filter, todosFactory) {

        $scope.todos = {};
        $scope.newTodo = {};
        $scope.pendingCount = 3;
        /**
         * get todos list on load
         */
        function init(){
            todosFactory.getTodos()
                .success(function(todos){
                    $scope.todos = todos;
                })
                .error(function(data, status, headers, config){
                    console.log(data.error + " " + status);
                });
        }

        init();

        /**
         * add new todo task to database
         */
        $scope.addTodo = function(){

            todosFactory.addTodo($scope.newTodo)
                .success(function(data){
                    $scope.todos.push(data);
                    $scope.newTodo = {};
                })
                .error(function(data, status, headers, config){
                    console.log(data.error + " " + status);
                });
        };

        /**
         * delete a todo task from database
         * @param {Number} [todoId]
         */
        $scope.removeTodo = function(todo){
            todosFactory.removeTodo(todo)
                .success(function(data){
                    console.log(data);
                    if(data){
                        init();
                    }else{
                        console.log('unable to delete the task');
                    }
                })
                .error(function(data, status, headers, config){
                    console.log(data.error + " " + status);
                });


        };


        /**
         * listen to todos task pending
         * @returns {Number}
         */
        $scope.$watch('todos', function(){
            $scope.pendingCount = $filter('filter')($scope.todos, {completed: false}).length;
        }, true);


        /**
         * change the completed field of a todo task
         * @param {Object} [todo]
         */
        $scope.changeTodo = function(todo){
                todosFactory.editTodo(todo)
                    .success(function(data){
                        if(data){
                            console.log('state changed to complete');
                        }else{
                            console.log('unable to change state');
                        }
                    })
                    .error(function(data, status, headers, config){
                        console.log(data.error + " " + status);
                    });
            };

    };

    TodosController.$inject = ['$scope', '$filter', 'todosFactory'];

    angular.module('mainApp')
        .controller('TodosController', TodosController);

})();