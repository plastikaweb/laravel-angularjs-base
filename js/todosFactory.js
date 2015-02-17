/**
 * @fileOverview angularjs todosFactory.js
 * @author info@plastikaweb.com (Carlos Matheu)
 * API REST
 */
(function(){
    "use strict";

    var todosFactory = function($http){

        var factory = {}, baseUrl = '/api/todos';

        factory.getTodos = function(){
            return $http.get(baseUrl);
        };

        factory.addTodo = function(todo){
            return $http.post(baseUrl, todo);
        };

        factory.editTodo = function(todo){
            return $http.put(baseUrl + "/" + todo.id, todo);
        };

        factory.removeTodo = function(todo){
            var todoId = todo.id;
            return $http.delete(baseUrl + "/" + todoId);
        }

        return factory;
    };

    todosFactory.$inject = ['$http'];

    angular.module('mainApp').factory("todosFactory", todosFactory);

}());
