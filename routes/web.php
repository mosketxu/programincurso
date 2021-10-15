
<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


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

// solo pongo un comentario
Route::get('/home', [HomeController::class,'index'])->name('home');

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes([
    'register' => false,
]);

Route::group(['middleware' => ['auth']], function () {
    //User
    require __DIR__ .'/user.php';
    //Roles
    require __DIR__ .'/roles.php';
    //Permisos
    require __DIR__ .'/permisos.php';
    //Empresas
    require __DIR__ .'/empresas.php';
    //Contactos
    require __DIR__ .'/contactos.php';
    //EmpresaContactos
    require __DIR__ .'/empresacontactos.php';
    //EmpresaImpuestos
    require __DIR__ .'/empresaimpuestos.php';
    //Pus
    require __DIR__ .'/pus.php';
    //Prov-cli
    require __DIR__ .'/provclis.php';
    //Contas
    require __DIR__ .'/contas.php';
    //Conta Recurrente
    require __DIR__ .'/contarecurrentes.php';
    //Facturacions
    require __DIR__ .'/facturaciones.php';
    //Facturacion detalles
    require __DIR__ .'/facturaciondetalles.php';
});

use App\Jobs\UserEmailWelcome;

Route::get('/mail',function(){
    UserEmailWelcome::dispatch(App\User::find(2))->delay(now()->addSeconds(10));
    return "dones";
});
