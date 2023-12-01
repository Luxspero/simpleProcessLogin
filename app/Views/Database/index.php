<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $judul ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><?= $judul ?></li>
            </ol>
            <?php if (session()->get('message')) : ?>
                <div class="alert alert-<?= session()->get('status') ?> alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><?= print_r(session()->getFlashdata('message')) ?></strong>
                </div>
            <?php endif; ?>
            <div class="card mb-4">
                <div class="card-header">
                    <form action="" method="get" autocomplete="off">
                        <div class="float-left">
                            <div class="form-group">
                              <label for=""></label>
                              <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search" value="<?= $keyword?>" aria-describedby="helpId">
                            </div>
                        </div>
                    </form>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <button class="btn btn-success btn-sm" id="btnExport"><i class="fa fa-file-excel"></i> Export to Excel</button> 
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
                            <i class="fas fa-plus me-1"></i>Tambah Data
                        </button>
                        <hr>
                        <table class="table table-bordered" id="" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NIK</th>
                                    <th>NO KK</th>
                                    <th>NAMA PEMILIH</th>
                                    <th>TEMPAT LAHIR</th>
                                    <th>TANGGAL LAHIR</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>ALAMAT</th>
                                    <th>TPS</th>
                                    <th>ALAMAT TPS</th>
                                    <th>NO.HP</th>
                                    <th>EMAIL</th>
                                    <th>Act</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $no = 1 + (10 * ($page-1));
                                foreach ($penduduk['penduduk'] as $r) :
                                ?>
                                    <tr>
                                        <th><?= $no++; ?></th>
                                        <td><?= $r['nik']; ?></td>
                                        <td><?= $r['no_kk']; ?></td>
                                        <td><?= $r['nama']; ?></td>
                                        <td><?= $r['tempat_lahir']; ?></td>
                                        <td><?= $r['tgl_lahir']; ?></td>
                                        <td><?= $r['jenis_kelamin']; ?></td>
                                        <td><?= $r['desa_kel'];?>, <?= $r['kecamatan'];?>, <?= $r['kabupaten_kota'];?>, <?= $r['provinsi'];?></td>
                                        <td><?= $r['tps']; ?></td>
                                        <td><?= $r['alamat_tps']; ?></td>
                                        <td><?= $r['no_tlpn']; ?></td>
                                        <td><?= $r['email']; ?></td>
                                        <td>
                                            <!-- Tombol Hapus Data -->
                                            <form action="database/hapus" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                <input type="hidden" name="id" value="<?= $r['id']; ?>">
                                                <button type="submit" class="btn btn-sm btn-danger rounded-circle">x</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                        <?= $penduduk['pager']->links('default', 'bootstrap') ?> <!-- Menampilkan pagination -->

                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Add data-->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-excel" role="tab" aria-controls="pills-home" aria-selected="true">Import Excel </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-manual" role="tab" aria-controls="pills-profile" aria-selected="false">Manual Input</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-excel" role="tabpanel" aria-labelledby="pills-home-tab">
                            <form action="Database/simpanExcel" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <label for="">Pilih File Excel</label>
                                    <input type="file" name="fileexcel" id="fileexcel" class="form-control" required accept=".xls, .xlsx" aria-describedby="helpId" required>
                                    <small id="helpId" class="text-muted">Jika belum punya format excel silakan download disini <a href="fileformat/download/1">DOWNLOAD</a></small>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="subbmit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-manual" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <form action="Database/addOne" method="post">
                                <div class="form-group">
                                    <label for="">NIK</label>
                                    <input type="number" name="nik" id="nik" class="form-control" placeholder="" aria-describedby="helpId" required> 
                                    <small id="helpId" class="text-muted">Nomor Induk Kependudukan</small>
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor Kartu Keluarga</label>
                                    <input type="number" name="no_kk" id="no_kk" class="form-control" placeholder="" aria-describedby="helpId" required>
                                    <small id="helpId" class="text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Pemilih</label>
                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="" aria-describedby="helpId" required>
                                    <small id="helpId" class="text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="KOTA LAHIR" aria-describedby="helpId" required>
                                    <small id="helpId" class="text-muted">Contoh : JAKARTA</small>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" id="tanggal_lahir" class="form-control" placeholder="" aria-describedby="helpId" required>
                                    <small id="helpId" class="text-muted">Contoh : JAKARTA</small>
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin:</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <small id="helpId" class="text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="provinsi-select">Pilih Provinsi:</label>
                                    <select id="provinsi-select" name="provinsi" class="form-control" required>
                                        <option value="">Pilih Provinsi</option>
                                    </select>
                                    <small id="helpId" class="text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="kabupaten-select">Pilih Kabupaten/Kota:</label>
                                    <select id="kabupaten-select" name="kabupaten_kota" class="form-control" required>
                                        <!-- Opsi Kabupaten/Kota akan ditambahkan di sini -->
                                    </select>
                                    <small id="helpId" class="text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan-select">Pilih Kecamatan:</label>
                                    <select id="kecamatan-select" name="kecamatan" class="form-control" required>
                                        <!-- Opsi Kabupaten/Kota akan ditambahkan di sini -->
                                    </select>
                                    <small id="helpId" class="text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="kelurahan-select">Pilih Desa/Kelurahan:</label>
                                    <select id="kelurahan-select" name="desa_kel" class="form-control" required>
                                        <!-- Opsi Kabupaten/Kota akan ditambahkan di sini -->
                                    </select>
                                    <small id="helpId" class="text-muted"></small>
                                </div>
                                <div class="form-group">
                                  <label for="">TPS</label>
                                  <input type="number" name="tps" id="tps" class="form-control" placeholder="" aria-describedby="helpId" required>
                                  <small id="helpId" class="text-muted">Nomor TPS</small>
                                </div>
                                <div class="form-group">
                                  <label for="">Alamat TPS</label>
                                  <input type="text" name="alamat_tps" id="alamat_tps" class="form-control" placeholder="" aria-describedby="helpId">
                                  <small id="helpId" class="text-muted">Cth : Jln Piere Tendean No.12</small>
                                </div>
                                <div class="form-group">
                                  <label for="">Nomor Telepon</label>
                                  <input type="number" name="no_tlpn" id="no_tlpn" class="form-control" placeholder="" aria-describedby="helpId">
                                  <small id="helpId" class="text-muted">Cth : 0852xxxx...</small>
                                </div>
                                <div class="form-group">
                                  <label for="">Email</label>
                                  <input type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId">
                                  <small id="helpId" class="text-muted">Cth : example@domain.com</small>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="subbmit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script>
        const provinsiSelect = document.getElementById("provinsi-select");
        const kabupatenSelect = document.getElementById("kabupaten-select");
        const kecamatanSelect = document.getElementById("kecamatan-select");
        const kelurahanSelect = document.getElementById("kelurahan-select");

        // Mengisi opsi Provinsi dari API
        fetch("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json")
            .then(response => response.json())
            .then(data => {
                // Loop melalui data dan menambahkannya ke pilihan Provinsi
                data.forEach(provinsi => {
                    const option = document.createElement("option");
                    option.value = provinsi.id;
                    option.textContent = provinsi.name;
                    provinsiSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error("Gagal mengambil data Provinsi:", error);
            });

        // Mengisi opsi Kabupaten/Kota berdasarkan pilihan Provinsi
        provinsiSelect.addEventListener("change", () => {
            const selectedProvinsiId = provinsiSelect.value;

            // Hapus opsi Kabupaten/Kota yang sudah ada
            while (kabupatenSelect.firstChild) {
                kabupatenSelect.removeChild(kabupatenSelect.firstChild);
            }
            
            // Ambil data Kabupaten/Kota berdasarkan ID Provinsi
            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${selectedProvinsiId}.json`)
                .then(response => response.json())
                .then(data => {
                    // Loop melalui data dan menambahkannya ke pilihan Kabupaten/Kota
                    data.forEach(kabupaten => {
                        const option = document.createElement("option");
                        option.value = kabupaten.id;
                        option.textContent = kabupaten.name;
                        kabupatenSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error("Gagal mengambil data Kabupaten/Kota:", error);
                });
        });

        // Mengisi opsi Kecamatan berdasarkan pilihan Kab/Kota
        kabupatenSelect.addEventListener("change", () => {
            const selectedKabupatenId = kabupatenSelect.value;

            // Hapus opsi Kabupaten/Kota yang sudah ada
            while (kecamatanSelect.firstChild) {
                kecamatanSelect.removeChild(kecamatanSelect.firstChild);
            }

            // Ambil data Kabupaten/Kota berdasarkan ID Provinsi
            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${selectedKabupatenId}.json`)
                .then(response => response.json())
                .then(data => {
                    // Loop melalui data dan menambahkannya ke pilihan Kabupaten/Kota
                    data.forEach(kecamatan => {
                        const option = document.createElement("option");
                        option.value = kecamatan.id;
                        option.textContent = kecamatan.name;
                        kecamatanSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error("Gagal mengambil data Kecamatan:", error);
                });
        });

        // Mengisi opsi Kelurahan berdasarkan pilihan Kecamatan
        kecamatanSelect.addEventListener("change", () => {
            const selectedKecamatanId = kecamatanSelect.value;

            // Hapus opsi Kabupaten/Kota yang sudah ada
            while (kelurahanSelect.firstChild) {
                kelurahanSelect.removeChild(kelurahanSelect.firstChild);
            }

            // Ambil data Kabupaten/Kota berdasarkan ID Provinsi
            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${selectedKecamatanId}.json`)
                .then(response => response.json())
                .then(data => {
                    // Loop melalui data dan menambahkannya ke pilihan Kabupaten/Kota
                    data.forEach(kelurahan => {
                        const option = document.createElement("option");
                        option.value = kelurahan.id;
                        option.textContent = kelurahan.name;
                        kelurahanSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error("Gagal mengambil data Desa/Kelurahan:", error);
                });
        });
    </script>

    