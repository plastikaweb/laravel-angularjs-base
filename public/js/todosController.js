/**
 * @fileOverview angularjs todosController.js
 * @author info@plastikaweb.com (Carlos Matheu)
 */
(function(){
    "use strict";

    var TodosController = function($scope, todosFactory) {

        $scope.todos = {};
        $scope.newTodo = {};

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
        $scope.removeTodo = function(todoId){
            todosFactory.removeTodo(todoId)
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
         * check the selected todo tasks
         * @returns {Array}
         */
        $scope.selected = function(){
            var count = [];
            angular.forEach($scope.todos, function(todo){
                if(todo.completed){
                    count.push(todo);
                }
            });

            return count;
        };

        /**
         * change the completed field of a todo task
         * @param {Object} [todo]
         */
        $scope.changeTodo = function(todo){
                todosFactory.editTodo(todo)
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


    };

    TodosController.$inject = ['$scope', 'todosFactory'];

    angular.module('mainApp')
        .controller('TodosController', TodosController);

})();