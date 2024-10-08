<?php

use Src\Controller\Controller;
use Src\Domain\UseCase\ReservationUseCase;

test("controller index should return a status code equal at 200", function(){
    $controller = createController('http://mestests.test/');
    expect($controller->getResponse())->toBe('200');
});

test("controller has get and post method", function() {
    $controller = createController('http://mestests.test/','ReservationUseCase');
    expect($controller)->toHaveMethods(['get','post']);
});

test("controller return a ReservationUseCase", function() {
    $controller = createController('http://mestests.test/','ReservationUseCase');
    $page = $controller->get('/reservation','ReservationUseCase');
    expect($page)->toBeClass();
});

function createController(string $uri)
{
    $controller = new Controller();
    $controller->setUri($uri);
    return $controller;
}