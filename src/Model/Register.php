<?php

namespace Model;

abstract class Register
{
    // Getters
    
    protected function getName(): string {
        return $this->postValidate(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    }

    protected function getEmail(): string {
        return $this->postValidate(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
    }

    protected function getOffice(): string {
        return $this->postValidate(filter_input(INPUT_POST, 'office', FILTER_SANITIZE_STRING));
    }

    protected function getPassword(): string {
        return  $this->postValidate(filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING));
    }

    protected function getPasswordVerify(): string {
        return $this->postValidate(filter_input(INPUT_POST, 'conf-pass', FILTER_SANITIZE_STRING));
    }

    protected function getBirthDate(): string {
        return $this->postValidate(filter_input(INPUT_POST, 'birthDate', FILTER_SANITIZE_STRING));
    }

    protected function getProfilePicture(): string {
        return (isset($_FILES['photo'])) ? $_FILES['photo'] : '';
    }
    
    protected function postValidate($param): string {
        
        $param = trim($param);
        $param = strip_tags($param);
        $param = addslashes($param);

        return $param;
    }

}
