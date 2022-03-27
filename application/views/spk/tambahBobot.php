<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-8">
      <form action="" method="post">
        <!-- kode_kriteria, keterangan_kriteria, kategori_kriteria -->
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Kode Kriteria</label>
          <div class="col-sm-4">
            <select name="kriteria_id" id="kriteria_id" class="form-control">
              <option value="">Pilih Kriteria</option>
              <?php foreach ($kriteria as $kr) : ?>
                <option value="<?= $kr['id']; ?>"><?= $kr['kode_kriteria']; ?> | <?= $kr['keterangan_kriteria']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Nilai Bobot</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="nilai_bobot" name="nilai_bobot">
            <?= form_error('nilai_bobot', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Keterangan Bobot</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="keterangan_bobot" name="keterangan_bobot">
          </div>
        </div>
        <div class="form-group row justify-content-end">
          <a href="<?= base_url('spk/bobot') ?>" class="btn btn-danger">Batal</a>
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