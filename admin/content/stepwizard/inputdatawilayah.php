<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">No. KK</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="nomorkk" required>
</div>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nama Kepala Keluarga</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="namakepalakeluarga" required>
</div>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Alamat</label>
    <textarea class="form-control" id="exampleInputPassword1" name="alamat" required></textarea>
</div>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Provinsi</label>
    <select class="form-control" aria-label="Default select example" name="provinsi" id="provinsi" required>
        <option value="" disabled selected>Pilih Provinsi...</option>
    </select>
</div>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Kabupaten/Kota</label>
    <select class="form-control" aria-label="Default select example" name="kota" id="kota" required>
        <option value="" disabled selected>Pilih Kabupaten/Kota...</option>
    </select>
</div>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Kecamatan</label>
    <select class="form-control" aria-label="Default select example" name="kecamatan" id="kecamatan" required>
        <option value="" disabled selected>Pilih Kecamatan...</option>
    </select>
</div>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Desa/Kelurahan</label>
    <select class="form-control" aria-label="Default select example" name="kelurahan" id="kelurahan" required>
        <option value="" disabled selected>Pilih Desa/Kelurahan...</option>
    </select>
</div>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">RT/RW (Gunakan "/" sebagai pemisah)</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="rtrw" required>
</div>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Kode Pos</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="kodepos" required>
</div>
<div class="mb-3">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary" id="keepInput">Lanjutkan >></button>
    </div>
</div>
<div class="d-none" id="containerHitungAnggota">
    <div class="row g-3 mt-3 mb-3">
        <div class="col-auto">
            <label for="jumlahanggotaterdaftar" class="visually-hidden">Jumlah Anggota Keluarga (termasuk kepala keluarga)</label>
            <input type="text" readonly class="form-control-plaintext" id="jumlahanggotaterdaftar" value="Jumlah Anggota Keluarga">
        </div>
        <div class="col-auto">
            <label for="jumlahanggotaterdaftar2" class="visually-hidden">Masukkan Jumlah Anggota Keluarga</label>
            <input type="text" class="form-control" id="jumlahanggotaterdaftar2" placeholder="Masukkan Jumlah Anggota Keluarga">
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-primary mb-3" id="btnProsesSmart" onclick="HitungKeluarga();">Process</button>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-3" id="buttonShowDataInput">
    </div>
</div>