<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-8">
      <form action="" method="post">
        <!-- kode_kriteria, keterangan_kriteria, kategori_kriteria -->
        <div class="form-group row">
          <label for="kode_alternatif" class="col-sm-2 col-form-label">Kode ALternatif</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="kode_alternatif" name="kode_alternatif">
            <?= form_error('kode_kriteria', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Keterangan Alternatif</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="keterangan_alternatif" name="keterangan_alternatif">
          </div>
        </div>
        <div class="form-group row justify-content-end">
          <a href="<?= base_url('spk/alternatif') ?>" class="btn btn-danger">Batal</a>
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->