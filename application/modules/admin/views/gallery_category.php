<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('common/head'); ?>
        <style>
            .m-heading {margin-bottom: 30px;}
        </style>
    </head>
    <body class="hold-transition skin-blue layout-top-nav">
        <div class="wrapper">
            <?php $this->load->view('common/nav'); ?>
            <div class="content-wrapper">
                <div class="m-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 style="text-transform: uppercase; padding-top: 8px;">Add Gallery Category</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="<?= base_url('admin/image_upload') ?>" class="btn btn-success pull-right"><i class="fa fa-plus"></i> &nbsp;Upload Images</a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <?php $this->load->view('common/alert'); ?>
                    <form name="category_form" id="category_form" method="post" action="<?= current_url(); ?>">
                        <div class="well">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Add Category</label>
                                        <span class="error_add_category" style="color: red;display: inline-block; ">*</span>
                                        <input type="text" class="form-control" id="add_category" placeholder="Add Category" autocomplete="off" name="add_category" >
                                        <?= form_error('add_category'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php $this->load->view('common/footer'); ?>
    </body>
</html>