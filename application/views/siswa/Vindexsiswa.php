<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/css.php') ?>
</head>

<body>
    <?php $this->load->view('template/topnav.php') ?>

    <!-- /navbar -->
    <div class="wrapper">
        <div class="container h-100">
            <div class="row">
                <?php $this->load->view('template/sidenav.php') ?>
                <!--/.span3-->
                <div class="span9 mobile-12">
                    <div class="content" style="height: 800px;">

                        <div class="btn-controls">
                            <div id="show-urgent-info"></div>

                            <div class="btn-box-row row-fluid">
                                <div class="span12">
                                    <div class="well well-small well-box">
                                        <small class="pull-right hidden-phone hidden-tablet">23 November 2020, IP anda: 202.169.224.59</small>
                                        Selamat datang di <b>e-Learning SMAN 1 GALUR</b>
                                        <br>
                                        <i class="icon icon-map-marker"></i> Alamat: Barahan, Tirta Rahayu, Galur, Kulon Progo Regency, Special Region of Yogyakarta 55661
                                        <i class="icon icon-phone"></i> Telpon: 0851-0010-4022
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
    <?php $this->load->view('template/js.php') ?>

</body>

</html>