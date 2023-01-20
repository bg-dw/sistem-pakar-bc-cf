<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Hasil Diagnosa</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="<?= base_url() ?>">Dashboard</a></li>
                        <li class="active">Hasil Diagnosa</li>
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
                        <h4>Hasil Diagnosa</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>- Perhitungan</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-info pull-right" onclick="detail_perhitungan();" style="margin-bottom: 30px;">Detail Perhitungan</button>
                                    </div>
                                </div>
                                <div id="detail" style="display: none;">
                                    <?php
                                    $x = 0;
                                    $n = 0;
                                    foreach ($d_penyakit as $key) : //sebanyak penyakit
                                    ?>
                                        <div class="row well well-lg">
                                            <div class="col-md-5">
                                                <h4><?= ($n + 1) . ". " . $key->nama_penyakit; ?></h4>
                                            </div>
                                            <div class="col-md-7">
                                                <?php
                                                $cf_old = 0;
                                                foreach ($nilai as $val) : //sebanyak nilai pada setiap gejala
                                                    if ($key->id_penyakit == $val->id_penyakit) :
                                                        for ($i = 0; $i < count($cf_user); $i++) :
                                                            if ($id_gejala[$i] == $val->id_gejala) :
                                                ?>
                                                                <table width="100%">
                                                                    <tr>
                                                                        <td rowspan="2" style="vertical-align: top;" width="110px;">
                                                                            <h4> Gejala [<?= $val->kode_gejala; ?>] </h4>
                                                                        </td>
                                                                        <td style="width: 105px;">
                                                                            <h4> CF </h4>
                                                                        </td>
                                                                        <td style="text-align: left;">
                                                                            <h4> = <?= $cf_pakar[$x] * $cf_user[$i]; ?></h4>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <h4>CF Combine </h4>
                                                                        </td>
                                                                        <td style="text-align: left;">
                                                                            <h4> = <?= $cf_old . " + " . $cf_pakar[$x] * $cf_user[$i] . " * ( " . (1) . "-" . $cf_old . " ) " . " = " . ($cf_old + (($cf_pakar[$x] * $cf_user[$i]) * (1 - $cf_old))); ?></h4>
                                                                        </td>
                                                                    </tr>
                                                                </table><br>
                                                <?php $cf_old = $cf_old + ($cf_pakar[$x] * $cf_user[$i]) * (1 - $cf_old);
                                                            endif;
                                                        endfor;
                                                        $x++;
                                                    endif;
                                                endforeach;
                                                ?>
                                            </div>
                                            <div class="col-md-12">
                                                <h4>Persentase Penyakit : <?= round($cf_akhir[$n], 1); ?>%</h4>
                                            </div>
                                        </div><br>
                                    <?php $n++;
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered datatables" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No.</th>
                                            <th style="text-align: center;">Gejala Terpilih</th>
                                            <th style="text-align: center;">Tingkat Keyakinan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($nilai as $key) : ?>
                                            <tr>
                                                <td width="15px"><?= $i + 1 ?>.</td>
                                                <td><?= $key->nama_gejala ?></td>
                                                <td style="text-align: center;">
                                                    <?php if ($cf_user[$i] == "0.2") {
                                                        echo "Tidak Tahu";
                                                    } elseif ($cf_user[$i] == "0.4") {
                                                        echo "Sedikit Yakin";
                                                    } elseif ($cf_user[$i] == "0.6") {
                                                        echo "Cukup Yakin";
                                                    } elseif ($cf_user[$i] == "0.8") {
                                                        echo "Yakin";
                                                    } elseif ($cf_user[$i] == "1") {
                                                        echo "Sangat Yakin";
                                                    } else {
                                                        echo "-";
                                                    } ?>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>- Perangkingan</h3><br>
                                <table class="table table-striped table-bordered datatables" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No.</th>
                                            <th style="text-align: center;">Kode</th>
                                            <th style="text-align: center;">Nama Penyakit</th>
                                            <th style="text-align: center;">Persentase Penyakit</th>
                                            <th style="text-align: center;">Rank</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < count($d_penyakit); $i++) : ?>
                                            <tr>
                                                <td width="15px"><?= $i + 1 ?>.</td>
                                                <td style="text-align: center;"><?= $hasil[$i]['kode'] ?></td>
                                                <td><?= $hasil[$i]['penyakit'] ?></td>
                                                <td style="text-align: center;"><?= round($hasil[$i]['nilai'], 1) . " %"; ?></td>
                                                <td style="text-align: center;"><?= $hasil[$i]['rank'] ?></td>
                                            </tr>
                                        <?php
                                        endfor; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>- Tingkat Keyakinan Terhadap Penyakit</h3><br>
                                <table class="table table-striped table-bordered datatables" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Pertanyaan</th>
                                            <th style="text-align: center;">Jawaban</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($terpilih as $key) : ?>
                                            <tr>
                                                <td><?= ($i + 1) ?>. Apakah anda mengalami <?= $key->nama_gejala ?>?</td>
                                                <td style="height: 50px;text-align: center;">
                                                    <select class="form-control" required style="margin-left: 20px;" disabled>
                                                        <option value="" selected><?= $kondisi[$i] ?></option>
                                                    </select>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                                <h3><u> Tingkat keyakinan anda terkena penyakit ( <?= $terpilih[0]->nama_penyakit ?> ) sebesar :<b> <?= $persentase; ?> %</b></u></h3>
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
<script>
    function detail_perhitungan() {
        var x = document.getElementById("detail");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>