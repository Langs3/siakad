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
                    <h1>Tabel Mata Pelajaran</h1>
                </div>
                <div class="col-2">
                <a href="<?php echo base_url('mapel/add') ?>" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                </div>
            </div>
            <table class="table table-bordered table-hover table-striped table-responsive" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>Jumlah Jam Pelajaran</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mapel as $key => $mapel) : ?>

                        <tr>
                            <td><?php echo $mapel['id'] ?></td>
                            <td><?php echo $mapel['namamapel'] ?></td>
                            <td><?php echo $mapel['sks'] ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url('mapel/edit/' . $mapel['id']) ?>" class="btn btn-primary">EDIT</a>
                                <a href="<?= base_url('mapel/delete/' . $mapel['id'])?>" class="btn btn-danger" onclick="return confirm('Yakin akan dihapus')">Hapus</a>
                            </td>
                        </tr>

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>;