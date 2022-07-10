<?php
require_once __DIR__ . '/../includes/app.php';


use Router\Router;
use Controller\InitialController;
use Controller\LoginController;
use Controller\AdminController;
use Controller\APIController;

$router=new Router();

$router->get('/',[InitialController::class,'index']);
$router->get('/nosotros',[InitialController::class,'nosotros']);


$router->get('/contacto',[InitialController::class,'contacto']);
$router->post('/contacto',[InitialController::class,'contacto']);

$router->post('/producto',[InitialController::class,'producto']);
$router->get('/producto',[InitialController::class,'producto']);

$router->get('/productos',[InitialController::class,'productos']);

/* Ordenes */
$router->post('/orden',[InitialController::class,'orden']);
$router->get('/orden',[InitialController::class,'orden']);


/* Login */
$router->get('/login',[LoginController::class,'login']);
$router->post('/login',[LoginController::class,'login']);

$router->get('/registro',[LoginController::class,'registro']);
$router->post('/registro',[LoginController::class,'registro']);

$router->get('/confirmar',[LoginController::class,'confirmar']);


$router->get('/mensaje',[LoginController::class,'mensaje']);



$router->get('/cerrarSesion',[LoginController::class,'cerrarSesion']);



//Zona de administracion


$router->get('/admin',[AdminController::class,'productos']);
$router->post('/admin',[AdminController::class,'productos']);

$router->get('/admin/crear-producto',[AdminController::class,'crear']);
$router->post('/admin/crear-producto',[AdminController::class,'crear']);

$router->get('/admin/actualizar',[AdminController::class,'actualizar']);
$router->post('/admin/actualizar',[AdminController::class,'actualizar']);

$router->get('/admin/eliminar',[AdminController::class,'eliminar']);
$router->post('/admin/eliminar',[AdminController::class,'eliminar']);


$router->get('/admin/ordenes',[AdminController::class,'ordenes']);
$router->post('/admin/ordenes',[AdminController::class,'ordenes']);

$router->get('/admin/detalle-orden',[AdminController::class,'detalles']);


$router->get('/admin/cuenta',[AdminController::class,'cuenta']);
$router->post('/admin/cuenta',[AdminController::class,'cuenta']);

$router->post('/admin/cuenta/eliminar',[AdminController::class,'eliminar']);
$router->get('/admin/cuenta/eliminar',[AdminController::class,'eliminar']);




//API
$router->post('/api/orden',[APIController::class,'orden']);
$router->get('/api/orden',[APIController::class,'orden']);

$router->post('/api/eliminar',[APIController::class,'eliminar']);
$router->post('/api/eliminarCuenta',[APIController::class,'eliminarCuenta']);
$router->post('/api/eliminarProducto',[APIController::class,'eliminarProducto']);


/* Perfil de usuario */

$router->get('/perfil/ordenes',[InitialController::class,'ordenes']);


$router->post('/perfil/detalle-orden',[InitialController::class,'detalles']);
$router->get('/perfil/detalle-orden',[InitialController::class,'detalles']);




$router->rutas();