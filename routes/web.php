<?php

use App\Http\Controllers\Admin\AssessoriaController;
use App\Http\Controllers\Admin\AssuntoController;
use App\Http\Controllers\Admin\ConsultaController;
use App\Http\Controllers\Admin\ConviteController;
use App\Http\Controllers\Admin\DocumentoController;
use App\Http\Controllers\Admin\EnvController;
use App\Http\Controllers\Admin\ETLController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoteController;
use App\Http\Controllers\Admin\SearchDocument;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\TipoDocumentoController;
use App\Http\Controllers\Admin\UnidadeController;
use App\Http\Controllers\Admin\UnidadeConvitesController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Auth\PrimeiroAcessoController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
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

// Route::get('details', function (Request $request) {

//     $ip = "187.65.85.199";//$request->ip();
//     //dd($ip);
//     $data = \Location::get($ip);
//     dd($data);
   
// });
Route::get('/', [IndexController::class, 'index'])->name('index');
// Route::get('/consultas', 'Admin\ConsultaController@public')->name('consultas-public');
Route::get('/consultas', [ConsultaController::class, 'public'])->name('consultas-public');
// Route::get('/downloads', 'IndexController@downloads')->name('downloads-public');
Route::get('/downloads', [IndexController::class, 'downloads'])->name('downloads-public');
// Route::get('/conselhos', 'Admin\UnidadeController@search')->name('unidades-search');
Route::get('/conselhos', [UnidadeController::class, 'search'])->name('unidades-search');
// Route::get('/conselhos/{url}', 'Admin\UnidadeController@page')->name('unidades-page');
Route::get('/conselhos/{url}', [UnidadeController::class, 'page'])->name('unidades-page');
Route::get('/login', [LoginController::class, 'login']);
Route::match('get', '/normativa/pdf/{normativaId}', [
    'uses' => 'PDFController@pdfNormativa',
    'as' => 'pdfNormativa',
]);
Route::match('get', '/normativa/view/{normativaId}', [
    'uses' => 'IndexController@viewNormativa',
    'as' => 'viewNormativa',
]);
Route::match('get', '/filter', [
    'uses' => 'IndexController@filter',
    'as' => 'filterNormativa',
]);
// Route::get('documento/delete/{arquivoId}', 'IndexController@delete')->name('delete-elastic');
Route::get('documentos/delete/{arquivoId}', [IndexController::class, 'delete'])->name('delete-elastic');
Route::get('errors/500', function () {
    return view('errors/500');
});

Route::get('errors/404', function () {
    return view('errors/404');
});

// Route::get('/primeiro-acesso', 'Auth\PrimeiroAcessoController@first')->name('primeiro-acesso');
Route::get('/primeiro-acesso', [PrimeiroAcessoController::class, 'first'])->name('primeiro-acesso');
// Route::post('/solicitar-acesso', 'Auth\PrimeiroAcessoController@request')->name('solicitar-acesso');
Route::post('solicitar-acesso', [PrimeiroAcessoController::class, 'request'])->name('solicitar-acesso');

