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
                                <h3>MATA PELAJARAN</h3>
                            </div>
                            <div class="module-body">
                                <?php echo $this->session->flashdata('mapel'); ?>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Tambah Mapel
                                    </div>
                                    <div class="panel-body">
                                        <form action="<?php echo base_url('/index.php/admin/mapel/addMapel') ?>" method="post" class="form-horizontal row-fluid">
                                            <div class="control-group">
                                                <label class="control-label">Nama mapel <span class="text-error">*</span></label>
                                                <div class="controls">
                                                    <input type="text" name="id" class="span5" placeholder="ID Mapel" value="">
                                                    <input type="text" name="name" class="span5" placeholder="Nama Mapel" value="">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">ID</th>
                                                <th>Nama MATA PELAJARAN</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php foreach ($mapel as $mapel) : ?>
                                                    <td><b><?php echo $mapel["id_mapel"] ?></b></td>
                                                    <td><a><b><?php echo $mapel["nama_mapel"] ?></b></a></td>

                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn btn-default btn-small edit_modal" href="javascript:void(0);" data-id="<?php echo $mapel["id_mapel"] ?>" data-nama="<?php echo $mapel["nama_mapel"] ?>" title="Edit"><i class="icon-edit"></i></a>
                                                                <a href="<?php echo base_url('index.php/admin/mapel/hapusMapel/' .
                                                                        $mapel["id_mapel"] ) ?>" class="btn btn-danger btn-small" onclick="return confirm('Anda yakin ingin menghapus?')"><i class="icon-trash"></i> </a>

                                                        </div>
                                                    </td>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                                <br>


                            </div>
                        </div>
                    </div>
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit mapel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('index.php/admin/mapel/editmapel') ?>" method="post">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Keterangan:</label>
                            <input id="id_mapel" type="hidden" name="id" value=" "> 
                            <input id="nama_mapel" type="text" name="name" class="span5" placeholder="Nama mapel" value="">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--/.wrapper-->

    <?php $this->load->view('template/footer.php') ?>
    <?php $this->load->view('template/js.php') ?>

    <script>
        $(document).ready(function() {

            $('.edit_modal').on('click', function() {
                //alert($(this).data("id") );
                $('#exampleModal').modal('show');
                $(".modal-body #id_mapel").val($(this).data("id"));
                $(".modal-body #nama_mapel").val($(this).data("nama"));
            });
        });
    </script>

</body>

</html>