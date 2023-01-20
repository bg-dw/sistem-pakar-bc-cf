<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adminity : Creative Admin Dashboard</title>
    <?php $this->load->view('admin/_layout/_header_link'); ?>
</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <?php $this->load->view('admin/_layout/_nav'); ?>
    </div>
    <!-- /# sidebar -->


    <div class="header">
        <div class="pull-left">
            <div class="logo"><a href="index.html">
                    <!-- <img src="<?= base_url() ?>assets/images/logo.png" alt="" /> --><span>Adminity</span>
                </a></div>
            <div class="hamburger sidebar-toggle">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>
        <div class="pull-right p-r-15">
            <ul>
                <li class="header-icon dib"><a href="#search"><i class="ti-search"></i></a></li>
                <li class="header-icon dib"><img class="avatar-img" src="<?= base_url() ?>assets/images/user.png" alt="" /> <span class="user-avatar"><?= $this->session->userdata('nama'); ?> <i class="ti-angle-down f-s-10"></i></span>
                    <div class="drop-down dropdown-profile">
                        <div class="dropdown-content-heading">
                            <span class="text-left">Sistem Pakar</span>
                            <p class="trial-day">Backward Chaining dan Certainty Factor</p>
                        </div>
                        <div class="dropdown-content-body">
                            <ul>
                                <li><a href="<?= base_url('admin/c_profile/my_profile/' . $this->session->userdata('id')) ?>"><i class="ti-user"></i> <span>Profile</span></a></li>
                                <li><a href="<?= base_url('c_login/logout/') ?>"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="content-wrap">
        <div class="main">
            <?php
            $this->load->view($content);
            ?>
        </div>
    </div>

    <div id="search">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    </div>
    <?php $this->load->view('admin/_layout/_footer_link'); ?>
</body>

</html>