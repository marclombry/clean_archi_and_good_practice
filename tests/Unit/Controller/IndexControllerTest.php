<?php

use Src\Controller\IndexController;

test("index controller", function(){
    $useCase = new \Src\Domain\UseCase\IndexUseCase();
    $presenter = new \Src\Port\Presenter\IndexPresenter();
    $controller = new IndexController($useCase, $presenter);
    expect($controller)->toHaveMethods(['index']);
});