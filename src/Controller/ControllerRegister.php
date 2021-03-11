<?php 

namespace Controller;

use Exception;
use Helpers\ConnectionTrait;
use Helpers\HasMensageTrait;
use Model\Register;
use PDOException;

class ControllerRegister extends Register
{
    use ConnectionTrait;
    use HasMensageTrait;

    private function emailVerified() { 

      try {

        $stmt = $this->conn->prepare('SELECT email FROM users WHERE email = :email');
        $stmt->bindValue(':email', $this->getEmail());
        $stmt->execute();

        if (!isset($_SESSION['registered']) && !empty($stmt->fetchAll())) 
            $this->hasMensage('E-mail já cadastrado', '/register');

        return $this->getEmail();

      } catch (PDOException $except) {
          $this->hasMensage('Erro interno tente novamente mais tarde', '/register');
      }
    }
    
    private function passVerified() { 
        if(empty($this->getPassword()) || empty($this->getPasswordVerify()))
            $this->hasMensage('Os campos de senha não podem ficar em branco', '/register');

        if (!isset($_SESSION['error']) && $this->getPassword() !== $this->getPasswordVerify())
            $this->hasMensage('As senhas não conferem', '/register');
        
        return password_hash($this->getPassword(), PASSWORD_BCRYPT);
    }

    private function validateBirthDate():string {
      return date('Y-m-d', strtotime($this->getBirthDate()));
    }

    protected function saveProfilePicture() {

      try {

        $photo = $this->getProfilePicture();
        
        if (empty($photo['type']))
            return;

        //Pega o tamanho da antiga imagem
        list($old_width, $old_height) = getimagesize($photo['tmp_name']);

        //Cria uma nova imagem com tamaxo 75x75
        $newImage = imagecreatetruecolor(75, 75);

        //Pega a extensão [jpge, jpg, png]
        $extension = explode('/', $photo['type']);
  
        switch ($extension[1]) {
          case 'jpeg';
          case 'jpg';
              $oldImage = imagecreatefromjpeg($photo['tmp_name']);
              break;
  
          case 'png';
              $oldImage = imagecreatefrompng($photo['tmp_name']);
              break;
          case '':
              $oldImage = null; 
          default:
               $this->hasMensage('Formato de arquivo não suportado. Formatos suportados: png, jpeg, jpg', '/register');
              break;
        }

        $fileName = strtotime(date('Y-m-d H:i:s'))  . '.' . $extension[1];
        $rawPath  = __DIR__ . '/../../public/images/' . $fileName;
        $pathFile = str_replace('\\', '/', $rawPath);

        // Redimensiona e salva
        imagecopyresampled($newImage, $oldImage, 0, 0, 0, 0, 75, 75, $old_width, $old_height);
        $returnImage = ($extension[1] === 'png') ? imagepng($newImage, $pathFile) : imagejpeg($newImage, $pathFile);
        
        if(empty($returnImage))
          $this->hasMensage('Erro ao salvar a imagem tente novamente mais tarde', '/register');

        return $fileName;

      } catch (\Exception $except) {
        $this->hasMensage('Erro ao gravar a imagem', '/register');
      }

    } 

    public function register():void {
        try {

          $stmt = $this->conn->prepare(
              'INSERT INTO users(name, email, password, cargo, birth_date, path_image) 
                      VALUES (:name, :email, :password, :cargo, :birthDate, :pathImage)'
          );
  
          $stmt->bindValue(':name',      $this->getName());
          $stmt->bindValue(':email',     $this->emailVerified());
          $stmt->bindValue(':password',  $this->passVerified());
          $stmt->bindValue(':cargo',     $this->getOffice());
          $stmt->bindValue(':birthDate', $this->validateBirthDate());
          $stmt->bindValue(':pathImage', $this->saveProfilePicture());

         if(!$stmt->execute())
            throw new Exception('Erro ao efetuar o cadastro');

          $this->hasMensage('Cadastro realizado com sucesso!', '/login');
          
       } catch (\Exception $except) {
          $this->hasMensage($except->getMessage(), '/register');
       }
  
      }

      public function __destruct()
      {
        unset($_POST['btnCad']);
      }
}