<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/css.php') ?>
    <link type="text/css" href="<?php echo base_url() ?>assets/themes/default/css/read.css" rel="stylesheet">
</head>

<body>

    <div id="wrap">
        <div class="container">
            <h1 class="title"><?php echo $data["judul"]; ?></h1>
            <ul class="unstyled inline ul-top">
                <li><b><?php echo $data["nama_mapel"]; ?></b>,</li>
                <li>Kelas :<?php echo $data["nama_kelas"]; ?></li>
                <li>Guru: <?php echo $data["nama"]; ?></li>
                <li>Jadwal: <?php echo hari($data["hari"]) ?>, <?php echo $data["jam_mulai"] ?>- <?php echo $data["jam_selesai"] ?></li>
                <li>2 Komentar</li>
            </ul>
          
            <hr class="hr-top">
            <div class="wrap-content">
                <div class="content" style="height: 800px;">
                    <p><?php echo $data["judul"]; ?></p>
                    <p><?php echo $data["materi"];  ?>
                    </p>
                    <br>
                    <!--<div class="row-fluid">
                        <div class="span8">
                            <h4>
                                <i class="icon-pencil"></i> Tulis komentar
                                <div class="pull-right" style="font-size: 14px;"></div>
                            </h4>
                            <div class="bg-form-komentar" id="form-komentar">
                                <form method="post" action="http://elearning.dokumenary.net/2.0/index.php/materi/detail/116">
                                    <p><textarea class="span12 texteditor" id="komentar" name="komentar"></textarea></p>
                                    <p>
                                        <button class="btn btn-primary pull-right">Post komentar</button>
                                        <img src="http://elearning.dokumenary.net/2.0/userfiles/images/default_siswi.png" style="height:30px;width:30px; margin-right:5px;" class="img-circle img-polaroid">
                                        Siswa Demo
                                    </p>
                                    <div class="clear"></div>
                                </form>
                            </div>
                            <br>

                            <h4><i class="icon-comments"></i> 2 Komentar</h4>

                            <div class="komentar" id="komentar-185">
                                <img src="http://elearning.dokumenary.net/2.0/userfiles/images/default_pl.png" style="height:25px;width:25px; margin-left:5px;" class="img-circle img-polaroid pull-right">
                                <p><a href="http://elearning.dokumenary.net/2.0/index.php/pengajar/detail/1"><b>Admin Elearning</b></a>, <small>14 October 2020</small>, <small><a href="http://elearning.dokumenary.net/2.0/index.php/materi/detail/116/laporkan/185" class="text-muted iframe-laporkan"><i class="icon-bug"></i> laporkan</a></small></p>
                                <p>dhfdhfhd</p>

                            </div>
                            <div class="komentar" id="komentar-184">
                                <img src="http://elearning.dokumenary.net/2.0/userfiles/images/default_pl.png" style="height:25px;width:25px; margin-left:5px;" class="img-circle img-polaroid pull-right">
                                <p><a href="http://elearning.dokumenary.net/2.0/index.php/pengajar/detail/1"><b>Admin Elearning</b></a>, <small>14 October 2020</small>, <small><a href="http://elearning.dokumenary.net/2.0/index.php/materi/detail/116/laporkan/184" class="text-muted iframe-laporkan"><i class="icon-bug"></i> laporkan</a></small></p>
                                <p>dhdhfh</p>

                            </div>

                            <div style="font-size:12px;">
                                <div class="row-fluid">
                                    <div class="span5">
                                        2 dari 2 total data
                                    </div>
                                    <div class="span7">
                                        <div class="pagination pull-right" style="margin-top:0px;">
                                            <ul></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>-->

                </div>
            </div>
        </div>

        <?php if ($data["id_tugas"] != null) { ?>
            <div class="container">
                <h1 class="title"><?php echo $data["judul_tugas"]; ?></h1>
                <hr class="hr-top">
                <div class="wrap-content">
                    <div class="content" style="height: 800px;">
                        <p><?php echo $data["deskripsi"]; ?></p>
                        <p><?php echo $data["tugas"]; ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Absensi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('index.php/siswa/Jadwalmapel/absensi') ?>" method="post">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Keterangan:</label>
                            <input type="hidden" name="id_materi" value="<?php echo $data["id_materi"]; ?>">
                            <input type="hidden" name="id_mapel" value="<?php echo $data["id_mapel"]; ?>">

                            <textarea class="form-control" id="message-text" name="keterangan"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Absensi</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <br><br>
    <!--/.wrapper-->
    <?php $this->load->view('template/footer.php') ?>
    <?php $this->load->view('template/js.php') ?>

    <script>
      
    </script>
</body>

</html>