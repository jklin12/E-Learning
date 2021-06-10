<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i>
            </a>
            <a class="brand" href="#">
                <img src="<?php echo base_url() ?>assets/images/logo-medium.png"> <span class="visible-phone brand-txt">e-Learning</span><span class="visible-desktop visible-tablet brand-txt">e-Learning SMA N 1 Dokumenary DEMO</span>
            </a>
            <div class="nav-collapse collapse navbar-inverse-collapse">

                <ul class="nav pull-right">

                    <li class="visible-phone visible-tablet"><a href="<?php echo base_url() ?>index.php"><i class="menu-icon icon-home"></i>Beranda</a></li>
                    <li class="visible-phone visible-tablet"><a href="<?php echo base_url() ?>index.php/message"><i class="menu-icon icon-comments"></i>Pesan <span class="menu-count-new-msg"></span></a></li>
                    <li class="visible-phone visible-tablet"><a href="<?php echo base_url("/index.php/siswa/Jadwalmapel") ?>"><i class="menu-icon icon-tasks"></i>Jadwal Matapelajaran</a></li>

                    <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php echo $this->session->userdata("nama"); ?>

                            <span class="pull-right">
                                <?php if ($this->session->userdata("foto") != null) { ?>
                                    <img src="<?php echo base_url($this->session->userdata("foto")); ?>" class="nav-avatar img-polaroid" />
                                <?php } else { ?>
                                    <img src="<?php echo base_url("userfiles/images/default_siswi.png"); ?>" class="nav-avatar img-polaroid" />
                                <?php } ?>
                                <b class="caret"></b></a>
                        </span>
                        <ul class="dropdown-menu">
                            <?php if ($this->session->userdata("loginStatus") != "isAdmin") { ?>
                                <li><a href="<?php echo base_url() ?>index.php/login/pp">Profile</a></li>
                            <?php }  ?>


                            <li><a href="<?php echo base_url('index.php/login/doLogout') ?>">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.nav-collapse -->
        </div>
    </div>
    <!-- /navbar-inner -->
</div>