<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - e-Learning SMA Negeri 1 Galur
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="<?php echo base_url()?>assets/comp/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url()?>assets/comp/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url()?>assets/themes/default/css/theme.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url()?>assets/comp/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url()?>assets/comp/pace/flash.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url()?>assets/comp/offline/offline-theme-chrome.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url()?>assets/comp/RichFilemanager/styles/dialog.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url()?>assets/comp/ckeditor/plugins/codesnippet/lib/highlight/styles/monokai.css" rel="stylesheet">

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/images/favicon.ico">
</head>

<body>

    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                

                <a class="brand" href="<?php echo base_url()?>index.php">
                    <img src="<?php echo base_url()?>assets/images/logo-medium.png"> <span class="visible-phone brand-txt">e-Learning</span><span class="visible-desktop visible-tablet brand-txt">e-Learning SMA Negeri 1 Galur</span>
                </a>

                <div class="nav-collapse collapse navbar-inverse-collapse">

                </div>
            </div>
        </div><!-- /navbar-inner -->
    </div><!-- /navbar -->

    <div class="wrapper">
        <div class="container">

            <div class="row">

                <div class="module span4 offset4">
                <?php echo $this->session->flashdata('login'); ?>
                    <form action="<?php echo base_url("index.php/login/doLogin") ?>" method="post" accept-charset="utf-8" autocomplete="off" class="form-vertical">
                        <div class="module-head">
                            <h3>Login E-learning</h3>
                        </div>
                        <div class="module-body">
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" name="username" type="text" placeholder="Username (username)" value="" autofocus>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" name="password" type="password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="module-foot">
                            <div class="control-group">
                                <div class="controls clearfix">
                                    <button type="submit" class="btn btn-large btn-primary pull-right">Login</button>
                                    <a href="<?php echo base_url()?>index.php/login/lupa_password">Lupa password?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!--/.wrapper-->

    <div class="footer">
        <div class="container">
            <center>
                <b class="copyright">Copyright &copy; 2014 - 2020 SMA Negeri 1 Galur by Arbi Putra - <a href="http://www.dokumenary.net">dokumenary.net</a> </b> All rights reserved.<br>
                <a href="https://github.com/almazary/new_elearning">versi 2.0</a> | Page loaded in 0.0640 seconds.
            </center>
        </div>
    </div>

    <script type="text/javascript">
        var site_url = "<?php echo base_url()?>index.php";
        var base_url = "<?php echo base_url()?>";
    </script>
    <script src="<?php echo base_url()?>assets/comp/jquery/jquery.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/comp/jquery/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script data-pace-options='{ "ajax": false }' src="<?php echo base_url()?>assets/comp/pace/pace.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/comp/offline/offline.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/comp/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/comp/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/comp/ckeditor/plugins/ckeditor_wiris/integration/WIRISplugins.js?viewer=image" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/comp/timeago/jquery.timeago.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/comp/jquery/app.js" type="text/javascript"></script>

    <script src="<?php echo base_url()?>assets/themes/default/scripts/script.js" type="text/javascript"></script>
</body>