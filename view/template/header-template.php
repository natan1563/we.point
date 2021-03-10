<!-- Ini-Header -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>we.point</title>
</head>

<body>
    
    <?php if (isset($_SESSION['login']) and $_SESSION['login'] = true)  require_once('toSystem/navbar-template.php'); ?>

    <div class="container">
        <header>
            <div class="row d-flex mt-5 w-50">
                <h2><?= $title ?></h2>
            </div>
        </header>

        <!-- End-Header -->