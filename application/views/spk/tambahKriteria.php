<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-8">
      <?= form_open_multipart('spk/tambahKriteria'); ?>
      <!-- kode_kriteria, keterangan_kriteria, kategori_kriteria -->
      <div class="form-group row">
        <label for="kode_kriteria" class="col-sm-2 col-form-label">Kode Kriteria</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria">
          <?= form_error('kode_kriteria', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>
      <div class="form-group row">
        <label for="keterangan_kriteria" class="col-sm-2 col-form-label">Keterangan Kriteria</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="keterangan_kriteria" name="keterangan_kriteria">
        </div>
      </div>
      <div class="form-group row">
        <label for="kategori_kriteria" class="col-sm-2 col-form-label">Kategori Kriteria</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="kategori_kriteria" name="kategori_kriteria">
        </div>
      </div>
      <div class="form-group row justify-content-end">
        <a href="<?= base_url('spk/kriteria') ?>" class="btn btn-danger">Batal</a>
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