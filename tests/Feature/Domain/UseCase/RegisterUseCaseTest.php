<?php

use Src\Config\DatabaseConfig;
use Src\Domain\Model\UserServices;
use Src\Domain\UseCase\UserServicesUseCase;
use Src\Infrastructure\Database\DatabaseStructureAdapter;
use Src\Infrastructure\Repository\UserServicesRepository;
use Src\Port\Auth\AuthenticateInterface;
use Src\Port\Register\RegisterInterface;

describe("when user's services try to register", function() {
    test("user services class implement Register and Authenticate ", function() {

        $config = new DatabaseConfig();
        $config->setEnv('env_test.php');
        $datastructure = new DatabaseStructureAdapter($config->getConfig());
        $repository = new UserServicesRepository($datastructure);

        $user = new UserServices();
        $userServicesUseCase = new UserServicesUseCase();
        $userServicesUseCase->setUser($user);
        $userServicesUseCase->setInMemoryPort($repository);
        expect($userServicesUseCase)->toBeInstanceOf(AuthenticateInterface::class);
        expect($userServicesUseCase)->toBeInstanceOf(RegisterInterface::class);
    });
    it("when user's services try to register with good information", function() {
        $config = new DatabaseConfig();
        $config->setEnv('env_test.php');
        $datastructure = new DatabaseStructureAdapter($config->getConfig());
        $repository = new UserServicesRepository($datastructure);

        $user = new UserServices();
        $userServicesUseCase = new UserServicesUseCase();
        $userServicesUseCase->setUser($user);
        $userServicesUseCase->setInMemoryPort($repository);
        $informations = [
            'email' => 'test@test'.uniqid().'.com',
            'password' => '1234'.uniqid()
        ];
        $register = $userServicesUseCase->register($informations);
        expect($register)->toBe(true);
    });
});
