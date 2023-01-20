<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Daftar Nilai Pakar</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="<?= base_url() ?>">Dashboard</a></li>
                        <li class="active">Daftar Nilai Pakar</li>
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
                <div class="card alert" id="a_nilai">
                    <div class="card-header pr">
                        <h4>Tambah Nilai</h4>
                    </div>
                    <form action="<?= base_url('admin/c_pakar/ac_add_nilai'); ?>" method="post">
                        <div class="basic-form" style="margin-top: 20px;">
                            <div class="input-group col-md-12">
                                <label>Nama Penyakit</label>
                                <select class="form-control sel" name="penyakit" style="width: 80%;" required>
                                    <option value="">==Pilih Penyakit==</option>
                                    <?php foreach ($penyakit as $val) : ?>
                                        <option value="<?= $val->id_penyakit ?>"><?= $val->nama_penyakit ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="basic-form mt-2" style="margin-top: 20px;">
                            <div class="input-group col-md-12">
                                <label>Nama Gejala</label>
                                <select class="form-control sel" name="gejala" style="width: 80%;" required>
                                    <option value="">==Pilih Gejala==</option>
                                    <?php foreach ($gejala as $val) : ?>
                                        <option value="<?= $val->id_gejala ?>"><?= $val->nama_gejala ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="basic-form" style="margin-top: 20px;">
                            <div class="form-group">
                                <label>Nilai CF</label>
                                <input type="number" min="0" step="0.1" max="1" value="0.1" name="nilai" class="form-control border-none input-flat bg-ash" placeholder="" required id="e_nm">
                            </div>
                        </div>
                        <button class="btn btn-info btn-lg bg-primary m-t-30" type="submit">Simpan</button>
                    </form>
                </div>
                <div class="card alert" id="e_nilai" style="display: none;">
                    <div class="card-header pr">
                        <h4>Edit nilai</h4>
                    </div>
                    <form action="<?= base_url('admin/c_pakar/ac_update_nilai'); ?>" method="post">
                        <input type="hidden" name="id" required id="e_id">
                        <div class="basic-form" style="margin-top: 20px;">
                            <div class="input-group col-md-12">
                                <label>Nama Penyakit</label>
                                <select class="form-control sel" name="penyakit" style="width: 80%;" required id="e_p">
                                    <option value="">==Pilih Penyakit==</option>
                                    <?php foreach ($penyakit as $val) : ?>
                                        <option value="<?= $val->id_penyakit ?>"><?= $val->nama_penyakit ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="basic-form mt-2" style="margin-top: 20px;">
                            <div class="input-group col-md-12">
                                <label>Nama Gejala</label>
                                <select class="form-control sel" name="gejala" style="width: 80%;" required id="e_g">
                                    <option value="">==Pilih Gejala==</option>
                                    <?php foreach ($gejala as $val) : ?>
                                        <option value="<?= $val->id_gejala ?>"><?= $val->nama_gejala ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="basic-form" style="margin-top: 20px;">
                            <div class="form-group">
                                <label>Nilai CF</label>
                                <input type="number" min="0" step="0.1" max="1" name="nilai" class="form-control border-none input-flat bg-ash" placeholder="" required id="e_n">
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
                        <h4>Daftar nilai </h4>
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
                                        <th style="width: 10%; text-align: center;">No.</th>
                                        <th style="width: 20%;text-align: center;">Gejala</th>
                                        <th style="width: 20%;text-align: center;">Penyakit</th>
                                        <th style="text-align: center;">Nilai</th>
                                        <th style="width: 15%;text-align: center;">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($nilai as $val) : ?>
                                        <tr>
                                            <td><?= $i . "."; ?></td>
                                            <td><?= $val->nama_gejala ?></td>
                                            <td><?= $val->nama_penyakit ?></td>
                                            <td style="text-align: center;"><?= $val->nilai ?></td>
                                            <td style="text-align: center;">
                                                <span onclick="edit('<?= $val->id_detail ?>','<?= $val->id_gejala ?>','<?= $val->id_penyakit ?>','<?= $val->nilai ?>');"><a href="#"><i class="ti-pencil-alt color-success"></i></a></span> |
                                                <span onclick="hapus('<?= $val->id_detail ?>');"><a href="#"><i class="ti-trash color-danger"></i> </a></span>
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
    function edit(id, gejala, penyakit, nilai) {
        $('#e_id').val(id);
        $('#e_g').val(gejala).change();
        $('#e_p').val(penyakit).change();
        $('#e_n').val(nilai);
        $('#a_nilai').hide();
        $('#e_nilai').show();
    }

    function batal() {
        $('#e_nilai').hide();
        $('#a_nilai').show();
    }

    function hapus(id) {
        var x = confirm('Hapus Data Nilai Terpilih?');
        if (x === true) {
            location.href = '<?= base_url('admin/c_pakar/ac_del_nilai/') ?>' + id;
        }
    }
</script>