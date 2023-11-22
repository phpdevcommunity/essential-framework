<?php

use Essential\Core\Http\Exception\HttpExceptionInterface;

/**
 * @var HttpExceptionInterface $exception
 */
?>
<!DOCTYPE html>
<html lang="<?php echo container()->get('app.locale') ?>">
<head>
    <meta name="robots" content="noindex,nofollow,noarchive,nosnippet,noodp,notranslate,noimageindex"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $exception->getStatusCode(); ?> - <?php echo $exception->getDefaultMessage(); ?></title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .error-container {
            text-align: center;
        }

        .error-code {
            font-size: 120px;
            font-weight: bold;
            color: #939393;
            margin: 0;
        }

        .error-message {
            font-size: 24px;
            color: #495057;
            margin: 10px 0;
        }

    </style>
</head>
<body>
<div class="error-container">
    <h1 class="error-code"><?php echo $exception->getStatusCode(); ?></h1>
    <p class="error-message"><?php echo $exception->getDefaultMessage(); ?></p>
</div>
</body>
</html>
