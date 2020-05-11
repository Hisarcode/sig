$(function () {


    $('.tombolTambahData').on('click', function () {

        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama').val('');
        $('#nim').val('');
        $('#email').val('');
        $('#jurusan').val();
        $('#id').val('Teknik Informatika');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/tambah');




    });

    $('.tampilModalUbah').on('click', function () {

        $('#judulModal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');

        const id = $(this).data('id');

        // jquery ajax, request data tanpa mereload seluruh halamannya 
        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }

        });


    });

});