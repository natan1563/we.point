<?php 

namespace Controller;

use Helpers\ConnectionTrait;
use Helpers\HasMensageTrait;

class ControllerChangeImage extends ControllerRegister {

    use ConnectionTrait;
    use HasMensageTrait;

    public function uploadProfilePicture() {
        
        $file = $this->saveProfilePicture();
        $stmt = $this->conn->prepare('UPDATE users SET path_image = :path_image WHERE id = :id');
        $stmt->bindValue(':path_image', $file);
        $stmt->bindValue(':id', $_SESSION['id']);

        $this->unsetFile();

        if(!$stmt->execute())
            $this->hasMensage('Erro ao atualizar a imagem, tente novamente.', '/change-profile');
        
        $_SESSION['photo'] = $file;
    }

    private function unsetFile() {
        $stmt = $this->conn->query('SELECT path_image FROM users WHERE id = ' . $_SESSION['id']);
        if (!$stmt->execute())
            $this->hasMensage('Erro interno.', '/change-profile');
        
        $fileName = $stmt->fetch();
        $rawPath  = __DIR__ . '/../../public/images/' . $fileName['path_image'];
        $pathFile = str_replace('\\', '/', $rawPath);

        return (is_file($pathFile)) ? unlink($pathFile) : '';
    }

}