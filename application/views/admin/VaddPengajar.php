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
                    <div class="content" style="height: 800px;"  >

                        <div class="module">
                            <div class="module-head">
                                <h3>Tambah Pengajar</h3>
                            </div>
                            <div class="module-body">
                                <form action="doAddPengajar" method="post" accept-charset="utf-8" class="form-horizontal row-fluid" enctype="multipart/form-data">
                                    <div class="control-group">
                                        <label class="control-label">NIP</label>
                                        <div class="controls">
                                            <input type="text" id="nip" name="nip" class="span4" value="">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Nama <span class="text-error">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="nama" class="span8" value="">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Jenis Kelamin <span class="text-error">*</span></label>
                                        <div class="controls">
                                            <label class="radio inline"><input type="radio" name="jenis_kelamin" value="L"> Laki-laki</label>
                                            <label class="radio inline"><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Tempat Lahir</label>
                                        <div class="controls">
                                            <input type="text" name="tempat_lahir" class="span5" value="">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Tanggal Lahir</label>
                                        <div class="controls">
                                            <select class="span2" style="width: 10%;" name="tgl_lahir">
                                                <option value="">Tgl</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                            <select class="span2" style="width: 17%;" name="bln_lahir">
                                                <option value="">Bulan</option>
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                            <input type="text" name="thn_lahir" class="span2" maxlength="4" value="" placeholder="Tahun">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Alamat</label>
                                        <div class="controls">
                                            <input type="text" name="alamat" class="span10" value="">
                                            <br>
                                        </div>
                                    </div>
           
                                    <div class="control-group">
                                        <label class="control-label">Username <span class="text-error">*</span></label>
                                        <div class="controls">
                                            <input type="text" id="username" name="username" class="span5" value="" placeholder="example@example.sch.id">

                                            <label class="checkbox inline"><input type="checkbox" name="default_username" id="default_username" onclick="username_default_pengajar()" value="1"> Gunakan default username</label>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Password <span class="text-error">*</span></label>
                                        <div class="controls">
                                            <input type="password" name="password" class="span5" value="">
                                            <br>
                                        </div>
                                    </div> 

                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <a href="pengajar" class="btn">Batal</a>
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