<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Daftar Penyakit</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="<?= base_url() ?>">Dashboard</a></li>
                        <li class="active">Daftar Penyakit</li>
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
                <div class="card alert" id="a_penyakit">
                    <div class="card-header pr">
                        <h4>Tambah Penyakit</h4>
                    </div>
                    <form action="<?= base_url('admin/c_penyakit/ac_add_penyakit'); ?>" method="post">
                        <div class="basic-form m-t-20">
                            <div class="form-group">
                                <label>Kode Penyakit</label>
                                <input type="text" name="kd" class="form-control border-none input-flat bg-ash" placeholder="" required>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="form-group">
                                <label>Nama Penyakit</label>
                                <input type="text" name="nama_penyakit" class="form-control border-none input-flat bg-ash" placeholder="" required>
                            </div>
                        </div>
                        <button class="btn btn-info btn-lg bg-primary m-t-30" type="submit">Simpan</button>
                    </form>
                </div>
                <div class="card alert" id="e_penyakit" style="display: none;">
                    <div class="card-header pr">
                        <h4>Edit Penyakit</h4>
                    </div>
                    <form action="<?= base_url('admin/c_penyakit/ac_update_penyakit'); ?>" method="post">
                        <input type="hidden" name="id" required id="e_id">
                        <div class="basic-form m-t-20">
                            <div class="form-group">
                                <label>Kode Penyakit</label>
                                <input type="text" name="kd" class="form-control border-none input-flat bg-ash" placeholder="" required id="e_kd">
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="form-group">
                                <label>Nama Penyakit</label>
                                <input type="text" name="nama_penyakit" class="form-control border-none input-flat bg-ash" placeholder="" required id="e_nm">
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
                        <h4>Daftar Penyakit </h4>
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
                                        <th style="width: 20%;">Kode penyakit</th>
                                        <th>Nama Penyakit</th>
                                        <th style="width: 15%;">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($penyakit as $val) : ?>
                                        <tr>
                                            <td><?= $i . "."; ?></td>
                                            <td><?= $val->kode_penyakit ?></td>
                                            <td><?= $val->nama_penyakit ?></td>
                                            <td style="text-align: center;">
                                                <span onclick="edit('<?= $val->id_penyakit ?>','<?= $val->kode_penyakit ?>','<?= $val->nama_penyakit ?>');"><a href="#"><i class="ti-pencil-alt color-success"></i></a></span> |
                                                <span onclick="hapus('<?= $val->id_penyakit ?>');"><a href="#"><i class="ti-trash color-danger"></i> </a></span>
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
        $('#a_penyakit').hide();
        $('#e_penyakit').show();
    }

    function batal() {
        $('#e_penyakit').hide();
        $('#a_penyakit').show();
    }

    function hapus(id) {
        var x = confirm('Hapus Data Penyakit Terpilih?');
        if (x === true) {
            location.href = '<?= base_url('admin/c_penyakit/ac_del_penyakit/') ?>' + id;
        }
    }
</script>