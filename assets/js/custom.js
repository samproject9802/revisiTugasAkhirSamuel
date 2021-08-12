function clear() {
  $('#kota').empty();
  $('#kota').append($("<option>").attr({
    disabled: true,
    selected: true
  }).html("Kota"));

  $('#kecamatan').empty();
  $('#kecamatan').append($("<option>").attr({
    disabled: true,
    selected: true
  }).html("Kecamatan"));

  $('#kelurahan').empty();
  $('#kelurahan').append($("<option>").attr({
    disabled: true,
    selected: true
  }).html("Kelurahan"));
}

$(function () {
  var api = 'https://dev.farizdotid.com/api/daerahindonesia/provinsi';
  $.getJSON(api, function (data) {
    $(data.provinsi).each(function (i, provinsi) {
      $value = provinsi.id
      $('#provinsi').append($("<option>").attr("value", provinsi.nama + '-' + provinsi.id).html(provinsi.nama));
    });
  });
});

$("#provinsi").change(function () {
  clear();
  var idS = this.value.split("-");
  var api = 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' + idS[1];
  $.getJSON(api, function (data) {
    $(data.kota_kabupaten).each(function (i, kota) {
      $('#kota').append($("<option>").attr("value", kota.nama + '-' + kota.id).html(kota.nama));
    });
  });
});

$("#kota").change(function () {
  $('#kecamatan').empty();
  $('#kecamatan').append($("<option>").attr({
    disabled: true,
    selected: true
  }).html("Kecamatan"));

  $('#kelurahan').empty();
  $('#kelurahan').append($("<option>").attr({
    disabled: true,
    selected: true
  }).html("Kelurahan"));
  var id = this.value.split('-');
  var api = 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' + id[1];
  $.getJSON(api, function (data) {
    $(data.kecamatan).each(function (i, kecamatan) {
      $('#kecamatan').append($("<option>").attr("value", kecamatan.nama + '-' + kecamatan.id).html(kecamatan.nama));
    });
  });
});

$("#kecamatan").change(function () {
  $('#kelurahan').empty();
  $('#kelurahan').append($("<option>").attr({
    disabled: true,
    selected: true
  }).html("Kelurahan"));
  var id = this.value.split('-');
  var api = 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=' + id[1];
  $.getJSON(api, function (data) {
    $(data.kelurahan).each(function (i, kelurahan) {
      $('#kelurahan').append($("<option>").attr("value", kelurahan.nama + '-' + kelurahan.id).html(kelurahan.nama));
    });
  });
});

$(function () {
  $('#btnTambahBagian').click(function () {
    var namaBagian = $('#exampleInputEmail1').val();
    var api = "php/inputbagian.php?namabagian=" + namaBagian;
    $.getJSON(api, function (data) {

    });
  });
});

$(function () {
  $('#btnTambahPertanyaan').click(function () {
    var namaBagian = $('#namabagian').val();
    var pertanyaan = $('#pertanyaan').val();
    var indikator = $('#indikator').val();
    var tipepilihan = $('#tipepilihan').val();
    var api = "php/inputpertanyaan.php?namabagian=" + namaBagian + "&pertanyaan=" + pertanyaan + "&indikator=" + indikator + "&tipepilihan=" + tipepilihan;
    $.getJSON(api, function (data) {

    });
  });
});

$(function () {
  $('#btnTambahSubPertanyaan').click(function () {
    var namaBagian = $('#namabagian2').val();
    var subpertanyaan = $('#subpertanyaan').val();
    var indikator = $('#indikator2').val();
    var tipepilihan = $('#tipepilihan2').val();
    var api = "php/inputkuisioner.php?namabagian=" + namaBagian + "&subpertanyaan=" + subpertanyaan + "&indikator=" + indikator + "&tipepilihan=" + tipepilihan;
    $.getJSON(api, function (data) {

    });
  });
});

