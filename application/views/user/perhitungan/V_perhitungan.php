<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Diagnosa</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="<?= base_url() ?>">Dashboard</a></li>
                        <li class="active">Diagnosa</li>
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
                        <h4>Gejala </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="<?= base_url('c_perhitungan/hasil_perhitungan/') ?>" method="post">
                                <div class="col-md-12">
                                    <div class="input-group col-md-12">
                                        <table class="table table-striped" width="100%" style="margin-top: 20px;">
                                            <?php $i = 0;
                                            foreach ($gejala as $val) : ?>
                                                <input type="hidden" name="gejala[]" value="<?= $val->id_gejala ?>" readonly required>
                                                <tr>
                                                    <th style="width: 5%;text-align: center;"><?= ($i + 1) . "."; ?></th>
                                                    <th><?= $val->nama_gejala ?></th>
                                                    <th style="width: 20%;">
                                                        <select name="cf_user[]" class="form-control">
                                                            <option value="">Tingkat Keyakinan</option>
                                                            <option value="0">-Tidak</option>
                                                            <option value="0.2">-Tidak Tahu</option>
                                                            <option value="0.4">-Sedikit Yakin</option>
                                                            <option value="0.6">-Cukup Yakin</option>
                                                            <option value="0.8">-Yakin</option>
                                                            <option value="1">-Sangat Yakin</option>
                                                        </select>
                                                    </th>
                                                </tr>
                                            <?php $i++;
                                            endforeach; ?>
                                        </table><br>
                                        <button class="btn btn-primary pull-right" type="submit">Proses</button>
                                    </div>
                                </div>
                            </form>
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