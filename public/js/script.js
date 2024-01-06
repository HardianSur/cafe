$(function () {

    // start Modal User 
    $('.tombolTambahData').on('click', function () {
        $('#formModalLabel').html('Tambah Data User');
        $('.modal-body form').attr('action', 'http://localhost/cafe_phpmvc/public/user/tambah');
        $('.modal-footer button[type=submit]').html('Tambah');
        $('#username').val("");
        $('#nama').val("");
        $('#password').attr("placeholder", "");
        $('#role').val("");
        $('#id').val("");
    });

    $('.tampilModalUbah').on('click', function () {
        $('#formModalLabel').html('Ubah Data User');
        $('.modal-footer button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', 'http://localhost/cafe_phpmvc/public/user/ubah');
        console.log('ok')

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
                $('#id').val(data.id_user);
            }
        });
    });
    //end Modal User


    // start Modal Role 
    $('.tombolTambahDataRole').on('click', function () {
        $('#formModalLabelRole').html('Tambah Data Role');
        $('.modal-body form').attr('action', 'http://localhost/cafe_phpmvc/public/role/tambah');
        $('.modal-footer button[type=submit]').html('Tambah');
        $('#role').val("");
        $('#id_role').val("");
    });

    $('.tampilModalUbahRole').on('click', function () {
        $('#formModalRoleLabel').html('Ubah Data Role');
        $('.modal-footer button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', 'http://localhost/cafe_phpmvc/public/role/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/cafe_phpmvc/public/role/getUbah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#role').val(data.nama_role);
                $('#id_role').val(data.id_role);
            }
        });
    });
    //end Modal Role


    // start Modal Kategori 
    $('.tombolTambahDataKategori').on('click', function () {
        $('#formModalLabelKategori').html('Tambah Data Kategori');
        $('.modal-footer button[type=submit]').html('Tambah');
        $('.modal-body form').attr('action', 'http://localhost/cafe_phpmvc/public/kategori/tambah');
        $('#kategori').val("");
        $('#id_kategori').val("");
    });

    $('.tampilModalUbahKategori').on('click', function () {
        $('#formModalKategoriLabel').html('Ubah Data Kategori');
        $('.modal-footer button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', 'http://localhost/cafe_phpmvc/public/kategori/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/cafe_phpmvc/public/kategori/getUbah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#kategori').val(data.nama_kategori);
                $('#id_kategori').val(data.id_kategori);
            }
        });
    });
    //end Modal Kategori

    // start Modal Pelanggan 
    $('.tombolTambahDataPelanggan').on('click', function () {
        $('#formModalLabelPelanggan').html('Tambah Data Pelanggan');
        $('.modal-body form').attr('action', 'http://localhost/cafe_phpmvc/public/pelanggan/tambah');
        $('.modal-footer button[type=submit]').html('Tambah');
        $('#nama').val("");
        $('#alamat').val("");
        $('#no_telepon').val("");
        $('#jenis_kelamin').val("");
        $('#tempat_lahir').val("");
        $('#tanggal_lahir').val("");
        $('#jenis_pelanggan').val("");
        $('#id').val("");
    });

    $('.tampilModalUbahPelanggan').on('click', function () {
        $('#formModalPelangganLabel').html('Ubah Data Pelanggan');
        $('.modal-footer button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', 'http://localhost/cafe_phpmvc/public/pelanggan/ubah');
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/cafe_phpmvc/public/pelanggan/getUbah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama_pelanggan);
                $('#alamat').val(data.alamat);
                $('#no_telepon').val(data.no_telepon);
                $('#jenis_kelamin').val(data.jenis_kelamin);
                $('#tempat_lahir').val(data.tempat_lahir);
                $('#tanggal_lahir').val(data.tanggal_lahir);
                $('#jenis_pelanggan').val(data.jenis_pelanggan);
                $('#id').val(data.id_pelanggan);
            }
        });
    });
    //end Modal Kategori

    // start Modal Menu 
    $('.tombolTambahDataMenu').on('click', function () {
        $('#formModalLabelMenu').html('Tambah Data Menu');
        $('.modal-body form').attr('action', 'http://localhost/cafe_phpmvc/public/menu/tambah');
        $('.modal-footer button[type=submit]').html('Tambah');        
        $('#nama').val("");
        $('#harga_menu').val("");
        $('#status_menu').val("");
        $('#kategori_menu').val("");
        $('#id').val("");
    });

    $('.tampilModalUbahMenu').on('click', function () {
        $('#formModalMenuLabel').html('Ubah Data Menu');
        $('.modal-footer button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', 'http://localhost/cafe_phpmvc/public/menu/ubah');
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/cafe_phpmvc/public/menu/getUbah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama_menu);
                $('#harga_menu').val(data.harga_menu);
                $('#status_menu').val(data.status_menu);
                $('#kategori_menu').val(data.id_kategori);
                $('#id').val(data.id_menu);
            }
        });
    });
    //end Modal Kategori


});