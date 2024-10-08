<?php

$requestUrl = $_SERVER['REQUEST_URI'];

$routes = [
    '/' => [
        'method' => 'get',
        'controller' => 'Src\Controller\IndexController',
        'parameter' => [
            'usecase' => 'Src\Domain\UseCase\IndexUseCase',
            'presenter' => 'Src\Port\Presenter\IndexPresenter',
            'template' => 'index'
        ],
        'action' => 'index'
    ],
    '/reservation' => [
        'method' => 'get',
        'controller' => 'Src\Controller\ReservationController',
        'parameter' => [
            'usecase' => 'Src\Domain\UseCase\ReservationUseCase',
            'presenter' => 'Src\Port\Presenter\Reservation\ReservationPresenter',
            'template' => 'Reservation/reservation'
        ],
        'action' => 'index'
    ],
    '/reservation/create' => [
        'method' => 'post',
        'controller' => 'Src\Controller\ReservationController',
        'parameter' => [
            'usecase' => 'Src\Domain\UseCase\ReservationUseCase',
            'presenter' => 'Src\Port\Presenter\Reservation\ReservationPresenter',
            'template' => 'Reservation/reservation'
        ],
        'action' => 'create'
    ],
    '/register' => [
        'method' => 'get',
        'controller' => 'Src\Controller\RegisterController',
        'parameter' => [
            'usecase' => 'Src\Domain\UseCase\UserServicesUseCase',
            'presenter' => 'Src\Port\Presenter\Register\RegisterPresenter',
            'template' => 'Register/register'
        ],
        'action' => 'register'
    ],
    '/login' => [
        'method' => 'get',
        'controller' => 'Src\Controller\LoginController',
        'parameter' => [
            'usecase' => 'Src\Domain\UseCase\UserServicesUseCase',
            'presenter' => 'Src\Port\Presenter\Login\LoginPresenter',
            'template' => 'Login/login'
        ],
        'action' => 'login'
    ],
];

if(array_key_exists($requestUrl, $routes))
{
    $route = $routes[$requestUrl];
    $route_controller = $route['controller'];
    $action = $route['action'];
    $usecase = new $route['parameter']['usecase']();
    $template = $route['parameter']['template'];
    $presenter = new $route['parameter']['presenter']($usecase, $template);
    $controller = new $route_controller($usecase, $presenter);
    echo $controller->$action();
} else {
    header('HTTP/1.0 404 Not Found');
    $presenter = new \Src\Port\Presenter\Error\ErrorPresenter();
    $controller = new \Src\Controller\ErrorController($presenter);
    $controller->index();
}