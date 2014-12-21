<?php

Route::get('/', function() {
    return View::make('index');
});

Route::group(array('prefix' => 'api'), function(){
   Route::resource('todos', 'TodoController');
});

