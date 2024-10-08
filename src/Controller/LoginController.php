<?php

namespace Src\Controller;
use Src\Domain\UseCase\UserServicesUseCase;
use Src\Port\Presenter\PresenterViewInterface;

class LoginController
{
    public function __construct(
        private UserServicesUseCase $userServicesUseCase,
        private PresenterViewInterface $presenter)
    {}

    public function Login()
    {
        $this->presenter->view('Login/login');
    }
}