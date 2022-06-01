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
                    <h1>Tabel Guru</h1>
                </div>
                <div class="col-2">
                <a href="<?php echo base_url('guru/add') ?>" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                </div>
            </div>
            <table class="table table-bordered table-hover table-striped table-responsive">
                <thead class="thead-dark">
                    <tr>
                        <th>NPWP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Mata Pelajaran</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($guru as $key => $guru) : ?>

                        <tr>
                            <td><?php echo $guru['npwp'] ?></td>
                            <td><?php echo $guru['nama'] ?></td>
                            <td><?php echo $guru['gender'] ?></td>
                            <td><?php echo $guru['ttl'] ?></td>
                            <td><?php echo $guru['email'] ?></td>
                            <td><?php echo $guru['alamat'] ?></td>
                            <td><?php echo $guru['mapel'] ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url('guru/edit/' . $guru['npwp']) ?>" class="btn btn-primary">EDIT</a>
                                <a href="<?= base_url('/guru/delete/' . $guru['npwp'])?>" class="btn btn-danger" onclick="return confirm('Yakin akan dihapus')">Hapus</a>
                            </td>
                        </tr>

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>;