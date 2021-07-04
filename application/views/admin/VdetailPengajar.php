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
                                 <h3><a href="">Data Pengajar</a> / Detail Pengajar</h3>
                             </div>
                             <div class="module-body">
                                 <?php echo $this->session->flashdata('pengajar'); ?>
                                 <div class="panel panel-default">
                                     <div class="panel-heading">
                                         <strong>Profil pengajar </strong>
                                         <div class="btn-group pull-right" style="margin-top:-4px;">
                                             <a id="edit_modal" href="javascript:void(0);" class="pengajar-iframe-4 btn btn-small btn-primary cboxElement" title="Edit Profil Pengajar" data-tanggal="<?php echo $detail["tgl_lahir"] ?>" data-id="<?php echo $detail["nip"] ?>" data-nama="<?php echo $detail["nama"] ?>" data-jenkel="<?php echo $detail["jenis_kelamin"] ?>" data-tempat="<?php echo $detail["tempat_lahir"] ?>" data-alamat="<?php echo $detail["alamat"] ?>">Edit Profil</a>

                                         </div>
                                     </div>
                                     <div class="panel-body">
                                         <table class="table">
                                             <tbody>
                                                 <tr>
                                                     <th style="border-top: 0px;" width="25%" bgcolor="#FBFBFB">NIP : <?php echo $detail["nip"] ?></th>
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

                                 <div class="row-fluid">
                                     <div class="span12">
                                         <div class="panel panel-default">
                                             <div class="panel-heading">
                                                 <strong>Jadwal Mengajar</strong>
                                                 <div class="btn-group pull-right" style="margin-top:-4px;">
                                                     <a href="javascript:void(0);" class="pengajar-iframe btn btn-small btn-primary cboxElement tambahPelajaran" data-nip="<?php echo $detail["nip"] ?>" title="Tambah jadwal hari Senin">Tambah</a>
                                                 </div>
                                             </div>
                                             <div class="panel-body">
                                                 <table class="table">
                                                     <thead>
                                                         <tr bgcolor="#fbfbfb">
                                                             <th>HARI</th>
                                                             <th>MATAPELAJARAN DAN JAM</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         <?php foreach ($jadwal as $jadwal) : ?>
                                                             <tr>
                                                                 <th width="15%"><?php echo hari($jadwal["hari"]) ?></th>
                                                                 <?php foreach ($jadwal["data"] as $datas) : ?>
                                                                     <td>

                                                                         <table style="margin-top:10px;" class="table table-condensed">
                                                                             <tbody>
                                                                                 <tr class="info text-info">
                                                                                     <td width="15%"><?php echo $datas["jam_mulai"] . "-" . $datas["jam_selesai"] ?> </td>
                                                                                     <td><?php echo $datas["nama_mapel"] ?></td>
                                                                                     <td width="20%"><?php echo $datas["nama_kelas"] ?></td>

                                                                                     <td width="20%">
                                                                                         <a href="javascript:void(0);" title="Edit Jadwal Ajar" class="pengajar-iframe-6 cboxElement editJam" data-id="<?php echo $datas["id_jadwal"] ?>" data-idmapel="<?php echo $datas["id_mapel"] ?>" data-idkelas="<?php echo $datas["id_kelas"] ?>" data-hari="<?php echo $datas["hari"] ?>" data-nip="<?php echo $datas["nip"]  ?>" data-jammulai="<?php echo $datas["jam_mulai"]  ?>" data-jamselesai="<?php echo $datas["jam_selesai"]  ?>"><i class="icon-edit"></i> Edit</a>
                                                                                         <a href="javascript:void(0);" title="Delete Jadwal Ajar" class="pengajar-iframe-6 cboxElement deleteJadwal" data-id="<?php echo $datas["nip"]  ?>" data-name="<?php echo $datas["nama_mapel"] ?>" data-id_jadwal="<?php echo $datas["id_jadwal"] ?>"><i class="icon-trash"></i> hapus</a>
                                                                                     </td>

                                                                                 </tr>
                                                                             </tbody>
                                                                         </table>
                                                                     </td>
                                                                 <?php endforeach ?>
                                                             </tr>
                                                         <?php endforeach ?>
                                                     </tbody>
                                                 </table>
                                             </div>
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

     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Edit Pengajar</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <form action="<?php echo base_url('index.php/admin/pengajar/edit') ?>" method="post">
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

     <div class="modal fade" id="tambahJam" tabindex="-1" role="dialog" aria-labelledby="tambahJamBody" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="tambahJamBody">Tambah Pelajaran</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">

                     <form action="<?php echo base_url('index.php/admin/pengajar/addPelajaran') ?>" method="post" accept-charset="utf-8">
                         <input id="nip" type="hidden" name="nip" value=" ">

                         <table class="table table-striped">
                             <tbody>
                                 <tr>
                                     <th>Hari <span class="text-error">*</span></th>
                                     <td>
                                         <select name="hari" style="width:auto">
                                             <option value="">Pilih Hari</option>
                                             <?php for ($x = 1; $x <= 6; $x++) { ?>
                                                 <option value="<?php echo $x ?>"><?php echo hari($x) ?></option>
                                             <?php } ?>
                                         </select>

                                     </td>
                                 </tr>
                                 <tr>
                                     <th width="27%">Kelas <span class="text-error">*</span></th>
                                     <td>
                                         <select name="kelas_id" style="width:auto;" id="kelas_id">
                                             <option value="">Pilih Kelas</option>
                                             <?php foreach ($kelas as $klsss) : ?>
                                                 <option value="<?php echo $klsss["id_kelas"] ?>"><?php echo $klsss["nama_kelas"] ?></option>
                                             <?php endforeach ?>
                                         </select>
                                         <br>
                                     </td>
                                 </tr>
                                 <tr>
                                     <th>Mapel <span class="text-error">*</span></th>
                                     <td>
                                         <select name="mapel_kelas_id" style="width:auto" id="mapel_kelas_id">
                                             <option value="">Pilih Matapelajaran</option>
                                             <?php foreach ($mapel as $mapelll) : ?>
                                                 <option value="<?php echo $mapelll["id_mapel"] ?>"><?php echo $mapelll["nama_mapel"] ?></option>
                                             <?php endforeach ?>
                                         </select>

                                     </td>
                                 </tr>
                                 <tr>
                                     <th>Jam Mulai <span class="text-error">*</span></th>
                                     <td>
                                         <input type="text" name="jam_mulai" style="width:19%" placeholder="hh:mm" value="">
                                         <span class="pull-right text-muted">Contoh : 08:30</span>
                                         <br>
                                     </td>
                                 </tr>
                                 <tr>
                                     <th>Jam Selesai <span class="text-error">*</span></th>
                                     <td>
                                         <input type="text" name="jam_selesai" style="width:19%" placeholder="hh:mm" value="">
                                         <span class="pull-right text-muted">Contoh : 13:30</span>
                                         <br>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td colspan="2"><button type="submit" class="btn btn-primary">Simpan</button></td>
                                 </tr>
                             </tbody>
                         </table>
                     </form>
                 </div>

             </div>
         </div>
     </div>

     <div class="modal fade" id="editJam" tabindex="-1" role="dialog" aria-labelledby="editJamBody" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="editJamBody">Edit Pelajaran</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">

                     <form action="<?php echo base_url('index.php/admin/pengajar/editPelajaran') ?>" method="post" accept-charset="utf-8">
                         <input id="id" type="hidden" name="id" value=" ">
                         <input id="nip" type="hidden" name="nip" value=" ">


                         <table class="table table-striped">
                             <tbody>
                                 <tr>
                                     <th>Hari <span class="text-error">*</span></th>
                                     <td>
                                         <select name="hari" style="width:auto">
                                             <option value="">Pilih Hari</option>
                                             <?php for ($x = 1; $x <= 6; $x++) { ?>
                                                 <option value="<?php echo $x ?>"><?php echo hari($x) ?></option>
                                             <?php } ?>
                                         </select>

                                     </td>
                                 </tr>

                                 <tr>
                                     <th>Jam Mulai <span class="text-error">*</span></th>
                                     <td>
                                         <input type="text" name="jam_mulai" style="width:19%" placeholder="hh:mm" value="">
                                         <span class="pull-right text-muted">Contoh : 08:30</span>
                                         <br>
                                     </td>
                                 </tr>
                                 <tr>
                                     <th>Jam Selesai <span class="text-error">*</span></th>
                                     <td>
                                         <input type="text" name="jam_selesai" style="width:19%" placeholder="hh:mm" value="">
                                         <span class="pull-right text-muted">Contoh : 13:30</span>
                                         <br>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td colspan="2"><button type="submit" class="btn btn-primary">Simpan</button></td>
                                 </tr>
                             </tbody>
                         </table>
                     </form>
                 </div>

             </div>
         </div>
     </div>

     <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Hapus Pengajar</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <p>Hapus Jadwal <span id="deleteName"></span> ?</p>
                 </div>
                 <div class="modal-footer">
                     <a id="doDelete" class="btn btn-danger">Hapus</a>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                 </div>
             </div>
         </div>
     </div>


     <?php $this->load->view('template/footer.php') ?>
     <?php $this->load->view('template/js.php') ?>

     <script>
         $(document).ready(function() {

             $('.deleteJadwal').on('click', function() {
                 $('#modalDelete').modal('show');
                 $('#deleteName').html($(this).data("name"));
                 $('#doDelete').attr('href', '<?php echo base_url('index.php/admin/pengajar/deleteJAdwal/') ?>' + $(this).data("id_jadwal") + '/' + $(this).data("id"));
             });
         

         $('#edit_modal').on('click', function() {
             //alert($(this).data("id") );
             $('#exampleModal').modal('show');
             $(".modal-body #nip").val($(this).data("id"));
             $(".modal-body input[name='name']").val($(this).data("nama"));
             $(".modal-body input[name='tempat_lahir']").val($(this).data("tempat"));
             $(".modal-body input[name='tanggal']").val($(this).data("tanggal"));
             $(".modal-body input[name='alamat']").val($(this).data("alamat"));
         });


         $('.tambahPelajaran').on('click', function() {
             //alert($(this).data("id") );
             $('#tambahJam').modal('show');
             $(".modal-body #nip").val($(this).data("nip"));

         });

         $('.editJam').on('click', function() {
         //alert($(this).data("id") );
         $('#editJam').modal('show');
         $(".modal-body input[name='nip']").val($(this).data("nip"));
         $(".modal-body input[name='id']").val($(this).data("id"));
         $(".modal-body input[name='jam_mulai']").val($(this).data("jammulai"));
         $(".modal-body input[name='jam_selesai']").val($(this).data("jamselesai"));
         //$(".modal-body input[name='alamat']").val($(this).data("alamat"));

         });

         });
     </script>


 </body>

 </html>