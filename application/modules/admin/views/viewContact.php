<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('common/head'); ?>
        <style>
            .profile table { margin-top: 25px; }
            .profile table .pro-th { width: 35%; background: #f5f5f5; }
        </style>
    </head>
    <body class="hold-transition skin-blue layout-top-nav">
        <div class="wrapper">
            <?php $this->load->view('common/nav'); ?>
            <div class="content-wrapper">
                <div class="m-heading"><h4>View Contact</h4></div>
                <div class="container">
                    <?php $this->load->view('common/alert'); ?>
                    <div class="back-color">
                        <div class="profile">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?= base_url('admin/contacts/'); ?>" class="btn btn-info pull-right"><i class="fa fa-list"></i>&nbsp;&nbsp;Contacts List</a>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <tr>
                                    <th class="pro-th">Name</th>
                                    <td><?= $profile->name; ?></td>
                                </tr>
                                <tr>
                                    <th class="pro-th">Email</th>
                                    <td><?= $profile->email; ?></td>
                                </tr>
                                <tr>
                                    <th class="pro-th">Phone</th>
                                    <td><?= $profile->phone; ?></td>
                                </tr>
                                <tr>
                                    <th class="pro-th">Message</th>
                                    <td class="text-justify"><?= $profile->message; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('common/footer'); ?>
    </body>
</html>