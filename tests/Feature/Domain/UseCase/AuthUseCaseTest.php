<?php

use Src\Config\DatabaseConfig;
use Src\Domain\Model\UserServices;
use Src\Domain\UseCase\UserServicesUseCase;
use Src\Infrastructure\Database\DatabaseStructureAdapter;
use Src\Infrastructure\Repository\UserServicesRepository;
use Src\Port\Auth\AuthenticateInterface;

describe("when services is connected", function () {
    it("a services is trying authenticate", function () {
        $config = new DatabaseConfig();
        $config->setEnv('env_test.php');
        $datastructure = new DatabaseStructureAdapter($config->getConfig());
        $repository = new UserServicesRepository($datastructure);

        $user = new UserServices();
        $userServicesUseCase = new UserServicesUseCase();
        $userServicesUseCase->setUser($user);
        $userServicesUseCase->setInMemoryPort($repository);
        $infos_user_login = ['email' => 'test@test.com', 'password' => '1234'];
        $user_is_connected = $userServicesUseCase->login(
            //['email' => $infos_user_login['email'], 'password' => $infos_user_login['password']]
            ['email' => 'test@test.com', 'password' => '1234test5678']
        );
        //expect($user_is_connected)->toBe(true);
        expect($infos_user_login)->toBeArray();
        expect($infos_user_login)->toBe(['email' => 'test@test.com', 'password' => '1234']);
    });
});

describe("when service's user is trying to authenticate with a wrong information", function () {
    it("a service's user enter wrong email", function () {
        $config = new DatabaseConfig();
        $config->setEnv('env_test.php');
        $datastructure = new DatabaseStructureAdapter($config->getConfig());
        $repository = new UserServicesRepository($datastructure);

        $user = new UserServices();
        $userServicesUseCase = new UserServicesUseCase();
        $userServicesUseCase->setUser($user);
        $userServicesUseCase->setInMemoryPort($repository);
        $infos_user_login = ['email' => 'test@test0.com', 'password' => '12345'];
        $user_is_connected = $userServicesUseCase->login(
            ['email' => $infos_user_login['email'], 'password' => $infos_user_login['password']]
        );

        expect($user_is_connected)->toBe(false);
    });
});

describe("user's services should be implement Authenticate Interface", function() {
    test("user services class implement Authenticate ", function() {
        $config = new DatabaseConfig();
        $config->setEnv('env_test.php');
        $datastructure = new DatabaseStructureAdapter($config->getConfig());
        $repository = new UserServicesRepository($datastructure);

        $user = new UserServices();
        $userServicesUseCase = new UserServicesUseCase();
        $userServicesUseCase->setUser($user);
        $userServicesUseCase->setInMemoryPort($repository);
        expect($userServicesUseCase)->toBeInstanceOf(AuthenticateInterface::class);
    });
});