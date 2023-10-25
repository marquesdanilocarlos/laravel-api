<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/alunos', function(){
    echo 'Lista de alunos';
});

Route::get('/alunos/{id}', function(){
    echo 'Dados do aluno';
});

Route::post('/alunos', function(){
    echo 'Inclusão de alunos';
});

Route::put('/alunos/1', function (){
    echo 'Edição de aluno';
});

Route::delete('/alunos/1', function (){
    echo 'Deleção de aluno';
});
