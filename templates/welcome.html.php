<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="robots" content="noindex,nofollow,noarchive,nosnippet,noodp,notranslate,noimageindex"/>
    <title>Essential PHP Framework!</title>
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            color: #3b4351;
            background-color: #f3f3f3;
            font-size: 14px;
            margin: 0;
            height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            font-family: Source Sans Pro,Helvetica Neue,Arial,sans-serif;
        }

        .title {
            font-weight: 600;
            line-height: 1.125;
            font-size: 2.5em;
            margin: 0;
            color: #077baa;
        }

        .small {
            font-size: 1rem;
        }

        .sub-title {
            font-weight: 500;
            line-height: 1.125;
            font-size: 1.5em;
        }

        a {
            color: #3b4351;
            cursor: pointer;
            text-decoration: underline;
        }

        header {
            height: 60px;
            display: flex;
            align-items: center;
            padding: 0.5em;
        }

        main {
            flex: 1;
        }

        .text-center {
            text-align: center;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: auto;
            padding: 1em;
        }

        .badge {
            align-items: center;
            background-color: #077baa;
            color: #fff;
            display: inline-flex;
            font-size: 1em;
            height: 2em;
            justify-content: center;
            line-height: 1.5;
            padding-left: .75em;
            padding-right: .75em;
            white-space: nowrap;
            margin: 0.2rem;
        }

        p {
            line-height: 1.5rem;
            font-size: 1.2em;
        }
        .h3 {
            font-size: 1.1em;
            font-weight: 400;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<header>
    <div class="badge">Essential <?php echo \Essential\Core\BaseKernel::VERSION ?></div>
    <?php if (getenv('APP_ENV') === 'dev'): ?>
        <div class="badge">PHP <?php echo phpversion() ?></div>
        <div class="badge">ENVIRONMENT : <?php echo getenv('APP_ENV') ?></div>
    <?php endif; ?>
</header>
<main>
    <div class="container text-center">
        <h1 class="title">Essential <span class="small">PHP micro-framework</span></h1>
        <h2 class="sub-title">Fast and light Framework for PHP</h2>
        <h3 class="h3">Size : 2,9MB with the dependencies (production environment)</h3>
        <p>
            Set up web applications and APIs with clean, simple code and very easy configuration.<br/>
            You choose which components you want to use, nothing is imposed!<br/>
            No configuration in YML, .ini or xml, only PHP
        </p>
    </div>
</main>
<footer>
    <p class="text-center">
        Made with <span style="color: #e25555;">❤</span> in Paris by
        <a class="mr-4" href="https://essential.devcoder.xyz" target="_blank" rel="noopener">
            Essential - Devcoder.xyz (F. Michel.R)
        </a>
        <a class="ml-4" href="mailto:dev@devcoder.xyz">
            Contact us
        </a>
    </p>
</footer>
</body>
</html>
