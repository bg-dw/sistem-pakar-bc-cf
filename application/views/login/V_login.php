<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Adminity : Widget</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="<?= base_url() ?>assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/lib/unix.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-primary">

    <div class="unix-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="<?= base_url() ?>"><span>Foodmin</span></a>
                        </div>
                        <div class="login-form">
                            <h4>Administratior Login</h4>
                            <div class="alert alert-danger alert-dismissable" id="warning" style="display: none;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Warning!</strong> <?= $this->session->flashdata('warning') ?>
                            </div>
                            <form action="<?= base_url('c_login/cek_login') ?>" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="uname" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="upass" class="form-control" placeholder="Password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember Me
                                    </label>

                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url() ?>assets/js/lib/jquery.min.js"></script>
    <?php if ($this->session->flashdata('warning')) : ?>
        <script>
            $(document).ready(function() {
                $("#warning").fadeIn(2000);
                $('#warning').delay(5000).fadeOut();
            });
        </script>
    <?php endif; ?>

</body>

</html>