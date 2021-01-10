<?php namespace Config;

// Create a new instance of our RouteCollection class.
use App\Controllers\Dashboard;

$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->match(['get', 'post'],'/login', 'login::index', ['filter'=>'noauth']);
$routes->match(['get', 'post'],'/signup', 'signup::index', ['filter'=>'noauth']);
$routes->get('dashboard', 'Dashboard::index', ['filter'=>'auth']);
$routes->match(['get', 'post'],'dashboard/addProjects', 'Dashboard::addProjects', ['filter'=>'auth']);
$routes->match(['get', 'post'],'dashboard/employees', 'Dashboard::employees', ['filter'=>'auth']);
$routes->match(['get', 'post'],'dashboard/newEmployees', 'Dashboard::newEmployee', ['filter'=>'auth']);
$routes->match(['get', 'post'],'dashboard/projects', 'Dashboard::projects', ['filter'=>'auth']);
$routes->match(['get', 'post'],'dashboard/tasks', 'Dashboard::tasks', ['filter'=>'auth']);
$routes->match(['get', 'post'],'dashboard/toDoList', 'Dashboard::toDoList', ['filter'=>'auth']);
$routes->match(['get', 'post'],'dashboard/userSettings', 'Dashboard::userSettings', ['filter'=>'auth']);


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
