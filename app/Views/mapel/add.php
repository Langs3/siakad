<?= $this->extend('layout/index'); ?>

<?= $this->section('page-content'); ?>
<a href="<?= base_url('/mapel') ?>" class="btn btn-lg btn-secondary">Kembali</a>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card border-left-primay shadow h-100 py-2">
            <div class="card-body">
                <div class="h1">Tambah Mata Pelajaran</div>
                <?php
                $inputs = session()->getFlashdata('inputs');
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger">
                        Ada Kesalahan saat input data, yaitu
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php } ?>
                <form action="<?= base_url('/mapel/save') ?>" method="post">
                    <div class="form-group">
                        <label for="">Nama Mata Pelajaran</label>
                        <input type="text" class="form-control" value="<?= $inputs['namamapel'] ?>" name="namamapel">
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Jam Mata Pelajaran</label>
                        <input type="number" class="form-control" value="<?= $inputs['sks'] ?>" name="sks">
                    </div>
                    <div class="form-group mt-3">
                        <input type="reset" class="btn btn-warning">
                        <input type="submit" class="btn btn-primary" value="Simpan" name="save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('page-content'); ?>