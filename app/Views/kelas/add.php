<?= $this->extend('layout/index'); ?>

<?= $this->section('page-content'); ?>

<a href="<?= base_url('/kelas') ?>" class="btn btn-lg btn-secondary">Kembali</a>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card border-left-primay shadow h-100 py-2">
            <div class="card-body">
                <div class="h1">Tambah Kelas</div>
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
                <form action="<?= base_url('/kelas/save') ?>" method="post">
                    <div class="form-group">
                        <label for="">Nama Kelas</label>
                        <input type="text" class="form-control" value="<?= $inputs['namakelas'] ?>" name="namakelas">
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Kapasitas Kelas</label>
                        <input type="number" class="form-control" value="<?= $inputs['kapasitas'] ?>" name="kapasitas">
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Kelas Terisi</label>
                        <input type="number" class="form-control" value="<?= $inputs['terisi'] ?>" name="terisi">
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