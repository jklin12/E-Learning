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
                        </ul>
                    </div>
                    <!--/.sidebar-->
                </div>
                <!--/.span3-->
                <div class="span9 mobile-12">
                    <div class="content">

                        <div class="btn-controls">
                            <div id="show-urgent-info"></div>

                            <div class="btn-box-row row-fluid">
                                <div class="span12">
                                    <div class="well well-small well-box">
                                        <small class="pull-right hidden-phone hidden-tablet">23 November 2020, IP anda: 202.169.224.59</small>
                                        Selamat datang di <b>e-learning SMA N 1 Dokumenary DEMO</b>
                                        <br>
                                        <i class="icon icon-map-marker"></i> Alamat: Depokan KG II 129 Prenggan Kotagede Yogyakarta
                                        <i class="icon icon-phone"></i> Telpon: 085228482669
                                    </div>
                                </div>
                            </div>



                            <div class="btn-box-row row-fluid">
                                <div class="span12">
                                    <div class="well well-small well-box">
                                        <b>Peraturan e-learning : </b><br>
                                        <p>Aplikasi e-learning yang anda gunakan sekarang adalah versi demo, anda dapat mencoba seluruh fitur pada aplikasi kecuali halaman yang terdapat notifikasi "Maaf, untuk keperluan demo aplikasi, halaman ini tidak dapat diperbaharui.". Silahkan mencoba aplikasi ini baik sebagai admin, pengajar ataupun siswa.</p>
                                        <p>Mohon untuk tidak mengupload file dengan ukuran besar atau menggunakan kata-kata yang tidak sopan, profokasi ataupun pornografi.</p>
                                        <p>Jika anda sudah mencoba dan ingin mendownload aplikasi ini untuk diterapkan disekolah anda, silahkan mendownload pada web portal <a href="http://www.dokumenary.net/" target="_blank">http://www.dokumenary.net/</a>, mohon untuk dibaca dengan seksama panduan installnya.</p>
                                        <p>Jika ada fitur pada demo aplikasi ini yang tidak berfungsi, silahkan laporkan pada bugs tracker <a href="http://www.dokumenary.net/2015/08/23/penelusuran-bugs-new-elearning-versi-1-0/" target="_blank">http://www.dokumenary.net/2015/08/23/penelusuran-bugs-new-elearning-versi-1-0/</a></p>
                                        <p><br />Salam, Almazari</p>
                                    </div>
                                </div>
                            </div>

                            <div class="btn-box-row row-fluid">
                                <div class="span6">
                                    <div class="well well-small well-box">
                                        <b><i class="icon-tasks"></i> Tugas terbaru</b>
                                        <table class="table table-striped table-condensed">
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/tugas?judul=PTS">PTS</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/tugas?judul=ternak+lele">ternak lele</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/tugas?judul=Tugas+Penjaskes+Chapter+7">Tugas Penjaskes Chapter 7</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/tugas?judul=jk">jk</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/tugas?judul=Ujian+semester+Ganjil">Ujian semester Ganjil</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/tugas?judul=Admin+Soal">Admin Soal</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/tugas?judul=Fiqih">Fiqih</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/tugas?judul=One+Hour+of+Code+02_Repeat">One Hour of Code 02_Repeat</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/tugas?judul=as">as</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/tugas?judul=Contoh">Contoh</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="well well-small well-box">
                                        <b><i class="icon-book"></i> Materi terbaru</b>
                                        <table class="table table-striped table-condensed">
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/materi/detail/122" target="_tab">tes</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/materi/detail/121" target="_tab">Test Logo Kementrian Pertahanan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/materi/detail/120" target="_tab">Materi Ajar IPS</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/materi/detail/118" target="_tab">logaritma</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/materi/detail/117" target="_tab">persamaan linear</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/materi/detail/116" target="_tab">Bahasa Indonesia Materi 1</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/materi/detail/114" target="_tab">Jadwal PTS Ganjil 2020</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/materi/detail/113" target="_tab">Jadwal PTS Ganjil 2020</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/materi/detail/108" target="_tab">Tes</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="http://elearning.dokumenary.net/2.0/index.php/materi/detail/106" target="_tab">KOMPUTER DAN JARINGAN</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="span6">
                                    <div class="well well-small well-box">
                                        <b><i class="icon-bullhorn"></i> Pengumuman</b>
                                        <table class="table table-striped table-condensed">
                                        </table>
                                    </div>

                                    <div class="well well-small well-box">
                                        <b><i class="icon-signin"></i> Riwayat login pengguna</b>
                                        <div id="show-last-login-list"></div>
                                    </div>
                                </div>
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