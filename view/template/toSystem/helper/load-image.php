<?php
    
    $dirImage = 'images/';

    $image = (
              $_SESSION['photo'] != null && 
              file_exists($dirImage . $_SESSION['photo'])
             ) 
              ? $dirImage . $_SESSION['photo'] 
              : $dirImage . 'default.png';
    $name = (isset($_SESSION['name'])) ? $_SESSION['name'] : ''; 