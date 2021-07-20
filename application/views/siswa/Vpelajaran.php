<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/css.php') ?>
    <link type="text/css" href="<?php echo base_url() ?>assets/themes/default/css/read.css" rel="stylesheet">
</head>

<body>

    <div id="wrap">
        <div class="container">
            <?php
            if ($has_materi == "ya") { ?>
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

                    </div>
                </div>
            <?php } else { ?>
                <h1 class="title">Materi Belum tersedia</h1>
                <hr class="hr-top">
                <div class="wrap-content">
                    <div class="content" style="height: 800px;">
                    </div>
                </div>
            <?php } ?>


        </div>

        <?php if (isset($data["id_tugas"])) { ?>
            <div class="container">
                <h1 class="title"><?php echo $data["judul_tugas"]; ?></h1>
                <hr class="hr-top">
                <div class="wrap-content">
                    <div class="content" style="height: 800px;">
                        <p><?php echo $data["deskripsi"]; ?></p>
                        <p><?php echo $data["tugas"]; ?></p>
                        </p>
                        <br>

                        <?php if (isset($tugas)) { ?>
                            <?php if (isset($tugas["nilai"])) { ?>
                                <h4>
                                    <i class="icon-check"></i> Nilai : <?php echo $tugas["nilai"] ?>
                                    <div class="pull-right" style="font-size: 14px;"></div>
                                </h4>
                            <?php } else { ?>

                                <h4>
                                    <i class="icon-check"></i> Tugas Terkirim
                                    <div class="pull-right" style="font-size: 14px;"></div>
                                </h4><?php } ?>
                        <?php } else { ?>
                            <div class="row-fluid">
                                <div class="span8">
                                    <h4>
                                        <i class="icon-pencil"></i> File Tugas
                                        <div class="pull-right" style="font-size: 14px;"></div>
                                    </h4>
                                    <div class="bg-form-komentar" id="form-komentar">
                                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/siswa/Tugas/kirimTugas') ?>">
                                            <div class="control-group">
                                                <label class="control-label">File <span class="text-error">*</span></label>
                                                <div class="controls">
                                                    <input type="hidden" name="id_tugas" value="<?php echo $data["id_tugas"]; ?>">
                                                    <input type="hidden" name="id_materi" value="<?php echo $data["id_materi"]; ?>">
                                                    <input type="hidden" name="id_mapel" value="<?php echo $data["id_mapel"]; ?>">

                                                    <input type="file" name="file_tugas">
                                                    <span class="text-error"><?php echo form_error('file_tugas'); ?></span>
                                                </div>
                                            </div>
                                            <p>
                                                <button type="submit" class="btn btn-primary pull-right">Kirim Tugas</button>

                                            </p>
                                            <div class="clear"></div>
                                        </form>
                                    </div>
                                    <br>


                                </div>

                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>



    <br><br>
    <!--/.wrapper-->
    <?php $this->load->view('template/footer.php') ?>
    <?php $this->load->view('template/js.php') ?>

    <script>
        $(document).ready(function() {
            var statusabsen = <?php echo $absen ?>;
            if ("<?php echo $has_materi ?>" == "ya") {
                if (statusabsen == '0') {
                    // $('#exampleModal').modal('show');
                }
            }
        });
    </script>
</body>

</html>