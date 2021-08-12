function onFinishCallback(id) {
  let dataJson = $(`#inputdata${id}`).serialize();

  $.ajax({
    method: 'POST',
    url: 'php/savedata.php',
    data: dataJson,
    cache: false,
    success: (response) => {
      if (response == "Sukses Data Diproses") {
        $.session.set(`dataAnggota${id}`, dataJson);
        $.session.set("nomorKK", $('input[name=nomorkk]').val());
        if ($.session.get(`dataAnggota${id}`)) {
          window.location.reload();
        }
      }
    }
  });
}