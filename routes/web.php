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

use App\Project;

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/', function () {

    return view('home')->with('name', 'CodeOcean');
});

/**
 * Projects
 */
Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/create', 'ProjectsController@create');
Route::get('/projects/{project}', 'ProjectsController@show');
Route::get('/projects/{project}/issues', 'ProjectsController@issues');
Route::get('/projects/{project}/commits', 'CommitsController@show');
Route::get('/projects/{project}/branches', 'BranchesController@show');
Route::get('/projects/{project}/tags', 'TagsController@show');
Route::get('/projects/{project}/create-on-server', 'ProjectsController@createOnServer');
Route::post('/projects', 'ProjectsController@store');
Route::post('/projects/{project}/issues/', 'IssuesController@store');

/**
 * Issues
 */
Route::get('/issues/{issue}', 'IssuesController@show');
Route::post('/issues/{issue}/comments', 'CommentsController@store');

/**
 * Authenticate
 */
Route::get('/logout', 'SessionsController@destroy');

/**
 * Pages
 */
Route::get('/privacy', 'PagesController@privacyPolicy');
Route::get('/terms', 'PagesController@terms');

/**
 * ADMIN
 */
Route::get('/admin/roles', 'RolesController@index');
Route::get('/admin/roles/create', 'RolesController@create');
Route::get('/admin/roles/{role}', 'RolesController@show');

Route::get('/admin/permissions', 'PermissionsController@index');
Route::get('/admin/permissions/create', 'PermissionsController@create');

Route::get('/admin/users', 'UsersController@index');
Route::get('/admin/users/{user}', 'UsersController@show');

Route::post('/admin/permissions', 'PermissionsController@store');
Route::post('/admin/roles', 'RolesController@store');
Route::post('/admin/roles/{role}/permissions', 'PermissionsController@assignTo');
Route::post('/admin/users/{user}/roles', 'RolesController@assignTo');

/**
 * settings
 */

Route::get('/settings/authorized-keys', 'AuthorizedKeysController@index');
Route::post('/settings/authorized-keys', 'AuthorizedKeysController@store');
Route::get('/settings/authorized-keys/{authorizedKey}/delete', 'AuthorizedKeysController@destroy');

/*Route::get('/projects', function () {
    $projects = Project::all();

    return view('projects.index', compact('projects'));
});*/

/*Route::get('/projects/{project}', function ($id) {
    $tasks = Project::find($id);

    return $tasks;

    return view('projects.show', compact('name', 'age', 'tasks'));
});*/