Route::prefix('admin')->middleware('auth')->namespace('Admin')->group(function(){
    // Route::get('getenv', 'EnvController@getenv')->name('getenv');
    Route::get('getenv', [EnvController::class, 'getenv'])->name('getenv');
    // Route::get('home', 'HomeController@index')->name('home');
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('guia', function () {
        return view('admin/guide');
    })->name('guia');    
    // Route::get('convites', 'ConviteController@index')->name('convites');
    Route::get('convites', [ConviteController::class, 'index'])->name('convites');
    // Route::get('unidades', 'UnidadeController@index')->name('unidades');
    Route::get('unidades', [UnidadeController::class, 'index'])->name('unidades');
    // Route::post('unidades', 'UnidadeController@store')->name('unidade-store');
    Route::Post('unidades', [UnidadeController::class, 'store'] )->name('unidade-store');
    // Route::post('unidades/salvar', 'UnidadeController@save')->name('unidade-save');
    Route::post('unidades/salvar', [UnidadeController::class, 'save'])->name('unidade-save');
    //Route::post('unidades/novo-acesso', 'UnidadeController@novoAcesso')->name('unidade-novo-acesso');
    Route::post('unidades/novo-acesso', [UnidadeController::class, 'novoAcesso'])->name('unidade-novo-acesso');
    // Route::get('unidades/conviteNova', 'UnidadeConvitesController@conviteNova')->name('unidade-convite-nova');
    Route::get('unidades/conviteNova', [UnidadeConvitesController::class, 'conviteNova'])->name('unidade-convite-nova');
    // Route::post('unidades/convidar', 'UnidadeConvitesController@convidar')->name('unidade-convidar');
    Route::post('unidades/convidar', [UnidadeConvitesController::class, 'convidar'])->name('unidade-convidar');
    // Route::get('unidades/nova', 'UnidadeController@create')->name('unidade-create');
    Route::get('unidade/nova', [UnidadeController::class, 'create'])->name('unidade-create');
    // Route::get('unidades/{id}/edit', 'UnidadeController@edit')->name('unidade-edit');
    Route::get('unidades/{id}/edit', [UnidadeController::class, 'edit'])->name('unidade-edit');
    // Route::get('unidades/{id}/show', 'UnidadeController@show')->name('unidade-show');
    Route::get('unidade/{id}/show', [UnidadeController::class, 'show'])->name('unidade-show');
    // Route::get('unidades/{id}/delete', 'UnidadeController@destroy')->name('unidade-delete');
    Route::get('unidades/{id}/delete', [UnidadeController::class, 'destroy'])->name('unidade-delete');
    // Route::get('unidades/{id}/force-delete', 'UnidadeController@forceDelete')->name('unidade-force-delete');
    Route::get('unidades/{id}/force-delete', [UnidadeController::class, 'forceDelete' ])->name('unidade-force-delete');
    // Route::get('unidades/{id}/restore', 'UnidadeController@restore')->name('unidade-restore');
    Route::get('unidades/{id}/restore', [UnidadeController::class, 'restore'])->name('unidade-restore');
    // Route::get('unidades/gestor/new', 'UsuarioController@newGestor')->name('usuario-new-gestor');
    Route::get('unidades/gestor/new', [UsuarioController::class, 'newGestor'])->name('usuario-new-gestor');
    // Route::get('unidades/{unidadeId}/novo-responsavel/{usuarioId}', 'UnidadeController@novoResponsavel')->name('unidade-novo-responsavel');
    Route::get('unidades/{unidadeId}/novo-responsavel/{usuarioId}', [UnidadeController::class, 'novoResponsavel'])->name('unidade-novo-responsavel');
    // Route::get('unidades/assessorias', 'AssessoriaController@index')->name('assessorias');
    Route::get('unidades/assessorias', [AssessoriaController::class, 'index'])->name('assessoria');
    // Route::get('unidades/assessoria/nova', 'AssessoriaController@create')->name('assessoria-create');
    Route::get('unidades/assessoria/nova', [AssessoriaController::class, 'create'])->name('assessoria-create');
    // Route::post('unidades/assessoria', 'AssessoriaController@store')->name('assessoria-store');
    Route::post('unidades/assessoria', [AssessoriaController::class, 'store'])->name('assessoria-store');
    // Route::get('tiposdocumento', 'TipoDocumentoController@index')->name('tiposdocumento');
    Route::get('tiposdocumento', [TipoDocumentoController::class, 'index'])->name('tiposdocumento');
    // Route::get('assuntos', 'AssuntoController@index')->name('Assuntos');
    Route::get('assuntos', [AssuntoController::class, 'index'])->name('Assuntos');
    // Route::get('assuntos/novo', 'AssuntoController@create')->name('assuntos-create');
    Route::get('assuntos/novo', [AssuntoController::class, 'create'])->name('assuntos-create');
    // Route::post('assuntos/salvar', 'AssuntoController@store')->name('assunto-store');
    Route::post('assuntos/salvar', [AssuntoController::class, 'store'])->name('assunto-store');
    // Route::get('assuntos/editar/{id}', 'AssuntoController@edit')->name('assunto-edit');
    Route::get('assuntos/editar/{id}', [AssuntoController::class, 'edit'])->name('assunto-edit');
    // Route::get('assuntos/delete/{id}', 'AssuntoController@destroy')->name('assunto-delete');
    Route::get('assuntos/delete/{id}', [AssuntoController::class, 'destroy'])->name('assunto-delete');
    // Route::get('assuntos/removidos', 'AssuntoController@trashed')->name('assunto-removidos');
    Route::get('assuntos/removidos', [AssuntoController::class, 'trashed'])->name('assunto-removidos');
    // Route::get('assuntos/restaurar/{id}', 'AssuntoController@restore')->name('assunto-restore');
    Route::get('assuntos/restaurar/{id}', [AssuntoController::class, 'restore'])->name('assunto-restore');
    // Route::get('tiposdocumento/novo', 'TipoDocumentoController@create')->name('tiposdocumento-create');
    Route::get('tiposdocumento/novo', [TipoDocumentoController::class, 'create'])->name('tiposdocumento-create');
    // Route::post('tiposdocumento/salvar', 'TipoDocumentoController@store')->name('tiposdocumento-store');
    Route::post('tiposdocumento/salvar', [TipoDocumentoController::class, 'store'])->name('tiposdocumento-store');
    // Route::get('tiposdocumento/editar/{id}', 'TipoDocumentoController@edit')->name('tiposdocumento-edit');
    Route::get('tiposdocumento/editar/{id}', [TipoDocumentoController::class, 'edit'])->name('tiposdocumento-edit');
    // Route::get('tiposdocumento/delete/{id}', 'TipoDocumentoController@destroy')->name('tiposdocumento-delete');
    Route::get('tiposdocumento/delete/{id}', [TipoDocumentoController::class, 'destroy'])->name('tiposdocumento-delete');
    // Route::get('tiposdocumento/removidos', 'TipoDocumentoController@trashed')->name('tiposdocumento-removidos');
    Route::get('tiposdocumento/removidos', [TipoDocumentoController::class, 'trashed'])->name('tiposdocumento-removidos');
    // Route::get('tiposdocumento/restaurar/{id}', 'TipoDocumentoController@restore')->name('tiposdocumento-restore');
    Route::get('tiposdocumento/restaurar/{id}', [TipoDocumentoController::class, 'restore'])->name('tiposdocumento-restore');
    // Route::get('documentos', 'SearchDocument@search')->name('documentos');
    Route::get('documentos', [SearchDocument::class, 'search'])->name('documentos');
    // Route::get('documentos/pesquisar', 'SearchDocument@search')->name('documentos-pesquisar');
    Route::get('documentos/pesquisar', [SearchDocument::class, 'search'])->name('documentos-pesquisar');
    // Route::get('documentos/pesquisar/status', 'SearchDocument@searchStatus')->name('documentos-pesquisar-status');
    Route::get('documentos/pesquisar/status', [SearchDocument::class, 'searchStatus'])->name('documentos-pesquisar-status');
    // Route::get('documentos/publicar', 'DocumentoController@create')->name('publicar');
    Route::get('documentos/publicar', [DocumentoController::class, 'create'])->name('publicar');
    // Route::post('documentos/publicar', 'DocumentoController@store')->name('enviar');
    Route::post('documentos/publicar', [DocumentoController::class, 'store'])->name('enviar');

    // Route::get('documentos/publicar-lote', 'LoteController@create')->name('publicar-lote');
    Route::get('documentos/publicar-lote', [LoteController::class, 'create'])->name('publicar-lote');
    // Route::post('documentos/publicar-lote', 'LoteController@store')->name('enviar-lote');
    Route::post('docmentos/publicar-lote', [LoteController::class, 'store'])->name('enviar-lote');
    // Route::post('documentos/upload-lote', 'LoteController@upload')->name('upload-lote');]
    Route::post('documentos/upload-lote', [LoteController::class, 'upload'])->name(('upload-lote'));
    // Route::post('documentos/update-item-lote/{id}', 'LoteController@updateItemLote')->name('update-item-lote');
    Route::post('documentos/update-item-lote/{id}', [LoteController::class, 'updateItemLote'])->name('update-item-lote');
    // Route::get('documentos/pendentes', 'LoteController@documentosPendentes')->name('docs-pendentes');
    Route::get('documentos/pendentes', [LoteController::class, 'documentosPendentes'])->name('docs-pendeste');
    // Route::get('documento/{id}', 'DocumentoController@show')->name('documento');
    Route::get('documento/{id}', [DocumentoController::class, 'show'])->name('documento');
    // Route::get('documento/{id}/edit', 'DocumentoController@edit')->name('documento-edit');
    Route::get('documento/{id}/edit', [DocumentoController::class, 'edit'])->name('documento-edit');
    // Route::post('documento/{id}/update', 'DocumentoController@update')->name('documento-update');
    Route::post('documento/{id}/update', [DocumentoController::class, 'update'])->name('documento-update');
    // Route::delete('documentos/{id}', 'DocumentoController@destroy')->name('delete');
    Route::delete('documentos/{id}', [DocumentoController::class, 'destroy'])->name('delete');
    // Route::get('documentos/{id}/delete', 'DocumentoController@destroy')->name('delete-edit');
    Route::get('documentos/{id}/delete', [DocumentoController::class, 'destroy'])->name('delete-edit');
    // Route::get('lote/upload/{id}/delete', 'LoteController@destroy')->name('delete-upload');
    Route::get('lote/upload/{id}/delete', [LoteController::class, 'destroy'])->name('delete-upload');
    // Route::get('documentos/{id}/ocultar', 'DocumentoController@ocultar')->name('documento-ocultar');
    Route::get('documentos/{id}/ocultar', [DocumentoController::class, 'ocultar'])->name('documento-ocultar');
    // Route::get('documentos/{id}/indexar', 'DocumentoController@indexar')->name('documento-indexar');
    Route::get('documento/{id}/indexar', [DocumentoController::class, "indexar"])->name('documento-indexar');
    
    // Route::get('usuarios/{id}/editar', 'UsuarioController@edit')->name('usuario-edit');
    Route::get('usuarios/{id}/editar', [UsuarioController::class, 'edit'])->name('usuario-edit');
    // Route::get('usuarios', 'UsuarioController@index')->name('usuarios');
    Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios');
    // Route::get('usuarios/convidar', 'UsuarioController@convidar')->name('usuario-convidar');
    Route::get('usarios/convidar', [UsuarioController::class, 'convidar'])->name('usuario-convidar');
    // Route::get('usuarios/reenviar-convite/{id}', 'UsuarioController@reenviarConvite')->name('usuario-reconvidar');
    Route::get('usuarios/reenviar-convite/{id}', [UsuarioController::class, 'reenviarConvite'])->name('usuario-reconvidar');
    // Route::post('usuarios', 'UsuarioController@store')->name('usuario-store');
    Route::post('usuarios', [UsuarioController::class, 'store'])->name('usuario-store');
    // Route::post('usuarios/create', 'UsuarioController@create')->name('usuario-create');
    Route::post('usuarios/create', [UsuarioController::class, 'create'])->name('usario-create');
    // Route::get('usuarios/pesquisar', 'UsuarioController@search')->name('usuario-search');
    Route::get('usuarios/pesquisar', [UsuarioController::class, 'search'])->name('usuario-search');
    // Route::post('usuarios/pesquisar', 'UsuarioController@search')->name('usuario-search');
    Route::post('usarios/pesquisar', [UsuarioController::class, 'search'])->name('usuario-search');
    // Route::get('usuarios/delete/{id}', 'UsuarioController@destroy')->name('usuario-delete');
    Route::get('usuarios/delete/{id}',[UsuarioController::class, 'destroy'])->name('usuario-delete');
    // Route::get('usuarios/force-delete/{id}', 'UsuarioController@forceDelete')->name('usuario-force-delete');
    Route::get('usuarios/force-delete/{id}', [UsuarioController::class, 'forceDelete'])->name('usuario-force-delete');
    // Route::get('usuarios/restore/{id}', 'UsuarioController@restore')->name('usuario-restore');
    Route::get('usuarios/restore/{id}', [UsuarioController::class, 'restore'])->name('usuario-restore');
    // Route::get('etl/comandos', 'ETLController@index')->name('etl-comandos');    
    Route::get('etl/comandos', [ETLController::class, 'index'])->name('etl-comandos');
    // Route::get('etl/log/download/{logFile}', 'ETLController@downloadLog')->name('download-log');
    Route::get('etl/log/download/{logFile}', [ETLController::class, 'downloadLog'])->name('download-log');
    // Route::get('etl/executar/{script}', 'ETLController@executarEtl')->name('etl-executar');
    Route::get('etl/executar/{script}', [ETLController::class, 'executarEtl'])->name('etl-executar');
    // Route::get('status/index', 'StatusController@index')->name('server-status');
    Route::get('status/index', [StatusController::class, 'index'])->name('server-status');
    // Route::get('consultas', 'ConsultaController@index')->name('consultas');
    Route::get('consultas', [ConsultaController::class, 'index'])->name('consultas');
    // Route::get('consultas-mes', 'ConsultaController@consultasMes')->name('consultasMes');
    Route::get('consultas-mes', [ConsultaController::class, 'consultasMes'])->name('consultasMes');
});


Auth::routes();






