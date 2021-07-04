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
                            <li><a href="<?php echo base_url("/index.php/pengajar/tugas") ?>"><i class="menu-icon icon-tasks"></i>Tugas</a></li>
                        </ul>
                    </div>
                    <!--/.sidebar-->
                </div>
                <!--/.span3-->
                <div class="span9 mobile-12">
                    <div class="content" style="height: 800px;">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>Jadwal Mengajar</strong>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($jadwal as $jw) :
                                            echo '        <tr>
                                            <td style="border-top: 0px;" width="15%"><b>' . hari($jw["hari"]) . '</b></td>
                                            <td style="border-top: 0px;">
                                                <table class="table table-condensed">';
                                            foreach ($jw["data"] as $dt) {
                                                echo ' <tbody>
                                                <tr class="success">
                                                    <td width="5%">' . $dt["jam_mulai"] . '</td>
                                                    <td width="2%">-</td>
                                                    <td width="5%">' . $dt["jam_selesai"] . '</td>
                                                    <td width="30%"><a href="' . base_url() . 'index.php/pengajar/JadwalMengajar/materi/' .
                                                  $dt["id_mapel"] . '" >' . $dt["nama_mapel"] . '</td>
                                                    <td>Kelas : <a href="#">' . $dt["nama_kelas"] . '</a></td>
                                                </tr>
    
                                            </tbody>';
                                            }
                                            echo '   </table>
                                            </td>
                                        </tr>';

                                        ?>

                                        <?php endforeach; ?>
                                        <tr>
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