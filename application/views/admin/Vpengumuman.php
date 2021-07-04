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
                    <div class="content" style="height: 800px;">

                        <div class="module">
                            <div class="module-head">
                                <h3>Pengumuman</h3>
                            </div>
                            <div class="module-body">


                                <div class="clearfix">
                                    <div class="pull-right">
                                        <form class="form-search" method="get" action="http://elearning.dokumenary.net/2.0/index.php/pengumuman/index/1">
                                            <div class="input-append">
                                                <input type="text" class="span3 search-query" placeholder="cari pengumuman..." name="q" value="">
                                                <button type="submit" class="btn"><i class="icon-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="pull-left">
                                        <a href="<?php echo base_url("/index.php/admin/Pengumuman/addpengumuman") ?>" class="btn btn-primary"><i class="icon-pencil"></i> Buat</a>
                                    </div>
                                </div>
                                <br>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">ID</th>
                                                <th>Judul</th>
                                                <th width="17%">Tgl. Tampil</th>
                                                <th width="17%">Tgl. Tutup</th>
                                                <th width="15%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><b>61</b></td>
                                                <td><a href="http://elearning.dokumenary.net/2.0/index.php/pengumuman/detail/61"><b>libur sekolah</b></a></td>
                                                <td>02 Desember 2020</td>
                                                <td>09 Desember 2020</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a class="btn btn-default btn-small" href="http://elearning.dokumenary.net/2.0/index.php/pengumuman/detail/61" data-toggle="tooltip" title="Detail"><i class="icon-zoom-in"></i></a>



                                                        <a class="btn btn-default btn-small" href="http://elearning.dokumenary.net/2.0/index.php/pengumuman/edit/61" data-toggle="tooltip" title="Edit"><i class="icon-edit"></i></a>



                                                        <a onclick="return confirm('Anda yakin ingin menghapus?')" class="btn btn-default btn-small" href="http://elearning.dokumenary.net/2.0/index.php/pengumuman/delete/61" data-toggle="tooltip" title="Hapus"><i class="icon-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>35</b></td>
                                                <td><a href="http://elearning.dokumenary.net/2.0/index.php/pengumuman/detail/35"><b>UJIAN SEMESTER GANJIL</b></a></td>
                                                <td>06 Februari 2020</td>
                                                <td>07 Februari 2020</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a class="btn btn-default btn-small" href="http://elearning.dokumenary.net/2.0/index.php/pengumuman/detail/35" data-toggle="tooltip" title="Detail"><i class="icon-zoom-in"></i></a>



                                                        <a class="btn btn-default btn-small" href="http://elearning.dokumenary.net/2.0/index.php/pengumuman/edit/35" data-toggle="tooltip" title="Edit"><i class="icon-edit"></i></a>



                                                        <a onclick="return confirm('Anda yakin ingin menghapus?')" class="btn btn-default btn-small" href="http://elearning.dokumenary.net/2.0/index.php/pengumuman/delete/35" data-toggle="tooltip" title="Hapus"><i class="icon-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
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