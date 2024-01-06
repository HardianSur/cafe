<style>
    .foto {
        width: 80px;
        object-fit: contain;
    }
</style>

<div class="container-fluid">
    <div class="container">
        <div class="row-1">
            <div class="col mt-3">
                <h1>Data User</h1>
            </div>
            <div class="col mt-2">
                <button class="btn btn-primary tombolTambahDataMenu" data-bs-toggle="modal" data-bs-target="#formModalMenu">Tambah Data Menu</button>
            </div>
        </div>

        <div class="row">
            <div class="col mt-3">
                <table id="data-user" class="table table-bordered table-hover table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Menu</th>
                            <th>Foto</th>
                            <th>Nama Menu</th>
                            <th>Harga Menu</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data['data_menu'] as $val) : ?>
                            <tr>
                                <td><?= $val['id_menu'] ?></td>
                                
                                <?php if (isset($val['foto_menu'])) : ?>
                                    <td><img src="<?= BASEURL ?>/assets/<?= $val['foto_menu'] ?>" alt="" class="image-fluid foto"></td>
                                <?php else : ?>
                                    <td> - </td>
                                <?php endif; ?>

                                <td><?= $val['nama_menu'] ?></td>
                                <td><?= $val['harga_menu'] ?></td>
                                <td><?= $val['nama_kategori'] ?></td>
                                <td><?= $val['status_menu'] ?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-success tampilModalUbahMenu" data-bs-toggle="modal" data-bs-target="#formModalMenu" data-id="<?= $val['id_menu'] ?>">
                                        <i class='bx bx-edit'></i>
                                        Edit
                                    </a>
                                    <a href="<?= BASEURL ?>/menu/hapus/<?= $val['id_menu'] ?>" class="btn btn-danger" onclick="confirm('Anda Yakin Ingin Menghapus Menu Ini ? ')">
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
<div class="modal fade" id="formModalMenu" tabindex="-1" aria-labelledby="formModalMenuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalMenuLabel">Tambah Data Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/menu/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama :</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>

                    <label for="harga_menu" class="form-label">Harga</label><br>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" aria-label="Dollar amount" name="harga_menu" id="harga_menu">
                    </div>

                    <div class="mb-3">
                        <label for="status_menu" class="form-label">Status</label><br>
                        <select class="form-select" required name="status_menu" id="status_menu">
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="kategori_menu" class="form-label">Kategori Menu :</label>
                        <select name="kategori_menu" id="kategori_menu" class="form-select" aria-label="Default select example">
                            <option selected disabled>Pilih Kategori</option>
                            <?php
                            foreach ($data['data_kategori'] as $val) : ?>
                                <option value="<?= $val['id_kategori'] ?>"><?= $val['nama_kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="foto_menu" class="form-label">Foto Menu</label><br>
                        <div class="input-group">
                            <input type="file" class="form-control" id="foto_menu" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="foto_menu">
                        </div>
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