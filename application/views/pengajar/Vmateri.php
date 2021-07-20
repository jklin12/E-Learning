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
                    <div class="sidebar">
                        <ul class="widget widget-menu unstyled">
                            <li><a href="<?php echo base_url('index.php/pengajar/Ipengajar') ?>"><i class="menu-icon icon-home"></i>Beranda</a></li>
                            <li><a href="<?php echo base_url() ?>index.php/message"><i class="menu-icon icon-comments"></i>Pesan <span class="menu-count-new-msg"></span></a></li>
                            <li><a href="<?php echo base_url("/index.php/pengajar/JadwalMengajar") ?>"><i class="menu-icon icon-tasks"></i>Jadwal Menagajar</a></li>
                            <li>
                                <a href="<?php echo base_url("/index.php/pengajar/tugas") ?>">
                                    <i class="menu-icon icon-tasks"></i>Tugas</a>
                            </li>
                        </ul>
                    </div>
                    <!--/.sidebar-->
                </div>
                <!--/.span3-->
                <div class="span9 mobile-12">
                    <div class="content" style="height: 800px;">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>Materi <?php echo $judul ?></strong>
                            </div>
                            <div class="panel-body">
                                <div class="bs-callout bs-callout-info">
                                    <div class="btn-group pull-right" style="margin-top:-5px;">
                                        <a href="<?php echo base_url('index.php/pengajar/JadwalMengajar/addMateri?idjadwal=' . $id_jadwal . '&idmapel=' . $id_mapel) ?>" class="btn btn-primary">Tambah Materi </a>

                                    </div>
                                </div>
                                <!--menu-->
                                <br>

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="7%">ID</th>
                                            <th>Informasi Materi</th>
                                            <th width="15%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $i = 1;
                                        foreach ($data as $dt) { ?>
                                            <tr>
                                                <td><b><?php echo $i++ ?></b></td>
                                                <td>
                                                    <p><strong class="text-warning">
                                                            <?php echo $dt["judul"] ?>
                                                        </strong></p>
                                                    <ul class="breadcrumb" style="padding: 0px;background: none;">
                                                        <li>
                                                            <?php echo $dt["nama_mapel"] ?>
                                                            <span class="divider">/</span>
                                                        </li>
                                                        <li>
                                                            <?php echo $dt["nama_kelas"] ?>&nbsp;
                                                            <span class="divider">/</span>
                                                        </li>
                                                        <li>
                                                            <?php echo $dt["jam_mulai"] ?> - <?php echo $dt["jam_selesai"] ?>&nbsp;
                                                            <span class="divider">/</span>
                                                        </li>
                                                        <li>
                                                            Dikirim : <?php echo $dt["tgl_upload"] ?>
                                                            <span class="divider">/</span>
                                                        </li>

                                                    </ul>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url('index.php/pengajar/JadwalMengajar/detailmateri?idmateri=' .
                                                                        $dt["id_materi"]) ?>" class="btn btn-default btn-small" target="_tab"><i class="icon-zoom-in"></i> Detail</a>

                                                        <a href="<?php echo base_url('index.php/pengajar/JadwalMengajar/addMateri') ?>" class="btn btn-default btn-small"><i class="icon-edit"></i> Edit</a>

                                                        <a href="<?php echo base_url('index.php/pengajar/JadwalMengajar/deleteMateri/' .
                                                                        $dt["id_materi"]) ?>" class="btn btn-default btn-small" onclick="return confirm('Anda yakin ingin menghapus?')"><i class="icon-trash"></i> Hapus</a>
                                                    </div>
                                                </td>
                                            </tr>


                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>




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