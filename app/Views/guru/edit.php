<?= $this->extend('layout/index'); ?>

<?= $this->section('page-content'); ?>
<a href="<?= base_url('/guru') ?>" class="btn btn-lg btn-secondary">Kembali</a>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card border-left-primay shadow h-100 py-2">
            <div class="card-body">
                <div class="h1">Edit Guru</div>
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
                <form action="<?= base_url('/guru/update') ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="npwp" value="<?= $guru['npwp'] ?>">
                        <label for="">NPWP</label>
                        <input type="text" class="form-control" value="<?= $inputs['npwp'] == '' ? $guru['npwp'] : $inputs['npwp'] ?>" name="npwp" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Guru</label>
                        <input type="text" class="form-control" value="<?= $inputs['nama'] == '' ? $guru['nama'] : $inputs['nama'] ?>" name="nama">
                    </div>
                    <div class="from-group mt-2">
                        <div class="from-group">
                            <label for="">Jenis Kelamin</label>&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" value="Laki-Laki" <?php echo $guru['gender'] == 'Laki-Laki' ? 'checked' : ''; ?>>Laki-Laki
                            <input type="radio" name="gender" value="Perempuan" <?php echo $guru['gender'] == 'Perempuan' ? 'checked' : '' ?>>Perempuan
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Tanggal Lahir</label>
                            <input type="text" class="form-control" value="<?= $inputs['ttl'] == '' ? $guru['ttl'] : $inputs['ttl'] ?>" name="ttl">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" value="<?= $inputs['email'] == '' ? $guru['email'] : $inputs['email'] ?>" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" value="<?= $inputs['alamat'] == '' ? $guru['alamat'] : $inputs['alamat'] ?>" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="">Mata Pelajaran</label>
                            <input type="text" class="form-control" value="<?= $inputs['mapel'] == '' ? $guru['mapel'] : $inputs['mapel'] ?>" name="mapel">
                        </div>
                        <div class="form-group mt-3">
                            <input type="reset" class="btn btn-warning">
                            <input type="submit" class="btn btn-primary" value="Update" name="update">
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>