<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-12">
      <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
      <a href="<?= base_url('spk/tambahNilaiAlternatif'); ?>" class="btn btn-primary mb-3">Tambah Alternatif</a>
      <div class="table-responsive">
        <table class="table table-hover" id="dataTable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th>Kode Alternatif</th>
              <th>Keterangan Alternatif</th>
              <th>C1</th>
              <th>C2</th>
              <th>C3</th>
              <th>C4</th>
              <th>C5</th>
              <th>C6</th>
              <th>C7</th>
              <th>C8</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($nilaialt as $na) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $na['kode_alternatif']; ?></td>
                <td><?= $na['keterangan_alternatif']; ?></td>
                <td><?= $na['kriteria_1']; ?></td>
                <td><?= $na['kriteria_2']; ?></td>
                <td><?= $na['kriteria_3']; ?></td>
                <td><?= $na['kriteria_4']; ?></td>
                <td><?= $na['kriteria_5']; ?></td>
                <td><?= $na['kriteria_6']; ?></td>
                <td><?= $na['kriteria_7']; ?></td>
                <td><?= $na['kriteria_8']; ?></td>
                <td>
                  <a href="<?= base_url('spk/EditNilaiAlternatif/') . $na['id']; ?>" class="badge badge-success">edit</a>
                  <a href="<?= base_url('spk/hapusNilaiAlternatif/') . $na['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah akan dihapus?')">hapus</a>
                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>