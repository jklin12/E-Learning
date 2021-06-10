<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/css.php') ?>
</head>

<body>
    <?php $this->load->view('template/topnav.php') ?>

    <!-- /navbar -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="span3 visible-desktop">
                    <?php $this->load->view('admin/adminSidebar'); ?>
                    <!--/.sidebar-->
                </div>
                <!--/.span3-->
                <div class="span9 mobile-12">
                    <div class="content">

                        <div class="btn-controls">
                            <div id="show-urgent-info"></div>

                           


                            <div class="btn-box-row row-fluid">
                                <a href="javascript:;index.php/siswa/index/1" class="btn-box big span3">
                                    <i class="icon-group"></i><b><?php echo $siswa ?></b>
                                    <p class="text-muted">Siswa</p>
                                </a>
                                <a href="javascript:;index.php/pengajar/index/1" class="btn-box big span3">
                                    <i class="icon-user"></i><b><?php echo $pengajar ?></b>
                                    <p class="text-muted">Pengajar</p>
                                </a>
                                <a href="javascript:;index.php/siswa/index/0" class="btn-box big span3">
                                    <i class="icon-tasks"></i><b><?php echo $kelas ?></b>
                                    <p class="text-muted">Kelas</p>
                                </a>
                                <a href="javascript:;index.php/pengajar/index/0" class="btn-box big span3">
                                    <i class="icon-book"></i><b>2</b>
                                    <p class="text-muted"><?php echo $mapel ?></p>
                                </a>
                            </div>

                           

                        </div>
                        <!--/#btn-controls-->
                    </div>
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->
    <?php $this->load->view('template/footer.php') ?>
    <?php $this->load->view('template/js.php') ?>

</body>

</html>