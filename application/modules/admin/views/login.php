<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PRAVARA Admin</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
                <b>PRAVARA Admin</b>
            </div>
            <div class="login-box-body">
                <?php $this->load->view('common/alert'); ?>
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="<?= base_url('admin'); ?>" method="post">
                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>" >
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <?= form_error('email'); ?>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?= set_value('password'); ?>">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <?= form_error('password'); ?>
                    </div>
                    <div class="row">
                        <div class="col-xs-8" style="margin-top: 5px;">
                            <a href="<?= base_url('admin/forgot_password'); ?>">I forgot my password</a>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="<?= root; ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?= root; ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= root; ?>assets/admin/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%'
                });
            });
        </script>
    </body>
</html>