$(document).ready(function () {

  if ($.session.get("dataBiodata")) {
    let dataSessionWilayah = $.session.get("dataBiodata");

    if (dataSessionWilayah) {
      let dataBiodataArr = JSON.parse(dataSessionWilayah);

      dataBiodataArr.map((element) => {

        let specifiedData = element.name;

        if (specifiedData == "provinsi" || specifiedData == "kota" || specifiedData == "kecamatan" || specifiedData == "kelurahan") {
          let dataArr = element.value.split("-");

          let optionWidget = `
            <option selected disabled>${dataArr[0]}</option>
            <option>-------------------------</option>
            `;

          $(`select[name=${specifiedData}]`).html(optionWidget);
        } else {
          $(`input[name=${specifiedData}]`).val(element.value);
          if (specifiedData == "alamat") {
            $(`textarea[name=${specifiedData}]`).val(element.value);
          }
        }

        $(`input[name=${specifiedData}]`).attr("readonly", true);
        $(`textarea[name=${specifiedData}]`).attr("readonly", true);
        $(`select[name=${specifiedData}]`).attr("disabled", true);
      })
      $("#keepInput").attr("disabled", true);

      $("#containerHitungAnggota").removeClass("d-none");
    }
  }

  let jumlahDataTerisi = 0;

  if ($.session.get("dataJumlahAnggotaKeluarga")) {
    let angkaJumlah = $.session.get("dataJumlahAnggotaKeluarga");
    $('#jumlahanggotaterdaftar2').val($.session.get("dataJumlahAnggotaKeluarga"));
    $('#jumlahanggotaterdaftar2').attr('disabled', true);
    $('#btnProsesSmart').attr('disabled', true);
    HitungKeluarga();

    let nomorKKSaya = $.session.get("nomorKK");

    for (let index = 1; index <= angkaJumlah; index++) {
      if ($.session.get(`dataAnggota${index}`)) {
        $(`#buttonShowModalInput${nomorKKSaya}-${index}`).attr('disabled', true);
        jumlahDataTerisi += 1;
      }
    }

    if (jumlahDataTerisi == angkaJumlah) {
      $.session.clear();
      if ($.session.clear()) {
        window.location.reload();
      }
    }
  }

  $('input[name=nomorkk]').keydown(function (e) {
    var max = 16;
    var len = $(this).val().length;
    if (len >= max) {
      if (e.keyCode != 46 && e.keyCode != 8) return false;
    }
    else {
    } return true;
  });

})

$('#inputDataForm').on('submit', (e) => {
  e.preventDefault();

  Swal.fire({
    title: 'Apakah anda ingin menyimpan data ini ?',
    showDenyButton: true,
    confirmButtonText: `Simpan`,
    denyButtonText: `Batal`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    let dataArr = $('#inputDataForm').serializeArray();
    if (result.isConfirmed) {
      $.ajax({
        method: 'POST',
        url: 'php/savebiodata.php',
        data: {
          dataSerialize: JSON.stringify(dataArr)
        },
        success: (response) => {
          if (response == "New record created successfully") {
            $.session.set("dataBiodata", JSON.stringify(dataArr));
            $.session.set("nomorKK", $('input[name=nomorkk]').val());
            if ($.session.get("dataBiodata")) {
              window.location.reload();
            }
          }
        }
      });
    } else if (result.isDenied) {
      Swal.fire('Perubahan tidak tersimpan', '', 'info')
    }
  })
})

