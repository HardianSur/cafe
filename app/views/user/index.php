<div class="container-fluid">
    <div class="container">
        <div class="row-1">
            <div class="col mt-3">
                <h1>Data User</h1>
            </div>
            <div class="col mt-2">
                <button class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal" >Tambah Data User</button>
            </div>
        </div>

        <div class="row">
            <div class="col mt-3">
                <table id="data-user" class="table table-bordered table-hover table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($data['data_user'] as $val) :?>
                            <tr>
                                <td><?= $i ?><?php $i++; ?></td>
                                <td><?= $val['nama_user'] ?></td>
                                <td><?= $val['username'] ?></td>
                                <td><?= $val['nama_role'] ?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-success tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $val['id_user']?>">
                                        <i class='bx bx-edit'></i>
                                        Edit
                                    </a>
                                    <a href="<?= BASEURL?>/user/hapus/<?= $val['id_user']?>" class="btn btn-danger" onclick="confirm('Anda Yakin Ingin Menghapus User Ini ? ')">
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
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalLabel">Tambah Data User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/user/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama :</label> 
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username :</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password :</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role :</label>
                        <select class="form-select" aria-label="Default select example" id="role" name="role" required>
                            <option selected disabled>Pilih Role</option>
                            <?php foreach($data['data_role'] as $val) :?>
                            <option value="<?= $val['id_role']?>"><?= $val['nama_role']?></option>
                            <?php endforeach; ?>
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