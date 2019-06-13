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
            <h3>Some One Registered With Us</h3>
            <p><b>Name :</b> <?= $firstname . ' ' . $lastname; ?></p>
            <p><b>Email :</b> <?= $email_id; ?></p>
            <p><b>Mobile :</b> <?= $mobile; ?></p>
            <p><b>Address :</b> <?= $address; ?></p>
            <p><b>Category :</b> <?= $category; ?></p>
            <p><b>Venue :</b> <?= $venue; ?></p>
            <p><b>Amount :</b> <?= ($half_amount == 0) ? $total_amount : $advance_amount; ?></p>
        </div>
    </body>
</html>