$(function () {

    $('.tombolTambahData').on('click', function () {
        $('#formModalLabel').html('Tambah Data User');
        $('.modal-footer button[type=submit]').html('Tambah');
    });

    $('.tampilModalUbah').on('click', function () {
        $('#formModalLabel').html('Ubah Data User');
        $('.modal-footer button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', 'http://localhost/cafe_phpmvc/public/user/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/cafe_phpmvc/public/user/getUbah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#username').val(data.username);
                $('#nama').val(data.nama_user);
                $('#password').attr("placeholder", "Kosongkan Jika Tidak Ingin diubah");
                $('#role').val(data.id_role);
                $('#id').val(data.id);
                console.log('ok');
            }
        });

    });
});