const HitungKeluarga = () => {
  let jumlahButton = $('#jumlahanggotaterdaftar2').val();

  $.session.set("dataJumlahAnggotaKeluarga", jumlahButton);

  $('#jumlahanggotaterdaftar2').attr('disabled', true);
  $('#btnProsesSmart').attr('disabled', true);

  let nomorKK = $('input[name=nomorkk]').val();
  let divButton = "";
  let modals = "";

  if (jumlahButton) {
    for (let x = 1; x <= jumlahButton; x++) {

      divButton += `
      <div class="col">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" id="buttonShowModalInput${nomorKK}-${x}" data-bs-target="#staticBackdrop${x}" onclick="refreshData(${x});">Anggota Keluarga ${x}</button>
      </div>
      `;

      modals += `
      <div class="modal fade" id="staticBackdrop${x}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel${x}">Data Anggota Keluarga Ke - ${x}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div id="stepwizard${x}">
                <ul class="nav">
                  <li>
                    <a class="nav-link" href="#step-1${x}">Step 1<br /><small>Data Biodata</small></a>
                  </li>
                  <li>
                    <a class="nav-link" href="#step-2${x}">Step 2<br /><small>Data Individu</small></a>
                  </li>
                  <li>
                    <a class="nav-link" href="#step-3${x}">Step 3<br /><small>Data Status</small></a>
                  </li>
                </ul>

                <div class="tab-content">
                  <form action="" class="container" id="inputdata${x}" method="POST">
                    <div id="step-1${x}" class="tab-pane p-2" role="tabpanel">
                      <div class="mb-3">
                        <label for="nomornik${x}" class="form-label">No. KK</label>
                        <input type="text" readonly class="form-control" id="nomorkk${x}" name="nomorbiokk">
                      </div>
                      <div class="mb-3">
                        <label for="nomornik${x}" class="form-label">No. NIK</label>
                        <input type="text" class="form-control" id="nomornik${x}" name="nomornik">
                      </div>
                      <div class="mb-3">
                          <label for="namalengkap${x}" class="form-label">Nama Lengkap</label>
                          <input type="text" class="form-control" id="namalengkap${x}" name="namalengkap">
                      </div>
                      <div class="mb-3">
                          <label for="jeniskelamin${x}" class="form-label">Jenis Kelamin</label>
                          <select class="form-control" aria-label="Default select example" name="jeniskelamin" id="jeniskelamin${x}">
                              <option value="" disabled selected>Pilih Jenis Kelamin...</option>
                              <option value="Laki - Laki">Laki - Laki</option>
                              <option value="Perempuan">Perempuan</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="tempatlahir${x}" class="form-label">Tempat Lahir</label>
                          <input type="text" class="form-control" id="tempatlahir${x}" name="tempatlahir">
                      </div>
                      <div class="mb-3">
                          <label for="tanggallahir${x}" class="form-label">Tanggal Lahir</label>
                          <input type="text" class="form-control" id="pickerData${x}" name="tanggallahir">
                      </div>
                    </div>
                    <div id="step-2${x}" class="tab-pane p-2" role="tabpanel">
                      <div class="mb-3">
                          <label for="agama${x}" class="form-label">Agama</label>
                          <select class="form-control" aria-label="Default select example" name="agama" id="agama${x}">
                              <option value="" disabled selected>Pilih Agama...</option>
                              <option value="Islam">Islam</option>
                              <option value="Katolik">Katolik</option>
                              <option value="Protestan">Protestan</option>
                              <option value="Hindu">Hindu</option>
                              <option value="Budha">Budha</option>
                              <option value="Konghuchu">Konghuchu</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="pendidikan${x}" class="form-label">Pendidikan</label>
                          <select class="form-control" aria-label="Default select example" name="pendidikan" id="pendidikan${x}">
                              <option value="" disabled selected>Pilih Pendidikan...</option>
                              <option value="SD">SD</option>
                              <option value="SMP">SMP</option>
                              <option value="SMA">SMA</option>
                              <option value="D3">D3</option>
                              <option value="D4">D4</option>
                              <option value="S1">S1</option>
                              <option value="S2">S2</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="jenispekerjaan${x}" class="form-label">Jenis Pekerjaan</label>
                          <select class="form-control" aria-label="Default select example" name="jenispekerjaan" id="jenispekerjaan${x}">
                              <option value="" disabled selected>Pilih Jenis Pekerjaan...</option>
                              <option value="Pelajar">Pelajar</option>
                              <option value="Mahasiswa">Mahasiswa</option>
                              <option value="Karyawan Swasta">Karyawan Swasta</option>
                              <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="statusperkawinan${x}" class="form-label">Status Perkawinan</label>
                          <select class="form-control" aria-label="Default select example" name="statusperkawinan" id="statusperkawinan${x}">
                              <option value="" disabled selected>Pilih Status Perkawinan...</option>
                              <option value="KAWIN">KAWIN</option>
                              <option value="BELUM KAWIN">BELUM KAWIN</option>
                          </select>
                      </div>
                    </div>
                    <div id="step-3${x}" class="tab-pane p-2" role="tabpanel">
                      <div class="mb-3">
                          <label for="statushub${x}" class="form-label">Status Hubungan Keluarga</label>
                          <input type="text" class="form-control" id="statushub${x}" name="statushub">
                      </div>
                      <div class="mb-3">
                          <label for="kewarganegaraan${x}" class="form-label">Kewarganegaraan</label>
                          <input type="text" class="form-control" id="kewarganegaraan${x}" name="kewarganegaraan">
                      </div>
                      <div class="mb-3">
                          <label for="namaayah${x}" class="form-label">Nama Ayah</label>
                          <input type="text" class="form-control" id="namaayah${x}" name="namaayah">
                      </div>
                      <div class="mb-3">
                          <label for="namaibu${x}" class="form-label">Nama Ibu</label>
                          <input type="text" class="form-control" id="namaibu${x}" name="namaibu">
                      </div>
                    </div>
                  </form>
                </div>
              </div >
            </div>
          </div>
        </div>
      </div>
      `;

    }

    $('#buttonShowDataInput').html(divButton);
    $('#modalCollectionInputData').html(modals);
    $('input[name=tanggallahir]').datepicker({
      format: 'yyyy-mm-dd'
    });
  }

}

