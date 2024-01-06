<div class="container-fluid">
    <div class="container">
        <div class="row-1">
            <div class="col mt-3">
                <h1>Data User</h1>
            </div>
            <div class="col mt-2">
                <button class="btn btn-primary tombolTambahDataPelanggan" data-bs-toggle="modal" data-bs-target="#formModalPelanggan" >Tambah Data Pelanggan</button>
            </div>
        </div>

        <div class="row">
            <div class="col mt-3">
                <table id="data-user" class="table table-bordered table-hover table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Jenis kelamin</th>
                            <th>TTL</th>
                            <th>Jenis Pelanggan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data['data_pelanggan'] as $val) :?>
                            <tr>
                                <td><?= $val['id_pelanggan'] ?></td>
                                <td><?= $val['nama_pelanggan'] ?></td>
                                <td><?= $val['alamat'] ?></td>
                                <td><?= $val['no_telepon'] ?></td>
                                <td><?= $val['jenis_kelamin'] ?></td>
                                <td><?= $val['tempat_lahir'] ?>, <?= $val['tanggal_lahir'] ?></td>
                                <td><?= $val['jenis_pelanggan'] ?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-success tampilModalUbahPelanggan" data-bs-toggle="modal" data-bs-target="#formModalPelanggan" data-id="<?= $val['id_pelanggan']?>">
                                        <i class='bx bx-edit'></i>
                                        Edit
                                    </a>
                                    <a href="<?= BASEURL?>/pelanggan/hapus/<?= $val['id_pelanggan']?>" class="btn btn-danger" onclick="confirm('Anda Yakin Ingin Menghapus Pelanggan Ini ? ')">
                                        <i class='bx bx-trash'></i>
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>                            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModalPelanggan" tabindex="-1" aria-labelledby="formModalPelangganLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalPelangganLabel">Tambah Data Pelanggan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/pelanggan/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama :</label> 
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat :</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>

                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">No Telepon :</label>
                        <input type="number" class="form-control" id="no_telepon" name="no_telepon">
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin :</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" aria-label="Default select example">
                            <option selected disabled >Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir :</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir :</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                    </div>

                    <div class="mb-3">
                        <label for="jenis_pelanggan" class="form-label">Jenis Pelanggan :</label>
                        <select class="form-select" aria-label="Default select example" id="jenis_pelanggan" name="jenis_pelanggan" required>
                            <option selected disabled>Pilih Role</option>
                            <option value="Gold">Gold</option>
                            <option value="Silver">Silver</option>
                            <option value="Bronze">Bronze</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    new DataTable('#data-user');
</script>