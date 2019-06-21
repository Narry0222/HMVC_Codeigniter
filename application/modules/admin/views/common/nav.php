<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <span class="navbar-brand font-mont"><b>PRAVARA</b></span>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="<?= (($this->uri->segment(2) == 'dashboard') ? 'active' : ''); ?>"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
                    <li class="<?= ((($this->uri->segment(2) == 'image_upload') || ($this->uri->segment(2) == 'create_category')) ? 'active' : ''); ?>"><a href="<?= base_url('admin/image_upload'); ?>">Gallery</a></li>
                    <li class="<?= (($this->uri->segment(2) == 'contacts') ? 'active' : ''); ?>"><a href="<?= base_url('admin/contacts'); ?>">Contacts</a></li>
                </ul>
            </div>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle login-name" data-toggle="dropdown"><?= $this->session->userdata('firstname') . ' ' . $this->session->userdata('lastname') . ' ' ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= base_url('admin/change_password'); ?>"><i class="fa fa-key"></i>Change Password</a></li>
                            <li><a href="<?= base_url('admin/logout'); ?>"><i class="fa fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>