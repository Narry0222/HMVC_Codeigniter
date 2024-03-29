<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Reset Password</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="<?= root; ?>favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="<?= root; ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= root; ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= root; ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= root; ?>assets/admin/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?= root; ?>assets/admin/plugins/iCheck/square/blue.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style>
            .error {
                color: #a94442;
                font-size: 12px !important;
            }
        </style>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <b>Reset Password</b>
            </div>
            <div class="login-box-body">
                <?php $this->load->view('common/alert'); ?>
                <form action="<?= current_url(); ?>" method="post">
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?= set_value('password'); ?>">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <?= form_error('password'); ?>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" value="<?= set_value('confirm_password'); ?>">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <?= form_error('confirm_password'); ?>
                    </div>
                    <div class="row">
                        <div class="col-xs-8" style="margin-top: 5px;">
                            <a href="<?= base_url('admin'); ?>">Login</a>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="<?= root; ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?= root; ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>
