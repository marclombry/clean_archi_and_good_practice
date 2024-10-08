<?php
namespace Src\Domain\UseCase;

use PHPUnit\Logging\Exception;
use Src\Domain\Model\UserServices;
use Src\Port\Auth\AuthenticateInterface;
use Src\Port\InMemoryPortInterface;
use Src\Port\Register\RegisterInterface;

class UserServicesUseCase implements AuthenticateInterface , RegisterInterface
{
    protected UserServices $user;

    /**
     * @return UserServices
     */
    public function getUser(): UserServices
    {
        return $this->user;
    }

    /**
     * @param UserServices $user
     * @return UserServicesUseCase
     */
    public function setUser(UserServices $user): UserServicesUseCase
    {
        $this->user = $user;
        return $this;
    }
    protected InMemoryPortInterface $inMemoryPort;

    /**
     * @return InMemoryPortInterface
     */
    public function getInMemoryPort(): InMemoryPortInterface
    {
        return $this->inMemoryPort;
    }

    /**
     * @param InMemoryPortInterface $inMemoryPort
     * @return UserServicesUseCase
     */
    public function setInMemoryPort(InMemoryPortInterface $inMemoryPort): UserServicesUseCase
    {
        $this->inMemoryPort = $inMemoryPort;
        return $this;
    }

    public function login(array $informations): bool
    {
        if (array_key_exists('email', $informations) && array_key_exists('password', $informations)) {

            $email = $informations['email'];
            $password = $informations['password'];

            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$email) {
                return false;
            }

            $hashedPassword = $this->getHashedPasswordByEmail($email);
          
            if ($hashedPassword && password_verify($password, $hashedPassword)) {
                // TODO your logic


                return true; 
            }
        }

        return false;
    }


    public function logout(): bool
    {
        //TODO check if user informations is in session and clear it
        return true;
    }

    public function register(array $informations)
    {
        $email = filter_var($informations['email'], FILTER_VALIDATE_EMAIL);
        // Validation
        $password = $informations['password'];
        if (strlen($password) < 8 || !preg_match('/[A-Za-z]/', $password) || !preg_match('/\d/', $password)) {
            return false; 
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'email' => $email,
            'password' => $hashedPassword,
        ];

        try {
            $this->inMemoryPort->insert($data);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getHashedPasswordByEmail(string $email): ?string
    {
        try {
            $user = $this->inMemoryPort->find(['email' => $email]);
            return $user ? $user['password'] : null;
        } catch (\Exception $e) {
            // TODO: logger error
            return null;
        }
    }


}