<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL ?>/mahasiswa/cari" method="post">

                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Mahasiswa..." autocomplete="off" name="keyword" id="keyword" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit" id="tombolCari">Cari</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php
                foreach ($data["mhs"] as $dataMahasiswa) :
                ?>
                    <li class="list-group-item">
                        <?= $dataMahasiswa["nama"] ?>
                        <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $dataMahasiswa["id"]; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $dataMahasiswa["id"]; ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $dataMahasiswa["id"]; ?>">Ubah</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $dataMahasiswa["id"]; ?>" class="badge badge-primary float-right ml-1">Detail</a>
                    </li>
                <?php
                endforeach;
                ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalLabel">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="POST">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nrp">NRP</label>
                        <input type="number" class="form-control" id="nrp" name="nrp" placeholder="NRP" required>
                    </div>
                    <div class="form-group">
                        <label for="email">EMAIL</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="EMAIL" required>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">JURUSAN</label>
                        <select class="form-control" id="jurusan" name="jurusan" required>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Pangan">Teknik Pangan</option>
                            <option value="Teknik Planologi">Teknik Planologi</option>
                            <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>