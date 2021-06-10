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
                <?php $this->load->view('template/sidenav.php') ?>
                <!--/.span3-->
                <div class="span9 mobile-12">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Tugas</h3>
                            </div>
                            <div class="module-body">

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="7%">ID</th>
                                            <th>Informasi Tugas</th>
                                            <th width="15%">Statu</th>
                                            <th width="15%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tugas as $tugas) : ?>
                                            <tr>
                                                <td><b><?php echo $tugas["id_tugas"]; ?></b></td>
                                                <td>
                                                    <strong class="text-warning"><?php echo $tugas["judul_tugas"]; ?></strong>
                                                    <br><small><b><?php echo $tugas["nama_mapel"]; ?></b>
                                                    </small>
                                                    <br><small><b>Pembuat : </b> <a href=""><?php echo $tugas["nama"]; ?></a>, <?php echo $tugas["tgl_upload"]; ?></small>
                                                    <hr style="margin-top: 5px;margin-bottom: 5px;border:none;border-bottom: 1px dashed black;">
                                                    <p>-</p>

                                                </td>

                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url() . 'index.php/siswa/Jadwalmapel/pelajaran?id_mapel=' .$tugas["id_mapel"]?>" class="btn btn-info btn-small iframe-lihat-nilai"><i class="icon-zoom-in"></i> Detail</a>

                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>


                                    </tbody>
                                </table>
                                <br>


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
    <div class="footer">
        <div class="container">
            <center>
                <b class="copyright">Copyright &copy; 2014 - 2020 SMA N 1 Dokumenary DEMO by Almazari - <a href="http://www.dokumenary.net">dokumenary.net</a> </b> All rights reserved.<br>
                <a href="https://github.com/almazary/new_elearning">versi 2.0</a> | Page loaded in 0.1450 seconds.
            </center>
        </div>
    </div>

    <script type="text/javascript">
        var site_url = "http://elearning.dokumenary.net/2.0/index.php";
        var base_url = "http://elearning.dokumenary.net/2.0/";
    </script>
    <script src="http://elearning.dokumenary.net/2.0/assets/comp/jquery/jquery.js" type="text/javascript"></script>
    <script src="http://elearning.dokumenary.net/2.0/assets/comp/jquery/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script data-pace-options='{ "ajax": false }' src="http://elearning.dokumenary.net/2.0/assets/comp/pace/pace.min.js" type="text/javascript"></script>
    <script src="http://elearning.dokumenary.net/2.0/assets/comp/offline/offline.min.js" type="text/javascript"></script>
    <script src="http://elearning.dokumenary.net/2.0/assets/comp/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="http://elearning.dokumenary.net/2.0/assets/comp/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>
    <script src="http://elearning.dokumenary.net/2.0/assets/comp/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js" type="text/javascript"></script>
    <script src="http://elearning.dokumenary.net/2.0/assets/comp/ckeditor/plugins/ckeditor_wiris/integration/WIRISplugins.js?viewer=image" type="text/javascript"></script>
    <script src="http://elearning.dokumenary.net/2.0/assets/comp/timeago/jquery.timeago.js" type="text/javascript"></script>
    <script src="http://elearning.dokumenary.net/2.0/assets/comp/jquery/app.js" type="text/javascript"></script>

    <script src="http://elearning.dokumenary.net/2.0/assets/themes/default/scripts/script.js" type="text/javascript"></script>

</body>

</html>