<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Kriteria</div>
              <?php foreach ($countkriteria as $row) : ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row->id; ?></div>
              <?php endforeach; ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Bobot</div>
              <?php foreach ($countbobot as $row) : ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row->id; ?></div>
              <?php endforeach; ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Jumlah Nilai Bobot</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <?php foreach ($countBobot as $row) : ?>
                    <?php $sumBobot = $row->bobot ?>
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $row->bobot; ?></div>
                  <?php endforeach; ?>
                </div>
                <div class="col">
                  <div class="">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">
      <h3><a href="<?= base_url('spk/kriteria'); ?>">Kriteria</a></h3>
      <table class="table table-hover table-bordered table" id="dataTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kode Kriteria</th>
            <th scope="col">Keterangan Kriteria</th>
            <th scope="col">Kategori Kriteria</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($kriteria as $k) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $k['kode_kriteria'] ?></td>
              <td><?= $k['keterangan_kriteria'] ?></td>
              <td><?= $k['kategori_kriteria'] ?></td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="col-lg-4">
      <h3><a href="<?= base_url('spk/bobot'); ?>">Bobot</a></h3>
      <table class="table table-hover table-bordered" id="dataTable1">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kode Kriteria</th>
            <th scope="col">Keterangan Kriteria</th>
            <th scope="col">Nilai Bobot</th>
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
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="col-lg-4">
      <h3><a href="">Normalisasi</a></h3>
      <table class="table table-hover table-bordered" id="dataTable5">
        <thead>
          <tr>
            <th>#</th>
            <th>Kode Kriteria</th>
            <th>Keterangan Kriteria</th>
            <th>Normalisasi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($bobotkriteria as $bk) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $bk['kode_kriteria'] ?></td>
              <td><?= $bk['keterangan_kriteria'] ?></td>

              <!-- menghitung normalisasi = nilai bobot masing masing kriteria dibagi total bobot -->
              <?php foreach ($countBobot as $row) ?>
              <?php $sumbobot = $row->bobot; ?>
              <?php $normalisasi = $bk['nilai_bobot'] / $sumBobot; ?>
              <td><?= $normalisasi; ?></td>

            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <br>
  <hr>
  <div class="row">
    <div class="col-lg-5">
      <h3><a href="<?= base_url('spk/alternatif'); ?>">Alternatif</a></h3>
      <table class="table table-hover table-bordered" id="dataTable3">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kode</th>
            <th scope="col">Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($alternatif as $k) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $k['kode_alternatif'] ?></td>
              <td><?= $k['keterangan_alternatif'] ?></td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="col-lg-7">
      <h3> <a href="<?= base_url('spk/nilaiALternatif'); ?>">Nilai Alternatif</a></h3>
      <div class="table-responsive">
        <table class="table table-hover table-bordered" id="dataTable4">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th>Kode</th>
              <th>Keterangan Alternatif</th>
              <th>C1</th>
              <th>C2</th>
              <th>C3</th>
              <th>C4</th>
              <th>C5</th>
              <th>C6</th>
              <th>C7</th>
              <th>C8</th>
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
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>
  <hr>
  <br>

  <!-- ambil nilai bobot masing-masing kriteria -->
  <?php foreach ($nb1 as $row) ?>
  <?php $nb1 = $row->nilai_bobot ?>
  <?php foreach ($nb2 as $row) ?>
  <?php $nb2 = $row->nilai_bobot; ?>
  <?php foreach ($nb3 as $row) ?>
  <?php $nb3 = $row->nilai_bobot; ?>
  <?php foreach ($nb4 as $row) ?>
  <?php $nb4 = $row->nilai_bobot; ?>
  <?php foreach ($nb5 as $row) ?>
  <?php $nb5 = $row->nilai_bobot; ?>
  <?php foreach ($nb6 as $row) ?>
  <?php $nb6 = $row->nilai_bobot; ?>
  <?php foreach ($nb7 as $row) ?>
  <?php $nb7 = $row->nilai_bobot; ?>
  <?php foreach ($nb8 as $row) ?>
  <?php $nb8 = $row->nilai_bobot; ?>
  <!-- hitung total normalisasi = hasilnya 25-->
  <?php foreach ($countBobot as $row) ?>
  <?php $tb = $row->bobot ?>

  <!-- hitung normalisasi = nilai bobot per kriteria dibagi total bobot -->
  <?php $nr1 = $nb1 / $tb; ?>
  <?php $nr2 = $nb2 / $tb; ?>
  <?php $nr3 = $nb3 / $tb; ?>
  <?php $nr4 = $nb4 / $tb; ?>
  <?php $nr5 = $nb5 / $tb; ?>
  <?php $nr6 = $nb6 / $tb; ?>
  <?php $nr7 = $nb7 / $tb; ?>
  <?php $nr8 = $nb8 / $tb; ?>


  <!-- ##start draft perhitungan vektor S -->
  <!-- alternatif 1 dengan kriteria 1 sampai 8 -->
  <?php foreach ($ca1 as $row) ?>
  <?php $a1kt1 = $row->kriteria_1; ?>
  <?php $a1kt2 = $row->kriteria_2; ?>
  <?php $a1kt3 = $row->kriteria_3; ?>
  <?php $a1kt4 = $row->kriteria_4; ?>
  <?php $a1kt5 = $row->kriteria_5; ?>
  <?php $a1kt6 = $row->kriteria_6; ?>
  <?php $a1kt7 = $row->kriteria_7; ?>
  <?php $a1kt8 = $row->kriteria_8; ?>
  <!-- vektor s alternatif 1 -->
  <?php $vs1 = (pow($a1kt1, $nr1) * pow($a1kt2, $nr2) * pow($a1kt3, $nr3) * pow($a1kt4, $nr4) * pow($a1kt5, $nr5) * pow($a1kt6, $nr6) * pow($a1kt7, $nr7) * pow($a1kt8, $nr8)) ?>
  <!-- <?= $vs1; ?> -->

  <!-- alternatif 2 kriteria 1 sampai 8 -->
  <?php foreach ($ca2 as $row) ?>
  <?php $a2kt1 = $row->kriteria_1 ?>
  <?php $a2kt2 = $row->kriteria_2 ?>
  <?php $a2kt3 = $row->kriteria_3 ?>
  <?php $a2kt4 = $row->kriteria_4 ?>
  <?php $a2kt5 = $row->kriteria_5 ?>
  <?php $a2kt6 = $row->kriteria_6 ?>
  <?php $a2kt7 = $row->kriteria_7 ?>
  <?php $a2kt8 = $row->kriteria_8 ?>
  <?php $vs2 = pow($a2kt1, $nr1) * pow($a2kt2, $nr2) * pow($a2kt3, $nr3) * pow($a2kt4, $nr4) * pow($a2kt5, $nr5) * pow($a2kt6, $nr6) * pow($a2kt7, $nr7) * pow($a2kt8, $nr8) ?>
  <!-- <?= $vs2; ?> -->

  <!-- alternatif 3 kriteria 1 sampai 8 -->
  <?php foreach ($ca3 as $row) ?>
  <?php $a3kt1 = $row->kriteria_1 ?>
  <?php $a3kt2 = $row->kriteria_2 ?>
  <?php $a3kt3 = $row->kriteria_3 ?>
  <?php $a3kt4 = $row->kriteria_4 ?>
  <?php $a3kt5 = $row->kriteria_5 ?>
  <?php $a3kt6 = $row->kriteria_6 ?>
  <?php $a3kt7 = $row->kriteria_7 ?>
  <?php $a3kt8 = $row->kriteria_8 ?>
  <?php $vs3 = pow($a3kt1, $nr1) * pow($a3kt2, $nr2) * pow($a3kt3, $nr3) * pow($a3kt4, $nr4) * pow($a3kt5, $nr5) * pow($a3kt6, $nr6) * pow($a3kt7, $nr7) * pow($a3kt8, $nr8) ?>
  <!-- <?= $vs3; ?> -->

  <!-- alternatif 4 kriteria 1 sampai 8 -->
  <?php foreach ($ca4 as $row) ?>
  <?php $a4kt1 = $row->kriteria_1 ?>
  <?php $a4kt2 = $row->kriteria_2 ?>
  <?php $a4kt3 = $row->kriteria_3 ?>
  <?php $a4kt4 = $row->kriteria_4 ?>
  <?php $a4kt5 = $row->kriteria_5 ?>
  <?php $a4kt6 = $row->kriteria_6 ?>
  <?php $a4kt7 = $row->kriteria_7 ?>
  <?php $a4kt8 = $row->kriteria_8 ?>
  <?php $vs4 = pow($a4kt1, $nr1) * pow($a4kt2, $nr2) * pow($a4kt3, $nr3) * pow($a4kt4, $nr4) * pow($a4kt5, $nr5) * pow($a4kt6, $nr6) * pow($a4kt7, $nr7) * pow($a4kt8, $nr8) ?>
  <!-- <?= $vs4; ?> -->

  <!-- alternatif 5 kriteria 1 sampai 8 -->
  <?php foreach ($ca5 as $row) ?>
  <?php $a5kt1 = $row->kriteria_1 ?>
  <?php $a5kt2 = $row->kriteria_2 ?>
  <?php $a5kt3 = $row->kriteria_3 ?>
  <?php $a5kt4 = $row->kriteria_4 ?>
  <?php $a5kt5 = $row->kriteria_5 ?>
  <?php $a5kt6 = $row->kriteria_6 ?>
  <?php $a5kt7 = $row->kriteria_7 ?>
  <?php $a5kt8 = $row->kriteria_8 ?>
  <?php $vs5 = pow($a5kt1, $nr1) * pow($a5kt2, $nr2) * pow($a5kt3, $nr3) * pow($a5kt4, $nr4) * pow($a5kt5, $nr5) * pow($a5kt6, $nr6) * pow($a5kt7, $nr7) * pow($a5kt8, $nr8) ?>
  <!-- <?= $vs5; ?> -->

  <!-- alternatif 6 kriteria 1 sampai 8 -->
  <?php foreach ($ca6 as $row) ?>
  <?php $a6kt1 = $row->kriteria_1 ?>
  <?php $a6kt2 = $row->kriteria_2 ?>
  <?php $a6kt3 = $row->kriteria_3 ?>
  <?php $a6kt4 = $row->kriteria_4 ?>
  <?php $a6kt5 = $row->kriteria_5 ?>
  <?php $a6kt6 = $row->kriteria_6 ?>
  <?php $a6kt7 = $row->kriteria_7 ?>
  <?php $a6kt8 = $row->kriteria_8 ?>
  <?php $vs6 = pow($a6kt1, $nr1) * pow($a6kt2, $nr2) * pow($a6kt3, $nr3) * pow($a6kt4, $nr4) * pow($a6kt5, $nr5) * pow($a6kt6, $nr6) * pow($a6kt7, $nr7) * pow($a6kt8, $nr8) ?>
  <!-- <?= $vs6; ?> -->

  <!-- alternatif 7 kriteria 1 sampai 8 -->
  <?php foreach ($ca7 as $row) ?>
  <?php $a7kt1 = $row->kriteria_1 ?>
  <?php $a7kt2 = $row->kriteria_2 ?>
  <?php $a7kt3 = $row->kriteria_3 ?>
  <?php $a7kt4 = $row->kriteria_4 ?>
  <?php $a7kt5 = $row->kriteria_5 ?>
  <?php $a7kt6 = $row->kriteria_6 ?>
  <?php $a7kt7 = $row->kriteria_7 ?>
  <?php $a7kt8 = $row->kriteria_8 ?>
  <?php $vs7 = pow($a7kt1, $nr1) * pow($a7kt2, $nr2) * pow($a7kt3, $nr3) * pow($a7kt4, $nr4) * pow($a7kt5, $nr5) * pow($a7kt6, $nr6) * pow($a7kt7, $nr7) * pow($a7kt8, $nr8) ?>
  <!-- <?= $vs7; ?> -->

  <!-- alternatif 8 kriteria 1 sampai 8 -->
  <?php foreach ($ca8 as $row) ?>
  <?php $a8kt1 = $row->kriteria_1 ?>
  <?php $a8kt2 = $row->kriteria_2 ?>
  <?php $a8kt3 = $row->kriteria_3 ?>
  <?php $a8kt4 = $row->kriteria_4 ?>
  <?php $a8kt5 = $row->kriteria_5 ?>
  <?php $a8kt6 = $row->kriteria_6 ?>
  <?php $a8kt7 = $row->kriteria_7 ?>
  <?php $a8kt8 = $row->kriteria_8 ?>
  <?php $vs8 = pow($a8kt1, $nr1) * pow($a8kt2, $nr2) * pow($a8kt3, $nr3) * pow($a8kt4, $nr4) * pow($a8kt5, $nr5) * pow($a8kt6, $nr6) * pow($a8kt7, $nr7) * pow($a8kt8, $nr8) ?>
  <!-- <?= $vs8; ?> -->

  <!-- alternatif 9 kriteria 1 sampai 8 -->
  <?php foreach ($ca9 as $row) ?>
  <?php $a9kt1 = $row->kriteria_1 ?>
  <?php $a9kt2 = $row->kriteria_2 ?>
  <?php $a9kt3 = $row->kriteria_3 ?>
  <?php $a9kt4 = $row->kriteria_4 ?>
  <?php $a9kt5 = $row->kriteria_5 ?>
  <?php $a9kt6 = $row->kriteria_6 ?>
  <?php $a9kt7 = $row->kriteria_7 ?>
  <?php $a9kt8 = $row->kriteria_8 ?>
  <?php $vs9 = pow($a9kt1, $nr1) * pow($a9kt2, $nr2) * pow($a9kt3, $nr3) * pow($a9kt4, $nr4) * pow($a9kt5, $nr5) * pow($a9kt6, $nr6) * pow($a9kt7, $nr7) * pow($a9kt8, $nr8) ?>
  <!-- <?= $vs9; ?> -->

  <!-- alternatif 10 kriteria 1 sampai 8 -->
  <?php foreach ($ca10 as $row) ?>
  <?php $a10kt1 = $row->kriteria_1 ?>
  <?php $a10kt2 = $row->kriteria_2 ?>
  <?php $a10kt3 = $row->kriteria_3 ?>
  <?php $a10kt4 = $row->kriteria_4 ?>
  <?php $a10kt5 = $row->kriteria_5 ?>
  <?php $a10kt6 = $row->kriteria_6 ?>
  <?php $a10kt7 = $row->kriteria_7 ?>
  <?php $a10kt8 = $row->kriteria_8 ?>
  <?php $vs10 = pow($a10kt1, $nr1) * pow($a10kt2, $nr2) * pow($a10kt3, $nr3) * pow($a10kt4, $nr4) * pow($a10kt5, $nr5) * pow($a10kt6, $nr6) * pow($a10kt7, $nr7) * pow($a10kt8, $nr8) ?>
  <!-- <?= $vs10; ?> -->

  <?php $totalvS = $vs1 + $vs2 + $vs3 + $vs4 + $vs5 + $vs6 + $vs7 + $vs8 + $vs9 + $vs10 ?>
  <!-- <?= $totalvS; ?> -->
  <?php $totalvektorS[] = $totalvS ?>
  <!-- ##end draft perhitunga vektor s -->

  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Jumlah Nilai Bobot</div>
              <?php foreach ($countBobot as $row) : ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row->bobot; ?></div>
              <?php endforeach; ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Vektor V</div>
              <?php foreach ($countbobot as $row) : ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row->id; ?></div>
              <?php endforeach; ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Vektor S</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $totalvS; ?></div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Mulai hitung vektor S -->
  <div class="row">
    <div class="col-lg-4">
      <h3> <a href="">Vektor S</a></h3>
      <div class="table-responsive">
        <table class="table table-hover table-bordered" id="dataTable6">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th>Kode</th>
              <th>Keterangan Alternatif</th>
              <th>Vektor S</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($nilaialt as $na) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $na['kode_alternatif']; ?></td>
                <td><?= $na['keterangan_alternatif']; ?></td>
                <?php $VektorS = (pow($na['kriteria_1'], $nr1) * pow($na['kriteria_2'], $nr2) * pow($na['kriteria_3'], $nr3) * pow($na['kriteria_4'], $nr4) * pow($na['kriteria_5'], $nr5) * pow($na['kriteria_6'], $nr6) * pow($na['kriteria_7'], $nr7) * pow($na['kriteria_8'], $nr8)) ?>
                <?php $TotalVektorS[] = $VektorS ?>
                <?php $TotalJadiVektorS = array_sum($TotalVektorS) ?>
                <!-- <?= $TotalJadiVektorS; ?> -->
                <td><?= $VektorS; ?></td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-lg-4">
      <h3> <a href="">Vektor V</a></h3>
      <div class="table-responsive">
        <table class="table table-hover table-bordered" id="dataTable7">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th>Kode</th>
              <th>Keterangan Alternatif</th>
              <th>Vektor V</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($nilaialt as $na) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $na['kode_alternatif']; ?></td>
                <td><?= $na['keterangan_alternatif']; ?></td>
                <?php $VektorS = (pow($na['kriteria_1'], $nr1) * pow($na['kriteria_2'], $nr2) * pow($na['kriteria_3'], $nr3) * pow($na['kriteria_4'], $nr4) * pow($na['kriteria_5'], $nr5) * pow($na['kriteria_6'], $nr6) * pow($na['kriteria_7'], $nr7) * pow($na['kriteria_8'], $nr8)) ?>
                <?php $TotalVektorS[] = $VektorS ?>
                <?php $TotalJadiVektorS = array_sum($TotalVektorS) ?>
                <!-- <?= $TotalJadiVektorS; ?> -->
                <!-- <td><?= $VektorS / $TotalJadiVektorS; ?></td> -->
                <td><?= $VektorS / $totalvS; ?></td>
                <!-- <td><?= $VektorS / 719.551; ?></td> -->
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php $VektorS = (pow($na['kriteria_1'], $nr1) * pow($na['kriteria_2'], $nr2) * pow($na['kriteria_3'], $nr3) * pow($na['kriteria_4'], $nr4) * pow($na['kriteria_5'], $nr5) * pow($na['kriteria_6'], $nr6) * pow($na['kriteria_7'], $nr7) * pow($na['kriteria_8'], $nr8)) ?>
        <?php $TotalVektorS[] = $VektorS ?>
        <?php $TotalJadiVektorS = array_sum($TotalVektorS) ?>
        <!-- <?= $VektorS; ?> -->
        <!-- <?= $TotalJadiVektorS; ?> -->
      </div>
    </div>
  </div>
</div>

<!-- kendalanya adalah belum bisa melakukan perhitungan vektor v secara otomatis, jika ada penambahan alternatif lebih dari 10, maka terjadi error -->