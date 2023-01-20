<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Daftar Gejala</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="<?= base_url() ?>">Dashboard</a></li>
                        <li class="active">Daftar Gejala</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->
    <section id="main-content">
        <div class="row">
            <div class="col-md-3">
                <div class="card alert" id="a_gejala">
                    <div class="card-header pr">
                        <h4>Tambah Gejala</h4>
                    </div>
                    <form action="<?= base_url('admin/c_gejala/ac_add_gejala'); ?>" method="post">
                        <div class="basic-form m-t-20">
                            <div class="form-group">
                                <label>Kode Gejala</label>
                                <input type="text" name="kd" class="form-control border-none input-flat bg-ash" placeholder="" required>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="form-group">
                                <label>Nama Gejala</label>
                                <input type="text" name="nama_gejala" class="form-control border-none input-flat bg-ash" placeholder="" required>
                            </div>
                        </div>
                        <button class="btn btn-info btn-lg bg-primary m-t-30" type="submit">Simpan</button>
                    </form>
                </div>
                <div class="card alert" id="e_gejala" style="display: none;">
                    <div class="card-header pr">
                        <h4>Edit Gejala</h4>
                    </div>
                    <form action="<?= base_url('admin/c_gejala/ac_update_gejala'); ?>" method="post">
                        <input type="hidden" name="id" required id="e_id">
                        <div class="basic-form m-t-20">
                            <div class="form-group">
                                <label>Kode Gejala</label>
                                <input type="text" name="kd" class="form-control border-none input-flat bg-ash" placeholder="" required id="e_kd">
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="form-group">
                                <label>Nama Gejala</label>
                                <input type="text" name="nama_gejala" class="form-control border-none input-flat bg-ash" placeholder="" required id="e_nm">
                            </div>
                        </div>
                        <button class="btn btn-default btn-lg bg-default m-t-30" onclick="batal();" type="button">Batal</button>
                        <button class="btn btn-info btn-lg bg-primary m-t-30" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card alert">
                    <div class="card-header">
                        <h4>Daftar Gejala </h4>
                        <div class="card-header-right-icon">
                            <ul>
                                <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                                <li class="doc-link"><a href="#"><i class="ti-link"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="bootstrap-data-table-panel">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered datatables">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">No.</th>
                                        <th style="width: 20%;">Kode Gejala</th>
                                        <th>Nama Gejala</th>
                                        <th style="width: 15%;">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($gejala as $val) : ?>
                                        <tr>
                                            <td><?= $i . "."; ?></td>
                                            <td><?= $val->kode_gejala ?></td>
                                            <td><?= $val->nama_gejala ?></td>
                                            <td style="text-align: center;">
                                                <span onclick="edit('<?= $val->id_gejala ?>','<?= $val->kode_gejala ?>','<?= $val->nama_gejala ?>');"><a href="#"><i class="ti-pencil-alt color-success"></i></a></span> |
                                                <span onclick="hapus('<?= $val->id_gejala ?>');"><a href="#"><i class="ti-trash color-danger"></i> </a></span>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    endforeach; ?>
                                </tbody>
                            </table>
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
    function edit(id, kode, nama) {
        $('#e_id').val(id);
        $('#e_kd').val(kode);
        $('#e_nm').val(nama);
        $('#a_gejala').hide();
        $('#e_gejala').show();
    }

    function batal() {
        $('#e_gejala').hide();
        $('#a_gejala').show();
    }

    function hapus(id) {
        var x = confirm('Hapus Data Gejala Terpilih?');
        if (x === true) {
            location.href = '<?= base_url('admin/c_gejala/ac_del_gejala/') ?>' + id;
        }
    }
</script>