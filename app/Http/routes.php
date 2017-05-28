<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Authentification
//Route::group(['']);
Route::resource('user', 'UserController');
Route::resource('badget','BadgetController');
Route::resource('universite','UniversiteController');
Route::resource('terme','TermeController');
Route::resource('type','TypeController');
// Route::resource('type_d_exercices','Type_d_exerciceController');
Route::resource('forum','ForumController');
Route::resource('commentaire','CommentaireController');
Route::resource('tutoriel','TutorielController');
Route::get('tutoriel/{id}/ecriture','TutorielController@edit_tutoriel')->name('tutoriel.edit_tutoriel');
Route::get('chapitre/{id}/ecriture','ChapitreController@edit_chapitre')->name('chapitre.edit_chapitre');
Route::resource('niveau','NiveauController');

//Route::resource('chapitre','ChapitreController');
Route::get('tutoriel/{tuto_id}/chapitre/create', 'ChapitreController@create')->name('chapitre.create');
Route::get('chapitre/{chapitre}/edit', 'ChapitreController@edit')->name('chapitre.edit');
Route::post('chapitre/{chapitre}', 'ChapitreController@store')->name('chapitre.store');
Route::put('chapitre/{chapitre}', 'ChapitreController@update')->name('chapitre.update');
Route::delete('chapitre/{chapitre}', 'ChapitreController@destroy')->name('chapitre.destroy');

//Route::resource('section','SectionController');
Route::get('chapitre/{chap_id}/section/create', 'SectionController@create')->name('section.create');

Route::resource('exercice','ExerciceController');
Route::resource('question','QuestionController');
Route::resource('corrige','CorrigeController');
Route::resource('exercice','ExerciceController');
Route::resource('question','QuestionController');
Route::resource('corrige','CorrigeController');
Route::resource('projet','ProjetController');
Route::resource('type_utilisateur','Type_utilisateurController');
Route::resource('domain','DomainController');
Route::auth();

Route::get('/', 'HomeController@index')->name('home');
