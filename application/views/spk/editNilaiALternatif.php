<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-8">
      <form action="" method="post">
        <!-- kode_kriteria, keterangan_kriteria, kategori_kriteria -->
        <div class="form-group row">
          <input type="hidden" name="id" value="<?= $naid['id']; ?>">
          <label for="" class="col-sm-2 col-form-label">Alternatif</label>
          <div class="col-sm-4">
            <select name="alternatif_id" id="alternatif_id" class="form-control">
              <?php foreach ($alternatif as $alt) : ?>
                <?php if ($naid['alternatif_id'] == $alt['id']) : ?>
                  <option value="<?= $alt['id']; ?>" selected><?= $alt['kode_alternatif']; ?> | <?= $alt['keterangan_alternatif']; ?></option>
                <?php else : ?>
                  <option value="<?= $alt['id']; ?>"><?= $alt['kode_alternatif']; ?> | <?= $alt['keterangan_alternatif']; ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Kriteria 1</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="kriteria_1" name="kriteria_1" value="<?= $naid['kriteria_1']; ?>">
            <?= form_error('nilai_bobot', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Kriteria 2</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="kriteria_2" name="kriteria_2" value="<?= $naid['kriteria_2']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Kriteria 3</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="kriteria_3" name="kriteria_3" value="<?= $naid['kriteria_3']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Kriteria 4</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="kriteria_4" name="kriteria_4" value="<?= $naid['kriteria_4']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Kriteria 5</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="kriteria_5" name="kriteria_5" value="<?= $naid['kriteria_5']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Kriteria 6</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="kriteria_6" name="kriteria_6" value="<?= $naid['kriteria_6']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Kriteria 7</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="kriteria_7" name="kriteria_7" value="<?= $naid['kriteria_7']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Kriteria 8</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="kriteria_8" name="kriteria_8" value="<?= $naid['kriteria_8']; ?>">
          </div>
        </div>
        <div class="form-group row justify-content-end">
          <a href="<?= base_url('spk/nilaialternatif') ?>" class="btn btn-danger">Batal</a>
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