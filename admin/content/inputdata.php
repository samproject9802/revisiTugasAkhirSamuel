<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Master</h1>
    </div>

    <!-- Content Row -->

    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Input Data Keluarga</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div id="stepwizard">
                        <ul class="nav">
                            <li>
                                <a class="nav-link" href="#step-1">Step 1<br /><small>Data Wilayah</small></a>
                            </li>
                            <li>
                                <a class="nav-link" href="#step-2">Step 2<br /><small>Data Biodata</small></a>
                            </li>
                            <li>
                                <a class="nav-link" href="#step-3">Step 3<br /><small>Data Individu</small></a>
                            </li>
                            <li>
                                <a class="nav-link" href="#step-4">Step 4<br /><small>Data Status</small></a>
                            </li>
                        </ul>

                        <div class="tab-content ">
                            <form action="" class="container" id="inputdata" method="POST">
                                <div id="step-1" class="tab-pane p-2" role="tabpanel">
                                    <?php include_once 'content/stepwizard/inputdatawilayah.php' ?>
                                </div>
                                <div id="step-2" class="tab-pane p-2" role="tabpanel">
                                    <?php include_once 'content/stepwizard/inputdatabiodata.php' ?>
                                </div>
                                <div id="step-3" class="tab-pane p-2" role="tabpanel">
                                    <?php include_once 'content/stepwizard/inputdataindividu.php' ?>
                                </div>
                                <div id="step-4" class="tab-pane p-2" role="tabpanel">
                                    <?php include_once 'content/stepwizard/inputdatastatus.php' ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->