const DetailFunction = (html) => {
  let idKK = html.dataset.id;

  $('#showDetailAnggotaModal').modal('show');

  $.ajax({
    method: 'POST',
    url: 'php/datafunction.php',
    data: {
      task: 'SelectDataPenduduk',
      nomorIDKK: idKK
    },
    success: function (response) {
      let nomor = 1;
      let tableWidgetSatu = '';
      let tableWidgetDua = '';

      let dataKeluargaArr = JSON.parse(response);
      if (response) {
        dataKeluargaArr.map((element) => {
          let bornBirth = element.tanggal_lahir.split("-");

          tableWidgetSatu += `
          <tr>
            <td>${nomor}</td>
            <td>${element.nama_lengkap}</td>
            <td>${element.nomor_ktp}</td>
            <td>${element.jenis_kelamin}</td>
            <td>${element.tempat_lahir}</td>
            <td>${bornBirth[2] + "-" + bornBirth[1] + "-" + bornBirth[0]}</td>
            <td>${element.agama}</td>
            <td>${element.pendidikan}</td>
            <td>${element.jenis_pekerjaan}</td>
          </tr>
        `;

          tableWidgetDua += `
          <tr>
            <td>${nomor}</td>
            <td>${element.status_perkawinan}</td>
            <td>${element.status_hubungan}</td>
            <td>${element.kewarganegaraan}</td>
            <td>${element.nama_ayah}</td>
            <td>${element.nama_ibu}</td>
          </tr>
        `;

          nomor++;
        })

        $('#kategoriDataKeluargaSatu').html(tableWidgetSatu);
        $('#kategoriDataKeluargaDua').html(tableWidgetDua);
      }
    }
  });

}

// const UpdateFunction = (html) => {
//   let idKTP = html.dataset.id;
//   alert("Fungsi Update dengan ID : " + idKTP);
// }

const DeleteFunction = (html) => {
  let idKTP = html.dataset.id;

  $.ajax({
    method: 'POST',
    url: 'php/datafunction.php',
    data: {
      task: 'DeleteDataAnggotaPenduduk',
      nomorIDKK: idKTP
    },
    success: function (response) {
      if (response == "Sukses") {
        $.ajax({
          method: 'POST',
          url: 'php/datafunction.php',
          data: {
            task: 'DeleteDataWilayah',
            nomorIDKK: idKTP
          },
          success: function (response) {
            if (response == "Sukses") {
              window.location.reload();
            }
          }
        })
      }
    }
  })
}

const refreshData = (idStepWizard) => {
  if (idStepWizard) {
    $('input[name=nomorbiokk]').val($('input[name=nomorkk]').val());

    var btnFinish = $('<button></button>').text('Save')
      .addClass('btn sw-btn-group-extra d-none')
      .attr('value', 'submit')
      .on('click', function () {
        onFinishCallback(idStepWizard)
      });

    var btnCancel = $('<button></button>').text('Cancel')
      .addClass('btn btn-danger')
      .on('click', function () {
        $(`#stepwizard${idStepWizard}`).smartWizard("reset");
        $('.sw-btn-group-extra').addClass('d-none');
      });

    var btnStart = $('<button></button>').text('Start')
      .addClass('btn btn-danger').attr('id', `btnStartSmartWizard${idStepWizard}`)
      .on('click', function () {
        $(`#stepwizard${idStepWizard}`).smartWizard("reset");
        $(`#btnStartSmartWizard${idStepWizard}`).addClass('d-none');
      });


    var wizard = $(`#stepwizard${idStepWizard}`).smartWizard(
      {
        anchorSettings: {
          anchorClickable: false, // Enable/Disable anchor navigation
          enableAllAnchors: false, // Activates all anchors clickable all times
          markDoneStep: true, // Add done state on navigation
          markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
          removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
          enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
        },
        theme: 'arrows',
        transitionEffect: 'fade',
        transitionSpeed: '400',
        toolbarSettings: {
          toolbarPosition: 'bottom',
          toolbarButtonPosition: 'right',
          showNextButton: true,
          showPreviousButton: true,
          toolbarExtraButtons: [
            btnFinish,
            btnCancel,
            btnStart
          ]
        }
      },
    );
  }

  $(wizard).on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {
    if (stepDirection == "2") //here is the final step: Note: 0,1,2
    {
      $('.sw-btn-group-extra').removeClass('d-none');
    } else {
      $('.sw-btn-group-extra').addClass('d-none');
    }
  });

}