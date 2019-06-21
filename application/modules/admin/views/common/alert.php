<div style="margin-top: 20px;">
    <?php if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <h4><i class="fa fa-check"></i>&nbsp;&nbsp;Success</h4>
            <p><?= $this->session->flashdata('success'); ?></p>
        </div>
    <?php } ?>
    <?php if ($this->session->flashdata('error')) { ?>
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <h4><i class="fa fa-times-rectangle"></i>&nbsp;&nbsp;Error</h4>
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>
</div>