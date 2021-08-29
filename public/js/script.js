$(function () {
    $(".tombolTambahData").on("click", function () {
        $("#judulModalLabel").html("Tambah Data Mahasiswa");
        $(".modal-footer button[type=submit]").html("Tambah Data");
        $(".modal-body form").attr("action", "https://ihsan.dev/phpmvc/public/mahasiswa/tambah");
        $("#nama").val("");
        $("#nrp").val("");
        $("#email").val("");
        $("#jurusan").val("");
    });
    $('.tampilModalUbah').on("click", function () {
        $("#judulModalLabel").html("Ubah Data Mahasiswa");
        $(".modal-footer button[type=submit]").html("Ubah Data");
        $(".modal-body form").attr("action", "https://ihsan.dev/phpmvc/public/mahasiswa/ubah");
        const id = $(this).data("id");

        $.ajax({
            type: "post",
            url: "https://ihsan.dev/phpmvc/public/mahasiswa/getubah",
            data: {
                id : id
            },
            dataType: "json",
            success: function (response) {
                $("#nama").val(response.nama);
                $("#nrp").val(response.nrp);
                $("#email").val(response.email);
                $("#jurusan").val(response.jurusan);
                $("#id").val(response.id);
            }
        });
    })
})