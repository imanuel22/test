<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash();?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary Tcreat" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form action="<?=BASEURL;?>/mahasiswa/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="cari mahasiswa .." name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            
            
            <h3> Daftar mahasiswa</h3>

            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                <li class="list-group-item ">
                    <?=$mhs['nama']?>
                    <a href="<?= BASEURL;?>/mahasiswa/delete/<?= $mhs['id']?>" class="badge text-bg-danger float-end" onclick="return confirm('delete?')">hapus</a>
                    <a href="<?= BASEURL;?>/mahasiswa/update/<?= $mhs['id']?>" class="badge text-bg-success float-end TModalEdit" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?=$mhs['id']?>">edit</a>
                    <a href="<?= BASEURL;?>/mahasiswa/detail/<?= $mhs['id']?>" class="badge text-bg-primary float-end">detail</a>
                </li>
                <?php endforeach;?>
            </ul>

        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL;?>/mahasiswa/crate" method="post">
        <input type="text" hidden name="id" id="id">
            <div class="form-group">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
                <label for="nim" class="form-label">nim</label>
                <input type="number" class="form-control" id="nim" name="nim">
            </div>
            <div class="form-group">
                <label for="jurusan" class="form-label">jurusan</label>
                <select class="form-select" id="jurusan" name="jurusan">
                    <option selected>Open this select menu</option>
                    <option value="TRPL">TRPL</option>
                    <option value="MI">MI</option>
                    <option value="TI">TI</option>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>