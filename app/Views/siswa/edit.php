<?= $this->extend('layout/index'); ?>

<?= $this->section('page-content'); ?>
<a href="<?= base_url('/siswa') ?>" class="btn btn-lg btn-secondary">Kembali</a>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card border-left-primay shadow h-100 py-2">
            <div class="card-body">
                <div class="h1">Edit Siswa</div>
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
                <form action="<?= base_url('/siswa/update') ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="nis" value="<?= $siswa['nis'] ?>">
                        <label for="">NIS</label>
                        <input type="text" class="form-control" value="<?= $inputs['nis'] == '' ? $siswa['nis'] : $inputs['nis'] ?>" name="nis" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Siswa</label>
                        <input type="text" class="form-control" value="<?= $inputs['nama'] == '' ? $siswa['nama'] : $inputs['nama'] ?>" name="nama">
                    </div>
                    <div class="from-group mt-2">
                        <div class="from-group">
                            <label for="">Jenis Kelamin</label>&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" value="Laki-Laki" <?php echo $row['gender'] == 'Laki-Laki' ? 'checked' : ''; ?>>Laki-Laki
                            <input type="radio" name="gender" value="Perempuan" <?php echo $row['gender'] == 'Perempuan' ? 'checked' : '' ?>>Perempuan
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Tanggal Lahir</label>
                            <input type="text" class="form-control" value="<?= $inputs['ttl'] == '' ? $siswa['ttl'] : $inputs['ttl'] ?>" name="ttl">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="date" class="form-control" value="<?= $inputs['email'] == '' ? $siswa['email'] : $inputs['email'] ?>" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="date" class="form-control" value="<?= $inputs['alamat'] == '' ? $siswa['alamat'] : $inputs['alamat'] ?>" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <input type="date" class="form-control" value="<?= $inputs['kelas_id'] == '' ? $siswa['kelas_id'] : $inputs['email'] ?>" name="kelas_id">
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