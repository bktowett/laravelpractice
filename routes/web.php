<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Services\Twitter;

Route::get('/', function (Twitter $twitter) {
    dd($twitter);
    return view('welcome');
});

/**
 *
 * GET /projects (index) => show the resources
 * GET /projects/create (create) => form to create the resource
 * GET /projects/1 (show)  => show a specific project
 * POST /projects (store) => create the resource
 * GET /projects/1/edit (edit) => form to update the resource
 * PATCH /projects/1 (update)=>update
 * DELETE /projects/1 (destroy)=>delete by id
 */
/*#show projects
Route::get('/projects',"ProjectsController@index");
#show project creation form
Route::get('/projects/create',"ProjectsController@create");
#show specific resource
Route::get('/projects/{project}',"ProjectsController@show");
#store a created project
Route::post('/projects',"ProjectsController@store");
#form to edit the resource
Route::get('/projects/{project}/edit',"ProjectsController@edit");
#update a resource
Route::patch('/projects/{project}',"ProjectsController@update");
#delete a resource
Route::delete('/projects/{project}',"ProjectsController@destroy");*/

//Simpler way of achieving the above
//Route::resource('projects','ProjectsController')->middleware('can:update, project');
Route::resource('projects','ProjectsController');
//Route::resource('tasks','ProjectTaskController');
Route::post('/projects/{project}/tasks','ProjectTaskController@store');
Route::patch('/tasks/{task}','ProjectTaskController@update');
//Route::resource('parts','PartsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
