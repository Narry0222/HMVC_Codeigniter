<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('common/head'); ?>
        <style>
            .search_bar {padding-bottom: 10px;box-shadow: 0px 5px 20px #ddd;border: 1px solid #ddd;border-radius: 0;}
            .pagination {margin-top: 0; margin-bottom: 10px;}
            .icon_crud a {padding: 0px 5px;}
        </style>
    </head>
    <body class="hold-transition skin-blue layout-top-nav">
        <div class="wrapper">
            <?php $this->load->view('common/nav'); ?>
            <div class="content-wrapper">
                <div class="m-heading">
                    <h4 style="margin: 0;">Contact Us List</h4>
                </div>
                <div class="container-fluid">
                    <?php $this->load->view('common/alert'); ?>
                    <div class="well search_bar">
                        <form role="form" action="<?= base_url('admin/contacts'); ?>" method="get">
                            <div class="row">
                                <div class="col-md-3 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" autocomplete="name" id="name" placeholder="Search by name" value="<?= $name; ?>">
                                        <input type="hidden" name="limit" value="<?= $limit; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" autocomplete="email" id="email" placeholder="Search by email" value="<?= $email; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" autocomplete="phone" id="phone" placeholder="Search by phone" value="<?= $phone; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?= base_url('admin/contacts'); ?>" class="btn btn-default">Clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="box">
                        <div class="row" style="padding: 15px 25px 10px 25px;">
                            <div class="col-md-2">
                                <span>
                                    <form role="form" class="form-horizontal" action="<?= base_url('admin/contacts' . $querystring); ?>" method="get">
                                        Records
                                        <select name="limit" class="records-control dropdown1" onchange="this.form.submit();">
                                            <option value="10" <?= ($limit == '10 ') ? 'selected' : ''; ?>>10</option>
                                            <option value="25" <?= ($limit == '25') ? 'selected' : ''; ?>>25</option>
                                            <option value="50" <?= ($limit == '50') ? 'selected' : ''; ?>>50</option>
                                            <option value="75" <?= ($limit == '75') ? 'selected' : ''; ?>>75</option>
                                            <option value="100" <?= ($limit == '100') ? 'selected' : ''; ?>>100</option>
                                        </select>
                                        <input type="hidden" name="name" value="<?= $name; ?>">
                                        <input type="hidden" name="email" value="<?= $email; ?>">
                                        <input type="hidden" name="phone" value="<?= $phone; ?>">
                                    </form>
                                </span>
                            </div>
                            <div class="col-md-2" style="margin-top: 4px;">
                                <span class="countclass"><?= 'Count : <b>' . $ttl_rows . '</b>'; ?></span>
                            </div>
                        </div>
                        <div class="box-body">
                            <div style="padding: 0px 15px 0px 15px;">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Created</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($contacts) {
                                            foreach ($contacts as $contact) {
                                                ?>
                                                <tr>
                                                    <td><?= $contact->name; ?></td>
                                                    <td><?= $contact->email; ?></td>
                                                    <td class="text-right"><?= $contact->phone; ?>
                                                    <td class="text-center"><?= date('M d, Y (D)', strtotime($contact->created)); ?>
                                                    <td class="icon_crud text-center"><a href="<?= base_url() . "admin/viewContact/" . $contact->id; ?>" class="btn btn-primary" title="View Contact"><i class="fa fa-eye"></i></a></td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="7"><p class="text-center" style="margin: 10px;">No Data Available </p></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Created</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <?= $pagination; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('common/footer'); ?>
    </body>
</html>