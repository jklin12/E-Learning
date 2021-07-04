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
                                <h3><a href="">Data Siswa</a> / Detail Siswa</h3>
                            </div>
                            <div class="module-body">
                                <?php echo $this->session->flashdata('siswa'); ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <strong>Profil pengajar </strong>
                                        <div class="btn-group pull-right" style="margin-top:-4px;">
                                            <a id="edit_modal" href="javascript:void(0);" class="pengajar-iframe-4 btn btn-small btn-primary cboxElement" title="Edit Profil Pengajar" data-tanggal="<?php echo $detail["tgl_lahir"] ?>" data-id="<?php echo $detail["nis"] ?>" data-nama="<?php echo $detail["nama"] ?>" data-jenkel="<?php echo $detail["jenis_kelamin"] ?>" data-tempat="<?php echo $detail["tempat_lahir"] ?>" data-alamat="<?php echo $detail["alamat"] ?>">Edit Profil</a>

                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th style="border-top: 0px;" width="25%" bgcolor="#FBFBFB">Nis : <?php echo $detail["nis"] ?></th>
                                                    <td style="border-top: 0px;"></td>
                                                    <td rowspan="5" style="border-top: 0px;" width="15%">
                                                        <img style="width:113px;" class="img-polaroid" src="<?php echo  base_url($detail["foto"]) ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th bgcolor="#FBFBFB">Nama</th>
                                                    <td><?php echo $detail["nama"] ?></td>
                                                </tr>
                                                 
                                                <tr>
                                                    <th bgcolor="#FBFBFB">Jenis Kelamin</th>
                                                    <td><?php if ($detail["jenis_kelamin"] == "L") {
                                                            echo "laki-laki";
                                                        } else {
                                                            echo "Perempuan";
                                                        } ?></td>
                                                </tr>
                                                <tr>
                                                    <th bgcolor="#FBFBFB">Tempat Lahir</th>
                                                    <td><?php echo $detail["tempat_lahir"] ?></td>
                                                </tr>
                                                <tr>
                                                    <th bgcolor="#FBFBFB">Tanggal Lahir</th>
                                                    <td><?php echo $detail["tgl_lahir"] ?></td>
                                                </tr>
                                                <tr>
                                                    <th bgcolor="#FBFBFB">Alamat</th>
                                                    <td colspan="2"><?php echo $detail["alamat"] ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="panel panel-default" id="riwayat-kelas">
                                    <div class="panel-heading">
                                        <strong>Riwayat Kelas</strong>
                                        <div class="btn-group pull-right" style="margin-top:-4px;">
                                            <a href="javascript:;" id="editKelas" data-id="<?php echo $detail["nis"] ?>" data-kelas="<?php echo $detail["id_kelas"] ?>" class="siswa-iframe btn btn-small btn-primary cboxElement" title="Pindah siswa ke Kelas lain">Pindah Kelas</a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th>Kelas</th>
                                                    <th>Aktif</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>
                                                        <?php echo $detail['nama_kelas'] ?>
                                                    </td>
                                                    <td>
                                                        <i class="icon icon-ok"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="panel panel-default" id="akun">
                                    <div class="panel-heading">
                                        <strong>Akun Login</strong>
                                        <div class="btn-group pull-right" style="margin-top:-4px;">
                                            <a id="editUsername" href="javascript:;" data-id="<?php echo $detail["nis"] ?>" class="siswa-iframe-2 btn btn-small btn-primary cboxElement" title="Edit Username Siswa">Edit Username</a>
                                            <a id="editPassword" href="javascript:;" " data-id=" <?php echo $detail["nis"] ?>" class="siswa-iframe-3 btn btn-small btn-primary cboxElement" title="Edit Password Siswa">Edit Password</a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th width="30%" bgcolor="#FBFBFB" style="border-top: 0px;">Username</th>
                                                    <td style="border-top: 0px;">
                                                        <?php echo $detail['username'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th bgcolor="#FBFBFB">Password</th>
                                                    <td>
                                                        *********
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('index.php/admin/siswa/edit') ?>" method="post">
                        <tbody>
                            <input id="nip" type="hidden" name="id" value=" ">
                            <tr>
                                <th>Nama <span class="text-error">*</span></th>
                                <td>
                                    <input type="text" name="name" style="width:90%;" value=" ">
                                    <br>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td>
                                    <input type="text" name="tempat_lahir" value="">
                                    <br>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>
                                    <input type="text" name="tanggal" style="width:90%;" value="">
                                    <br>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>
                                    <input type="text" name="alamat" style="width:90%;" value="">
                                    <br>
                                </td>
                            </tr>
                        </tbody>

                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="usernameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Username</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('index.php/admin/siswa/editLogin') ?>" method="post">
                        <input id="nisUsername" type="hidden" name="id" value="">
                        <tr>
                            <th>Usernam Baru</th>
                            <td>
                                <input type="text" name="username" style="width:90%;" value="">
                                <br>
                            </td>
                        </tr>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('index.php/admin/siswa/editLogin') ?>" method="post">
                        <input id="nisPassword" type="hidden" name="id" value="">
                        <tr>
                            <th>Password Baru</th>
                            <td>
                                <input type="password" name="password" style="width:90%;" value="">
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <th>Ulangi Password</th>
                            <td>
                                <input type="password" name="password1" style="width:90%;" value="">
                                <br>
                            </td>
                        </tr>

                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="kelasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('index.php/admin/siswa/editKelas') ?>" method="post">
                        <input id="nisKelas" type="hidden" name="id" value="">
                        <tr>
                            <th>Pilih Kelas</th>
                            <td>
                                <select name="kelas">

                                    <?php foreach ($kelas as $kelas) : ?>
                                        <option value="<?php echo $kelas["id_kelas"] ?>"><?php echo $kelas["nama_kelas"] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <br>
                            </td>
                        </tr>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <?php $this->load->view('template/footer.php') ?>
    <?php $this->load->view('template/js.php') ?>

    <script>
        $(document).ready(function() {

            $('#edit_modal').on('click', function() {
                //alert($(this).data("id") );
                $('#exampleModal').modal('show');
                $(".modal-body #nip").val($(this).data("id"));
                $(".modal-body input[name='name']").val($(this).data("nama"));
                $(".modal-body input[name='tempat_lahir']").val($(this).data("tempat"));
                $(".modal-body input[name='tanggal']").val($(this).data("tanggal"));
                $(".modal-body input[name='alamat']").val($(this).data("alamat"));
            });

            $('#editUsername').on('click', function() {
                //alert($(this).data("id") );
                $('#usernameModal').modal('show');
                $(".modal-body #nisUsername").val($(this).data("id"));

            });

            $('#editPassword').on('click', function() {
                //alert($(this).data("id") );
                $('#passwordModal').modal('show');
                $(".modal-body #nisPassword").val($(this).data("id"));

            });

            $('#editKelas').on('click', function() {
                //alert($(this).data("kelas") );
                $('#kelasModal').modal('show');
                $(".modal-body #nisKelas").val($(this).data("id"));
                $(".modal-body #kelas").val($(this).data("kelas"));

            });




        });
    </script>


</body>

</html>