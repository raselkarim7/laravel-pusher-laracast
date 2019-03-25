<?php

use App\Task;
use App\Events\TaskCreated;


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function (){
    return view('home');
});

\Illuminate\Support\Facades\Auth::routes();
Route::get('/home', function (){
    return view('home');
});

Route::get('/projects/{id}', 'ProjectController@getProjectView');
Route::get('/getjsonprojects/{id}', 'ProjectController@getJsonProject');

Route::get('/tasks', function (){
    return Task::latest()->pluck('body');
});

Route::post('/tasks', function (){
    $task = Task::forceCreate(request(['body', 'project_id']));
    event(
        new TaskCreated($task)
    );
});


