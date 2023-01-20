<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Diagnosa Lanjutan</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="<?= base_url() ?>">Dashboard</a></li>
                        <li class="active">Diagnosa Lanjutan</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->
    <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card alert">
                    <div class="card-header">
                        <h4>Gejala Lanjutan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="<?= base_url('c_perhitungan/hasil_perhitungan/') ?>" method="post">
                                    <input type="hidden" name="id_penyakit" value="<?= $id_penyakit ?>" required>
                                    <?php for ($i = 0; $i < count($id); $i++) : ?>
                                        <input type="hidden" name="gejala[]" value="<?= $id[$i] ?>">
                                        <input type="hidden" name="cf_user[]" value="<?= $cf_u[$i] ?>">
                                    <?php endfor; ?>
                                    <table>
                                        <?php $i = 1;
                                        foreach ($terpilih as $key) : ?>
                                            <tr>
                                                <td><?= $i ?>. Apakah anda mengalami <?= $key->nama_gejala ?>?</td>
                                                <td style="height: 50px;">
                                                    <select name="kondisi[]" class="form-control" required style="margin-left: 20px;">
                                                        <option value="">--Kondisi--</option>
                                                        <option value="YA">YA</option>
                                                        <option value="TIDAK">TIDAK</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        endforeach; ?>
                                    </table>
                                    <button type="submit" class="btn btn-primary pull-right">Cek Hasil</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
        </div>
        <!-- /# row -->
    </section>
</div>