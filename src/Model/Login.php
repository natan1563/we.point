<?php 

namespace Model;

use Exception;
use Helpers\ConnectionTrait;
use Helpers\HasMensageTrait;

abstract class Login
{
    use ConnectionTrait;
    use HasMensageTrait;

    private int $id;
    private string $email;
    private string $name;
    private string $password;
    private ?string $profilePicture;

    //Getters 
    protected function setEmail(string $email) {
        $this->email = $this->postValidate($email);
    }

    protected function getEmail():string {
        return $this->email;
    }

    protected function getPassword():string {
        return $this->password;
        
    }  

    protected function getId(): int {
        return $this->id;
    }

    protected function getName(): string {
        return $this->name;
    }

    protected function getProfilePicture(): ?string {
        return $this->profilePicture;
    }

 
    protected function passVerify(string $password): bool {
        return password_verify($password, $this->getPassword());
    }

    protected function userVerify(): bool {
        try {

            $stmt = $this->conn->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->bindValue(':email', $this->getEmail());

            if ($stmt->execute() !== true)
                $this->hasMensage('Erro na conexão com a base de dados', '/login');

            $userData = $stmt->fetch();

            if (!is_array($userData))
                $this->hasMensage('Usuario não encontrado', '/login');
           
            $this->id             = $this->postValidate($userData['id']);
            $this->name           = $this->postValidate($userData['name']);
            $this->password       = $this->postValidate($userData['password']);
            $this->profilePicture = $this->postValidate($userData['path_image']);
            
            return true;

        } catch (Exception $except) {
            return false;
        }
    }

    private function postValidate($param) {
        
        $param = trim($param);
        $param = strip_tags($param);
        $param = addslashes($param);

        return $param;
    }

}
