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

                        <div class="module">
                            <div class="module-head">
                                <h3><a href="http://elearning.dokumenary.net/2.0/index.php/pengumuman">Pengumuman</a> / Buat Pengumuman</h3>
                            </div>
                            <div class="module-body">


                                <form action="<?php echo base_url("/index.php/admin/Pengumuman/doAddPengumuman") ?>" method="post" accept-charset="utf-8" class="form-horizontal row-fluid" enctype="multipart/form-data">
                                    <div class="control-group">
                                        <label class="control-label">Judul <span class="text-error">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="judul" class="span12" value="">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Tgl. Tampil <span class="text-error">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="tgl_tampil" class="span4" value="" id="pengumuman-tgl-tampil">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Konten <span class="text-error">*</span></label>
                                        <div class="controls">
                                            <textarea name="konten" class="texteditor"></textarea>

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Tampil Disiswa</label>
                                        <div class="controls">
                                            <label class="radio inline"><input type="radio" name="tampil_siswa" value="1" checked=&quot;checked&quot;> Ya</label>
                                            <label class="radio inline"><input type="radio" name="tampil_siswa" value="0"> Tidak</label>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Tampil Dipengajar</label>
                                        <div class="controls">
                                            <label class="radio inline"><input type="radio" name="tampil_pengajar" value="1" checked=&quot;checked&quot;> Ya</label>
                                            <label class="radio inline"><input type="radio" name="tampil_pengajar" value="0"> Tidak</label>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <a href="http://elearning.dokumenary.net/2.0/index.php/pengumuman" class="btn btn-default">Kembali</a>
                                        </div>
                                    </div>
                                </form>

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