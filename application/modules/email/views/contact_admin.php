<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Contact</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {font-family: sans-serif;}
            p { line-height: 20px; text-align: justify; font-size: 14px;}
            .text-center {text-align: center;}
            .container {max-width:600px; margin: 0px auto; background: #eee; border: 1px dashed #ddd; padding: 20px; margin-top: 25px;}
        </style>
    </head>
    <body>
        <div class="container">
            <h3>Some One Contact Us</h3>
            <p><b>Name :</b> <?= $firstname . ' ' . $lastname; ?></p>
            <p><b>Email :</b> <?= $email; ?></p>
            <p><b>Phone :</b> <?= $number; ?></p>
            <p><b>Message :</b> <?= $message; ?></p>
        </div>
    </body>
</html>