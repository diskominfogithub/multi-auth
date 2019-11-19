
function onBuatKolom(){
    const jumlahKolVal = $("#jumlah_kolom").val()
    $("#kolom_container").empty()

    for (let i = 1; i <=jumlahKolVal; i++) {
        $("#kolom_container").append(`
            <div class="form-group form-group-default">
                <label>Nama Kolom ke-${i}</label>
                <input required type="text" class="form-control" name="nama_kolom[]" id="kolom-${i}">
            </div>
        `)
    }  
}