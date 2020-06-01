<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/ok', function () {
    return ['status' => true];
});

Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::middleware('jwt.auth')->namespace('Api')->name('api.')->group(function () {



    Route::prefix('cooperado')->group(function () {
        //Lista os cooperados
        Route::get('/', 'CooperadoController@index')->name('index_cooperado');
        //Lista nome e codigo cooperados
        Route::get('/cooperadosNome', 'CooperadoController@cooperadosNome')->name('index_cooperado');
    });




    Route::prefix('qualidade')->group(function () {
        //Lista as qualidades
        Route::get('/', 'QualidadeController@index')->name('index_qualidade');
        //Lista as qualidades
        Route::post('/QualidadePorId', 'QualidadeController@QualidadeResourcePorID')->name('index_QualidadeResourcePorID');
        //Lista as ultimas qualidades
        Route::get('/QualidadeLast', 'QualidadeController@QualidadeResourceLast')->name('index_QualidadeLast');
    });

    Route::prefix('submissao')->group(function () {
        /**Retorna todos os formularios de um determinado tipo por cooperado*/
        Route::post('/relatorioPorTanque', 'SubmissaoController@relatoriosPorCooperado')->name('relatoriosPorCooperado');
        /**Criar itens da submissao e associa-los a submissao (Itens na tabela OpcaoPergunta-submissao, onde cada item representa uma pergunta do formulario) */
        Route::post('/', 'SubmissaoController@SubmeterOpcaoPergunta')->name('SubmeterOpcaoPergunta');
        /**Cria submissao**/
        Route::post('/novaSubmissao', 'SubmissaoController@store')->name('SubmissaoCreate');
        /**Deleta submissao**/
        Route::post('/deletarSubmissao', 'SubmissaoController@destroy')->name('SubmissaoDelete');
        /**Deleta submissao e opcaoPergunta_submissao**/
        Route::post('/deletarSubmissaoOpcaoPergunta', 'SubmissaoController@RemoverSubmissaoOpcaoPergunta')->name('SubmissaoDelete');
        //Retorna uma submissao
        Route::post('/buscarSubmissao', 'SubmissaoController@exibirSubmissao')->name('relatorioPorCooperado');
        //Marca submissao como realizada
        Route::post('/marcarRealizada', 'SubmissaoController@MarcarRealizada')->name('MarcarRealizada');
        //ultima submissao
        Route::post('/ultimaSubmissao', 'SubmissaoController@UltimaSubmissao')->name('UltimaSubmissao');
        //ultima submissao OFFLINE
        Route::get('/ultimaSubmissaoOFF', 'SubmissaoController@SubmissaoLast')->name('ultimaSubmissaoOFF');

        //teste
        Route::get('/testeResource', 'SubmissaoController@testeResource')->name('testeResource');
    });

    Route::prefix('tanque')->group(function () {
        //Lista os tanques
        Route::get('/', 'TanqueController@index')->name('index_tanque');
        //Lista os tanques correspondentes aos parametros
        Route::post('/RelatorioQualidade', 'TanqueController@GerarRelatorio')->name('tanque_cbt');
        //Lista os tanques com cbt acima de 300 all
        Route::get('/relatorioExcluir', 'TanqueController@ListagemQualidadeExcluir')->name('tanque_cbt');
        //Lista os tanques com ccs acima de 500
        Route::get('/CcsAcimaDe500/{dataReferencia}', 'TanqueController@TanquesCcsAcimaDe500')->name('tanque_ccs');
        //Lista os latões e seu respectivo cooperado
        Route::get('/LataoPorCooperado', 'TanqueController@LataoPorCooperado')->name('LataoPorCooperado');
        Route::get('/export/{relatorio}/{filtro}/{padrao}/{dataReferencia}', 'TanqueController@ListagemQualidade');
        //TanqueResource Por id
        Route::post('/tanquePorId', 'TanqueController@TanqueResourcePorID')->name('tanque_resource');
        //TanqueResource 
        Route::get('/tanqueAll', 'TanqueController@TanqueResourceAll')->name('tanque_resourceAll');

        //retorna arquivo excel gerado na "ListagemQualidadeGerar"
        Route::get('/todosExcel', 'TanqueController@ListagemQualidadeEnviar')->name('tanque_cbt');
        //Gera arquivo excel com todos os cooperados dentro dos parametros do request
        Route::post('/todos', 'TanqueController@ListagemQualidadeGerar')->name('tanque_cbt');
    });

    Route::prefix('formulario')->group(function () {
        //Lista os tipos de formulário
        Route::get('/', 'FormularioController@index')->name('index_formulario');
    });

    //Rotas de autenticação
    Route::prefix('autenticacao')->group(function () {
        Route::post('/logout', 'AuthenticateController@logout')->name('logout');
        Route::post('/refresh', 'AuthenticateController@refresh')->name('refresh');
        Route::get('/me', 'AuthenticateController@me')->name('me');
    });



    Route::prefix('pergunta')->group(function () {
        //listas as pesguntas 
        Route::post('/', 'PerguntaController@listarPerguntas')->name('index');
        //listas as pesguntas por tema
        Route::post('/porTema', 'PerguntaController@listarPerguntasTema')->name('index');
        //listas as pesguntas 
        Route::get('/teste', 'PerguntaController@listarPerguntasTeste')->name('index');
    });

    Route::prefix('opcaoPergunta')->group(function () {
        //Retorna a opcãoPergunta. Recebe uma opcao e uma pergunta
        Route::post('/OpcaoPerguntaFind', 'OpcaoPerguntaController@OpcaoPerguntaFind')->name('index');
        //Retorna todos opcaoPergunta
        Route::get('/OpcaoPerguntaAll', 'OpcaoPerguntaController@OpcaoPerguntaALL')->name('OpcaoPerguntaALL');
        //Retorna opcaoPergunta por ID recebido
        Route::post('/OpcaoPerguntaByID', 'OpcaoPerguntaController@OpcaoPerguntaByID')->name('OpcaoPerguntaByID');
    });




    Route::prefix('observacao')->group(function () {

        //insere os itens que representam as respostas da observação
        Route::post('/', 'RespostaObservacaoController@store')->name('store');
        //listas as respostas da observação
        Route::get('/', 'RespostaObservacaoController@index')->name('index');
        //listas as respostas da observação
        Route::post('/respostaObervacao', 'RespostaObservacaoController@listarObservacoes')->name('index');
    });

    Route::prefix('agenda')->group(function () {

        //insere um evento
        Route::post('/NovoEvento', 'EventoAgendaController@store')->name('store');
        //lista todos os eventos
        Route::post('/EventosPorDia', 'EventoAgendaController@eventosPorDia')->name('index');
        //alterar evento
        Route::post('/updateEvento', 'EventoAgendaController@atualizarEvento')->name('update');
        //alterar evento
        Route::post('/deleteEvento', 'EventoAgendaController@excluirEvento')->name('delete');
    });

    //Login
    Route::prefix('tecnico')->group(function () {
        Route::get('/all', 'tecnicoController@index')->name('all');
        Route::get('/refreshToken', 'AuthenticateController@refresh')->name('refresh');
    });
});



Route::namespace('Api')->name('api.')->group(function () {
    //Login
    Route::prefix('autenticacao')->group(function () {
        Route::post('/login', 'AuthenticateController@login')->name('login');
    });

    //inserir um técnico
    Route::prefix('tecnico')->group(function () {
        Route::post('/', 'tecnicoController@store')->name('novo_tecnico');
    });
});
