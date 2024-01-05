<div class="container-fluid">
    <div class="container">
        <div class="row-1">
            <div class="col mt-3">
                <h1>Data Kategori</h1>
            </div>
            <div class="col mt-2">
                <button class="btn btn-primary tombolTambahDataKategori" data-bs-toggle="modal" data-bs-target="#formModalKategori" >Tambah Data Role</button>
            </div>
        </div>

        <div class="row">
            <div class="col mt-3">
                <table id="data-user" class="table table-bordered table-hover table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($data['data_kategori'] as $val) :?>
                            <tr>
                                <td><?= $i ?><?php $i++; ?></td>
                                <td><?= $val['nama_kategori'] ?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-success tampilModalUbahKategori" data-bs-toggle="modal" data-bs-target="#formModalKategori" data-id="<?= $val['id_kategori']?>">
                                        <i class='bx bx-edit'></i>
                                        Edit
                                    </a>
                                    <a href="<?= BASEURL?>/kategori/hapus/<?= $val['id_kategori']?>" class="btn btn-danger" onclick="confirm('Anda Yakin Ingin Menghapus Role Ini ? ')">
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
<div class="modal fade" id="formModalKategori" tabindex="-1" aria-labelledby="formModalKategoriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalKategoriLabel">Tambah Data Role</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/kategori/tambah" method="post">
                    <input type="hidden" name="id" id="id_kategori">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Nama Kategori :</label> 
                        <input type="text" class="form-control" id="kategori" name="kategori" required>
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