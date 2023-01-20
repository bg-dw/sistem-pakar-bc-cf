<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Hello, <span>Welcome Here</span></h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="<?= base_url() ?>">Dashboard</a></li>
                        <li class="active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->
    <section id="main-content">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="stat-widget-eight">
                        <div class="stat-header">
                            <div class="header-title pull-left">Total Penyakit</div>
                            <div class="card-option drop-menu pull-right">
                                <button class="btn btn-xs btn-info" onclick="location.href='<?= base_url('admin/c_penyakit/') ?>';">Detail</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="stat-content">
                            <div class="pull-left">
                                <i class="ti-clipboard color-success"></i>
                                <span class="stat-digit"> <?= count($penyakit) ?> Data</span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="stat-widget-eight">
                        <div class="stat-header">
                            <div class="header-title pull-left">Total Gejala</div>
                            <div class="card-option drop-menu pull-right">
                                <button class="btn btn-xs btn-info" onclick="location.href='<?= base_url('admin/c_gejala/') ?>';">Detail</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="stat-content">
                            <div class="pull-left">
                                <i class="ti-clipboard color-success"></i>
                                <span class="stat-digit"> <?= count($gejala) ?> Data</span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>