<div class="card text-center m-3">
    <div class="card-header d-none">
        <input type="hidden" value="<?= $_GET['id']; ?>" id="id_survey">
    </div>
    <div class="card-body">
        <p class="card-text">Jawab Lah Pertanyaan Kuisoner Berikut Ini Setelah Anda Menakan Tombol Start</p>
        <div id="surveyForms" style="display:inline-block;width:100%;"></div>
        <div id="surveyResult"></div>
        <button id="btnStart" onclick="startSurvey(<?= $_GET['id']; ?>)" class="btn btn-primary">Start</button>
    </div>
</div>