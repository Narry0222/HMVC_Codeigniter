<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>APNRT</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
            body {font-family: sans-serif;}
            p { line-height: 20px; text-align: justify; font-size: 14px;}
            .text-center {text-align: center;}
            .container {max-width:600px; margin: 0px auto;}
            .message {background: rgba(255, 193, 7, 0.32); max-width: 600px; color:#333; padding: 15px;}
            .header-table { font-family: sans-serif; width: 100%; background: rgba(255, 193, 7, 0.6); font-size:14px; color:#333; padding: 5px 10px; border-bottom: none; }
            .footer { font-family: sans-serif; background: rgba(255, 193, 7, 0.6); width:100%; font-size:14px; color:#333; padding: 10px; border-bottom: none; }
            .password { border: 1px solid #333; border-collapse: collapse;}
            .password th, .password td { border: 1px solid #333; border-collapse: collapse; padding: 5px 15px;}
        </style>
    </head>
    <body>
        <div class="container">
            <table class="header-table">
                <tbody>
                    <tr>
                        <td style="width: 35%;">
                            <img src="<?= root; ?>assets/img/bg/appolice.png" style="width: 100%;">
                        </td>
                        <td style="width: 50%;"></td>
                        <td style="width: 15%;">
                            <img src="<?= root; ?>assets/img/bg/andhra.png" style="float: right; width: 100%;">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="message">
                <p>Dear <?= $name; ?>,</p>
                <p>This is a system-generated mail that is being sent out to you with regard to your account at <b>appolicenricell.com</b>. <br/>Click on the following link to create new password for your account.</p>
                <table class="password">
                    <tr>
                        <th><a href="<?= $link; ?>">Click here to create a new password</a></th>
                    </tr>
                </table>
                <p><b>Note: </b>This password link will be functional for 72 hours and can only be used once. Please ensure that your account security has not been compromised and is being accessed by an authorized person from your company.</p>
                <p>For any further queries about subscription and log-in details, please write to us at apnrigcell.cid@gmail.com or call us at our Recruiter Helpline given below.</p>
                <p>
                    Regards,<br/>
                    AP POLICE NRI CELL Team.
                </p>
            </div>
            <table class="footer">
                <tbody>
                    <tr>
                        <td>
                            <h5 style="line-height: 22px;color: #34495e; padding: 5px 0; font-size: 14px; text-align: center; margin: 0px;">HELPLINE NO : <span style="color: #15c;"><b><u>&nbsp;91-9440700830</u></b></span>, TOLL FREE NO : <span style="color: #15c;"><b><u>&nbsp;1800 300 26234</u></b></span><br> Mail : <span style="color: #15c;"><b><u>apnrigcell.cid@gmail.com, apisscell.cid@gmail.com</u></b></span>.</h5>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>

