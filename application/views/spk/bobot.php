<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-6">
      <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
      <a href="<?= base_url('spk/tambahBobot'); ?>" class="btn btn-primary mb-3">Tambah Bobot</a>
      <table class="table table-hover" id="dataTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kode Kriteria</th>
            <th scope="col">Keterangan Kriteria</th>
            <th scope="col">Nilai Bobot</th>
            <th>Keterangan Bobot</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($bobotkriteria as $bk) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $bk['kode_kriteria'] ?></td>
              <td><?= $bk['keterangan_kriteria'] ?></td>
              <td><?= $bk['nilai_bobot'] ?></td>
              <td><?= $bk['keterangan_bobot']; ?></td>
              <td>
                <a href="<?= base_url('spk/editBobot/') . $bk['id']; ?>" class="badge badge-success">edit</a>
                <a href="<?= base_url('spk/hapusBobot/') . $bk['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah akan dihapus?')">delete</a>
              </td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->