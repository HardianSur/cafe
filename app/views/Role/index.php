<div class="container-fluid">
    <div class="container">
        <div class="row-1">
            <div class="col mt-3">
                <h1>Data User</h1>
            </div>
            <div class="col mt-2">
                <button class="btn btn-primary tombolTambahDataRole" data-bs-toggle="modal" data-bs-target="#formModalRole" >Tambah Data Role</button>
            </div>
        </div>

        <div class="row">
            <div class="col mt-3">
                <table id="data-user" class="table table-bordered table-hover table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Role</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($data['data_role'] as $val) :?>
                            <tr>
                                <td><?= $i ?><?php $i++; ?></td>
                                <td><?= $val['nama_role'] ?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-success tampilModalUbahRole" data-bs-toggle="modal" data-bs-target="#formModalRole" data-id="<?= $val['id_role']?>">
                                        <i class='bx bx-edit'></i>
                                        Edit
                                    </a>
                                    <a href="<?= BASEURL?>/role/hapus/<?= $val['id_role']?>" class="btn btn-danger" onclick="confirm('Anda Yakin Ingin Menghapus Role Ini ? ')">
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
<div class="modal fade" id="formModalRole" tabindex="-1" aria-labelledby="formModalRoleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalRoleLabel">Tambah Data Role</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/role/tambah" method="post">
                    <input type="hidden" name="id" id="id_role">
                    <div class="mb-3">
                        <label for="role" class="form-label">Nama Role :</label> 
                        <input type="text" class="form-control" id="role" name="role" required>
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