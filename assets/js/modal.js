$(function () {
    $('.tombolTambahData').on('click', function () {
        $('#judulModal').html('Tambah Data Fasilitas Pendidikan');
        $('.modal-footer button[type=submit]').html('Tambah');
        $('.modal-body form').attr('action', 'http://localhost/eduponmaps/bangunan/tambah');
        $('#id').val('');
        $('#nama').val('');
        $('#long').val('');
        $('#lat').val('');
        $('#npsn').val('');
        $('#kategori_id').val('');
        $('#alamat').val('');
        $('#kecamatan_id').val('');
        $('#status').val('');
        $('#jumlah_guru').val('');
        $('#jumlah_siswa').val('');
    });


    $('.tampilModalUbah').on('click', function () {
        $('#judulModal').html('Edit Data Fasilitas Pendidikan');
        $('.modal-footer button[type=submit]').html('Edit Data');
        // $('#gambarBangunan').append(`<input type="hidden" name="old_image" value="<?php echo $product->image ?>" /><div class="invalid-feedback">`);

        const id = $(this).data('id');
        $('.modal-body form').attr('action', 'http://localhost/eduponmaps/bangunan/ubah/' + id);
        baseurl = "http://localhost/eduponmaps/upload/bangunan/"
        // jquery ajax, request data tanpa mereload seluruh halamannya 
        $.ajax({
            url: 'http://localhost/eduponmaps/bangunan/getubah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#old_image').remove();
                $('#id').val(data.bangunan_id);
                $('#nama').val(data.bangunan_nama);
                $('#long').val(data.bangunan_long);
                $('#npsn').val(data.npsn);
                $('#lat').val(data.bangunan_lat);
                $('#kategori_id').val(data.bangunan_kategori_id);
                $('#alamat').val(data.bangunan_alamat);
                $('#kecamatan_id').val(data.kecamatan_id);
                $('#gambarBangunan').append(`<input type="hidden" id="old_image" name="old_image" value="` + data.bangunan_gambar + `"/>`);
                $('#status').val(data.status);
                $('#jumlah_guru').val(data.jumlah_guru);
                $('#jumlah_siswa').val(data.jumlah_siswa);

            }
        });
    });


});