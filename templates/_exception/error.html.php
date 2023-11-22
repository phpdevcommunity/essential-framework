<?php

use Essential\Core\Http\Exception\HttpExceptionInterface;

/**
 * @var HttpExceptionInterface $exception
 */
?>

<!DOCTYPE html>
<html lang="<?php echo container()->get('app.locale') ?>">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow,noarchive,nosnippet,noodp,notranslate,noimageindex"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $exception->getStatusCode(); ?> - <?php echo $exception->getDefaultMessage(); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 1rem auto;
            padding: 2em;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 33px;
            color: #333;
            margin: 0 0 20px;
        }

        h2 {
            font-size: 22px;
            color: #555;
        }

        p {
            font-size: 16px;
            color: #777;
            margin: 20px 0;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Oops, an error occurred</h1>
    <h2>Error <?php echo $exception->getStatusCode(); ?></h2>
    <p><?php echo $exception->getDefaultMessage(); ?></p>
</div>
</body>
</html>
