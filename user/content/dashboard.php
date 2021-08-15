<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->

    <div class="row">
        <!-- Area Chart -->
        <div class="col">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Informasi Penduduk</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body p-3">
                    <h3 class="text-center mb-4"><b>Detail Keluarga</b></h3>
                    <?php
                        require_once '../assets/php/koneksi.php';

                        $sqlSelectWilayah = "SELECT * FROM `table_wilayah`
                                            WHERE nomor_kartukeluarga='$datanomorKK'";
                        $resultSelectWilayah = $conn->query($sqlSelectWilayah);
                        $dataWilayahKeluarga = [];

                        if ($resultSelectWilayah->num_rows > 0) {
                          // output data of each row
                          while($rowSelectWilayah = $resultSelectWilayah->fetch_assoc()) {
                              $dataWilayahKeluarga[] = $rowSelectWilayah;
                          }
                        }
                    ?>
                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">
                    
                    <div class="row mb-4">
                        <div class="col">
                            <div class="row">
                                <label for="staticEmail" class="col-sm-5 col-form-label">Nama Kepala Keluarga</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataWilayahKeluarga[0]['nama_kepalakeluarga']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label for="staticEmail" class="col-sm-5 col-form-label">Alamat</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataWilayahKeluarga[0]['alamat']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label for="staticEmail" class="col-sm-5 col-form-label">RT/RW</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataWilayahKeluarga[0]['nomorrt']."/".$dataWilayahKeluarga[0]['nomorrw']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label for="staticEmail" class="col-sm-5 col-form-label">Desa/Kelurahan</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataWilayahKeluarga[0]['nama_desakelurahan']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Kecamatan</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataWilayahKeluarga[0]['nama_kecamatan']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Kabupaten/Kota</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataWilayahKeluarga[0]['nama_kabupatenkota']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Kode Pos</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataWilayahKeluarga[0]['kode_pos']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Propinsi</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataWilayahKeluarga[0]['nama_provinsi']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        $sqlSelectPenduduk = "SELECT * FROM `table_biodata` as a
                                            JOIN `table_dataindividu` as b
                                            JOIN `table_status` as c
                                            ON a.nomor_ktp = b.nomor_ktp AND a.nomor_ktp = c.nomor_ktp
                                            WHERE a.nomor_kartukeluarga='$datanomorKK' AND a.nomor_ktp='$datanomorktp'";
                        $resultSelectPenduduk = $conn->query($sqlSelectPenduduk);
                        $dataPenduduk = [];

                        if ($resultSelectPenduduk->num_rows > 0) {
                          // output data of each row
                          while($rowSelectPenduduk = $resultSelectPenduduk->fetch_assoc()) {
                            $dataPenduduk[] = $rowSelectPenduduk;
                          }
                        }
                    ?>
                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">

                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <label for="staticEmail" class="col-sm-5 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataPenduduk[0]['nama_lengkap']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label for="staticEmail" class="col-sm-5 col-form-label">NIK</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataPenduduk[0]['nomor_ktp']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label for="staticEmail" class="col-sm-5 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataPenduduk[0]['jenis_kelamin']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label for="staticEmail" class="col-sm-5 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataPenduduk[0]['tempat_lahir']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label for="staticEmail" class="col-sm-5 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataPenduduk[0]['tanggal_lahir']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label for="staticEmail" class="col-sm-5 col-form-label">Agama</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataPenduduk[0]['agama']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label for="staticEmail" class="col-sm-5 col-form-label">Pendidikan</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataPenduduk[0]['pendidikan']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="staticEmail" class="col-sm-6 col-form-label">Jenis Pekerjaan</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataPenduduk[0]['jenis_pekerjaan']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label for="staticEmail" class="col-sm-6 col-form-label">Status Perkawinan</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataPenduduk[0]['status_perkawinan']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label for="staticEmail" class="col-sm-6 col-form-label">Status Hubungan Dalam Keluarga</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataPenduduk[0]['status_hubungan']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label for="staticEmail" class="col-sm-6 col-form-label">Kewarganegaraan</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataPenduduk[0]['kewarganegaraan']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label for="staticEmail" class="col-sm-6 col-form-label">Nama Ayah</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataPenduduk[0]['nama_ayah']; ?>">
                                </div>
                            </div><div class="row">
                                <label for="staticEmail" class="col-sm-6 col-form-label">Nama Ibu</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $dataPenduduk[0]['nama_ibu']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->