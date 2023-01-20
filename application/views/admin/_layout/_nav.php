<div class="nano">
    <div class="nano-content">
        <ul>
            <li class="label">Main</li>
            <li class="<?php if ($this->uri->segment(2) == "home") {
                            echo 'active';
                        } ?>">
                <a href="<?= base_url('admin/home/') ?>"><i class="ti-home"></i> Dashboard</span></a>
            </li>
            <li class="label">Data</li>
            <li class="<?php if ($this->uri->segment(2) == "c_gejala") {
                            echo 'active';
                        } ?>">
                <a href="<?= base_url('admin/c_gejala/') ?>"><i class="ti-pulse"></i> Gejala</a>
            </li>
            <li class="<?php if ($this->uri->segment(2) == "c_penyakit") {
                            echo 'active';
                        } ?>">
                <a href="<?= base_url('admin/c_penyakit/') ?>"><i class="ti-wheelchair"></i> Penyakit</a>
            </li>
            <li class="<?php if ($this->uri->segment(2) == "c_pakar") {
                            echo 'active';
                        } ?>">
                <a href="<?= base_url('admin/c_pakar/') ?>"><i class="ti-view-list-alt"></i> Nilai Pakar</a>
            </li>
            <li class="label">Sistem Pakar</li>
            <li class="<?php if ($this->uri->segment(2) == "c_perhitungan") {
                            echo 'active';
                        } ?>">
                <a href="<?= base_url('admin/c_perhitungan/') ?>"><i class="ti-desktop"></i> Diagnosa</a>
            </li>
            <li>
                <a href="<?= base_url('c_login/logout/') ?>"><i class="ti-close"></i> Logout</a>
            </li>
        </ul>
    </div>
</div>