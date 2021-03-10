<?php 

namespace Helpers;

trait HasMensageTrait {
    protected function hasMensage(string $mensage, string $redirect): void {
        $_SESSION['msg'] = $mensage;
        header('Location: ' . $redirect);
        exit;
      }
}