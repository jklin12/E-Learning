<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/css.php') ?>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                        </ul>
                    </div>
                    <!--/.sidebar-->
                </div>
                <!--/.span3-->
                <div class="span9 mobile-12">
                    <div class="content" style="height: 800px;">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>Tambah Materi <?php echo $nama_mapel?></strong>
                            </div>
                            <div class="panel-body">

                                <form action="<?php echo base_url("index.php/pengajar/JadwalMengajar/doAddMateri") ?>" method="post" accept-charset="utf-8" class="form-horizontal row-fluid" id="form-materi" enctype="multipart/form-data">

                                    <div id="fomrMateri">
                                        <input type="hidden" name="jadwal_id" class="span12" value="<?php echo $id_jadwal?>">
                                        <input type="hidden" name="mapel_id" class="span12" value="<?php echo $id_mapel?>">
                                               
                                        <div class="control-group">
                                            <label class="control-label">Judul <span class="text-error">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="judul" class="span12" value="">
                                                <br>
                                                <span class="text-error">
                                                    <?php echo form_error('judul'); ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Deskripsi <span class="text-error">*</span></label>
                                            <div class="controls">
                                                <textarea type="text" name="deskripsi" class="span12" value=""></textarea>
                                                <br>
                                                <span class="text-error">
                                                    <?php echo form_error('deskripsi'); ?>
                                                </span>
                                            </div>
                                        </div>
                                      

                                        <div class="control-group">
                                            <label class="control-label">Untuk Kelas <span class="text-error">*</span></label>
                                            <div class="controls">
                                                <ul class="unstyled inline" style="margin-left: -5px;">
                                                    <?php foreach ($kelas as $kl) { ?>
                                                        <li>
                                                            <label class="checkbox inline">
                                                                <input type="checkbox" name="kelas_id[]" value="<?php echo $kl["id_kelas"] ?>"> <?php echo $kl["nama_kelas"] ?>
                                                            </label>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                                <span class="text-error"> <?php echo form_error('kelas_id'); ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">File <span class="text-error">*</span></label>
                                            <div class="controls">
                                                <input id="haveTugas" type="hidden" name="tugas" value="0">
                                                <input type="file" name="userfile">
                                                <span class="text-error"><?php echo form_error('userfile'); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="formTugas" style="margin-top: 20px;display: none;" >
                                        <div class="control-group">
                                            <label class="control-label">Judul Tugas<span class="text-error">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="judul_tugas" class="span12" value="">
                                                <br>
                                                <span class="text-error"><?php echo form_error('judul_tugas'); ?></span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Deskripsi Tugas<span class="text-error">*</span></label>
                                            <div class="controls">
                                                <textarea type="text" name="deskripsi_tugas" class="span12" value=""></textarea>
                                                <br>
                                                <span class="text-error"><?php echo form_error('deskripsi_tugas'); ?></span>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">File Tugas<span class="text-error">*</span></label>
                                            <div class="controls">
                                                <input type="file" name="userfile_tugas">
                                                <span class="text-error"><?php echo form_error('userfile_tugas'); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group" style="padding-top:20px;">
                                        <div class="controls">
                                            <a id="addTugas" class="btn btn-info">Tambah Tugas</a>
                                            <button type="submit" name="status" value="publish" class="btn btn-success">Simpan & Terbitkan</button>
                                            <a href="http://elearning.dokumenary.net/2.0/index.php/materi" class="btn btn-default" onclick="return confirm('Materi belum disimpan, anda yakin ingin kembali tanpa menyimpan?')">Kembali</a>
                                        </div>
                                    </div>
                                </form>

                                <!--<div id="progressbar" class="w3-light-grey" style="margin-top: 10px;">
                                    <div class="w3-container w3-blue" style="width:75%">75%</div>
                                </div>-->
                                <br>
                            </div>
                        </div>


                        <!--tugas -->



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

    <script>
        $(document).ready(function() {
            $("#addTugas").click(function() {
                $("#formTugas").toggle(function() {
                    if ($("#haveTugas").val() == '1') {
                        $("#haveTugas").val("0");
                    } else if ($("#haveTugas").val() == '0') {
                        $("#haveTugas").val("1");
                    }
                });

            });
        });
    </script>

</body>

</html>