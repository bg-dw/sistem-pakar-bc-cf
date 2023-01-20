<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Profile</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="<?= base_url() ?>">Dashboard</a></li>
                        <li class="active">My Profile</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->
    <section id="main-content">
        <div class="row">
            <div class="col-lg-7">
                <div class="card alert">
                    <div class="card-header">
                        <h4>My Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="user-profile m-t-15">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="user-photo m-b-30">
                                        <img class="img-responsive" src="<?= base_url() ?>assets/images/user.png" alt="" />
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="user-profile-name"><?= $this->session->userdata('nama'); ?></div>
                                    <div class="custom-tab user-profile-tab">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">About</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="1">
                                                <div class="contact-information">
                                                    <div class="phone-content">
                                                        <span class="contact-title">Nama:</span>
                                                        <span class="phone-number"><?= $this->session->userdata('nama'); ?></span>
                                                    </div>
                                                    <div class="website-content">
                                                        <span class="contact-title">ID User:</span>
                                                        <span class="contact-website"><?= $this->session->userdata('id'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card alert">
                    <div class="card-header">
                        <h4>Update Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="default-tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#uname" aria-controls="uname" role="tab" data-toggle="tab">Nama</a></li>
                                <li role="presentation"><a href="#pass" aria-controls="pass" role="tab" data-toggle="tab">Password</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="uname">
                                    <form action="<?= base_url('admin/c_profile/ac_update_uname/' . $this->session->userdata('id')) ?>" method="POST">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= $this->session->userdata('nama') ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="uname" class="form-control" placeholder="Username" value="<?= $this->session->userdata('user') ?>" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="pass">
                                    <form action="<?= base_url('admin/c_profile/ac_update_pwd/' . $this->session->userdata('id')) ?>" method="POST" onsubmit="return cek_form(this);">
                                        <div class="form-group" id="lb_pwd_lm">
                                            <label>Password Lama</label>
                                            <input type="hidden" class="form-control" value="<?= $this->session->userdata('pass') ?>" required id="inf_pwd_lama">
                                            <input type="text" class="form-control" placeholder="Password Lama" onkeyup="get_pwd();" required id="pwd_lama" style="margin-bottom: 2px;">
                                            <span id="sm_lama">
                                            </span>
                                        </div>
                                        <div class="form-group" id="lb_pwd_br">
                                            <label>Password Baru</label>
                                            <input type="text" name="pwd" class="form-control" placeholder="Password Baru" onkeyup="cek_pwd();" required id="pwd_baru" style="margin-bottom: 2px;">
                                            <span id="sm_br">
                                            </span>
                                        </div>
                                        <div class="form-group" id="lb_pwd_conf">
                                            <label>Konfirmasi Password</label>
                                            <input type="text" class="form-control" placeholder="Konfirmasi Password" onkeyup="cek_pwd();" required id="conf" style="margin-bottom: 2px;">
                                            <span id="sm_conf">
                                            </span>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /# column -->
        </div>
        <!-- /# row -->
    </section>
</div>
<script>
    function get_pwd() { //cek password lama
        var x = document.getElementById("inf_pwd_lama");
        var y = document.getElementById("pwd_lama");
        var sm = document.getElementById("lb_pwd_lm");
        var tx = document.getElementById("sm_lama");
        tx.style.display = "none";
        if (y.value != "") {
            if (x.value === y.value) {
                sm.className = "form-group has-success has-feedback";
                tx.className = "badge badge-success";
                tx.style.display = "block";
                tx.innerHTML = "Terkonfirmasi!";
            } else {
                sm.className = "form-group has-error";
                tx.className = "badge badge-danger";
                tx.style.display = "block";
                tx.innerHTML = "Password Lama Tidak Cocok!"
            }
        }
    }

    function cek_pwd() { //cek pwd baru
        var x = document.getElementById("pwd_baru");
        var y = document.getElementById("conf");
        var lb = document.getElementById("lb_pwd_br");
        var lb_conf = document.getElementById("lb_pwd_conf");
        var p_length = document.getElementById("sm_br");
        p_length.style.display = "none";
        var tx = document.getElementById("sm_conf");
        tx.style.display = "none";
        if (x.value != "" && x.value.length >= 5) {
            p_length.style.display = "none";
            if (x.value != "" && y.value != "") {
                if (x.value === y.value) {
                    p_length.style.display = "block";
                    tx.style.display = "block";
                    lb.className = "form-group has-success has-feedback";
                    lb_conf.className = "form-group has-success has-feedback";
                    p_length.className = "badge badge-success";
                    p_length.innerHTML = "Terkonfirmasi!";
                    tx.className = "badge badge-success";
                    tx.innerHTML = "Terkonfirmasi!";
                } else {
                    lb.className = "form-group has-error";
                    lb_conf.className = "form-group has-error";
                    tx.className = "badge badge-danger";
                    tx.style.display = "block";
                    tx.innerHTML = "Password Tidak Sama!";
                }
            }
        } else {
            p_length.className = "badge badge-danger";
            p_length.style.display = "block";
            p_length.innerHTML = "Password Minimal 5 Karakter!";
        }
    }

    function cek_form(form) { //cek pwd baru
        var x = document.getElementById("inf_pwd_lama");
        var y = document.getElementById("pwd_lama");

        var a = document.getElementById("pwd_baru");
        var b = document.getElementById("conf");
        if (x.value === y.value) {
            if (a.value === b.value) {
                if (a.value.length >= 5) {
                    return confirm('Simpan Perubahan Password?');
                } else {
                    alert("Password Baru Kurang Dari 5 Karakter!");
                    return false;
                }
            } else {
                alert("Password Baru Tidak Cocok!");
                return false;
            }
        } else {
            alert("Password Lama Tidak Cocok!");
            return false;
        }
    }
</script>