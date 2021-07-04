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
                                <li>
                                    <a href="<?php echo base_url('index.php/pengajar/Ipengajar') ?>">
                                        <i class="menu-icon icon-home"></i>Beranda</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>index.php/message">
                                        <i class="menu-icon icon-comments"></i>Pesan
                                        <span class="menu-count-new-msg"></span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url("/index.php/pengajar/JadwalMengajar") ?>">
                                        <i class="menu-icon icon-tasks"></i>Jadwal Menagajar</a>
                                </li>
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
                                    <strong>Daftar Tugas Terkirim</strong>
                                </div>
                                <div class="panel-body">
                                    <table class="table">
                                        <tbody>

                                            <?php $i = 1;
                                                foreach ($tugas_kirim as $dt) { ?>
                                            <tr>
                                                <td>
                                                    <b><?php echo $i++ ?></b>
                                                </td>
                                                <td>
                                                    <p>
                                                        <strong class="text-warning">
                                                            <?php echo $dt["nama"] ?>
                                                        </strong>
                                                    </p>
                                                    <ul class="breadcrumb" style="padding: 0px;background: none;">
                                                        <?php if($dt["nilai"] != null) {?>
                                                            <li>Nilai : 
                                                            <?php echo $dt["nilai"] ?>&nbsp;
                                                            <span class="divider">/</span>
                                                        </li>
                                                        <?php }?>
                                                        <li>
                                                            <?php echo $dt["nama_kelas"] ?>&nbsp;
                                                            <span class="divider">/</span>
                                                        </li>

                                                        <li>
                                                            Dikirim :
                                                            <?php echo $dt["tgl_upload"] ?>
                                                            <span class="divider">/</span>
                                                        </li>

                                                    </ul>
                                                </td>
                                                <td>
                                                    <div class="btn-group">

                                                        <a
                                                            data-toggle="modal"
                                                            data-id="<?php echo base_url('userfiles/uploads/'.$dt["tugas_kirim"])?>"
                                                            class="open-AddBookDialog btn btn-default btn-small"
                                                            href="#addBookDialog">
                                                            <i class="icon-zoom-in"></i>
                                                            File</a>

                                                        <div class="modal hide" id="addBookDialog">
                                                            <div class="modal-header">
                                                                <button class="close" data-dismiss="modal">×</button>
                                                                <h5>Tugas Siswa <?php echo $dt["nama"]?></h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="images"></div>
                                                            </div>
                                                        </div>

                                                        <?php if($dt["nilai"] == null) {?>
                                                        <a
                                                            data-toggle="modal"
                                                            data-id="<?php echo $dt["id_tugas_kirim"] ?>"
                                                            data-idtugas="<?php echo $dt["id_tugas"] ?>""
                                                            class="open-AddBookDialog btn btn-default btn-small"
                                                            href="#modalnilai"></i>
                                                            Nilai</a>
                                                        <?php } ?>

                                                        <div class="modal hide" id="modalnilai">
                                                            <div class="modal-header">
                                                                <button class="close" data-dismiss="modal">×</button>
                                                                <h5>Tugas Siswa <?php echo $dt["nama"]?></h5>
                                                            </div>
                                                            <div class="modal-body">
                                                            <form action="addnilai" method="POST" id="formnilai" >
                                                                <div class="form-group">
                                                                    <input type="hidden" name="idtugas" id="idtugas" >
                                                                    <input type="hidden" name="id" id="id" >
                                                                    <label for="recipient-name" class="col-form-label">Niali:</label>
                                                                    <input type="text" name="nilai" class="form-control" >
                                                                </div>
                                                            </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button  type="submit" form="formnilai" value="Submit" class="btn btn-primary">Nilai</button>
                                                            </div>
                                                        </div>
                                                      

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
        <script>
            $(document).on("click", ".open-AddBookDialog", function () {
                var myBookId = $(this).data('id');
                var idtugas =  $(this).data('idtugas');
                $(".modal-body #id").val(myBookId);
                $(".modal-body #idtugas").val(idtugas);
                $(".modal-body #images").html('<img src="'+myBookId+'">');
            });
        </script>
    </body>

</html>