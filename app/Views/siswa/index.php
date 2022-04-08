<?= $this->extend('layout/index') ?>

<?= $this->section('page-content') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

            <?php if (!empty(session()->getFlashdata('message'))) : ?>

                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('message'); ?>
                </div>

            <?php endif ?>

            <div class="row">
                <div class="col-10">
                    <h1>Tabel Siswa</h1>
                </div>
                <div class="col-2">
                <a href="<?php echo base_url('siswa/add') ?>" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                </div>
            </div>
            <table class="table table-bordered table-hover table-striped table-responsive">
                <thead class="thead-dark">
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Kelas</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($siswa as $key => $siswa) : ?>

                        <tr>
                            <td><?php echo $siswa['nis'] ?></td>
                            <td><?php echo $siswa['nama'] ?></td>
                            <td><?php echo $siswa['gender'] ?></td>
                            <td><?php echo $siswa['ttl'] ?></td>
                            <td><?php echo $siswa['email'] ?></td>
                            <td><?php echo $siswa['alamat'] ?></td>
                            <td><?php echo $siswa['kelas_id'] ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url('siswa/edit.php/' . $siswa['nis']) ?>" class="btn btn-sm btn-primary">EDIT</a>
                                <a href="<?php echo base_url('siswa/delete.php/' . $siswa['nis']) ?>" class="btn btn-sm btn-danger">HAPUS</a>
                            </td>
                        </tr>

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>;