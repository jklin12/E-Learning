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
                                <h3>Data Pengajar</h3>
                            </div>
                            <div class="module-body">


                                <div class="row-fluid">
                                    <div class="span7">
                                        <a href="Pengajar/addPengajar" class="btn btn-primary">Tambah Pengajar</a>
                                    </div>


                                </div>
                                <br>

                                <form action="http://elearning.dokumenary.net/2.0/index.php/pengajar/index/1" method="post" accept-charset="utf-8">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="7%">
                                                    ID
                                                </th>
                                                <th>Informasi Pengajar</th>
                                                <th width="22%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($pengajar as $pengajar) : ?>
                                                <tr>
                                                    <td>
                                                        <b>74</b>
                                                    </td>
                                                    <td>
                                                        <img style="height:40px;width:40px; margin-right: 10px;" class="img-polaroid img-circle pull-left" src="http://elearning.dokumenary.net/2.0/userfiles/images/default_pl.png">
                                                        <b><?php echo $pengajar["nama"] ?></b>

                                                        <br><b>Alamat : <?php echo $pengajar["alamat"] ?></b>
                                                    </td>
                                                    <td>
                                                        <ul class="nav nav-pills" style="margin-bottom:0px;">
                                                            <li><a class="btn btn-default btn-small" href="<?php echo base_url('index.php/admin/pengajar/detail/' . $pengajar["nip"])  ?>"><i class="icon-zoom-in"></i> Detail</a></li>
                                                            <li><a class="btn btn-danger btn-small btnDelete" href="javascript:;" data-id="<?php echo $pengajar["nip"] ?>" data-name="<?php echo $pengajar["nama"] ?>"><i class="icon-trash"></i> Hapus</a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>


                                </form>

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
                    <p>Hapus pengajar <span id="deleteName"></span> ?</p>
                </div>
                <div class="modal-footer">
                    <a id="doDelete" class="btn btn-danger">Hapus</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    <!--/.wrapper-->
    <?php $this->load->view('template/footer.php') ?>
    <?php $this->load->view('template/js.php') ?>

    <script>
        $(document).ready(function() {
            $('.btnDelete').on('click', function() {
                $('#modalDelete').modal('show');
                $('#deleteName').html($(this).data("name"));
                $('#doDelete').attr('href', '<?php echo base_url('index.php/admin/pengajar/doDelete/') ?>' + $(this).data("id"));
            });
        });
    </script>
</body>

</html>