<?php

$auth = $this->session->userdata('Auth');

?>

<!-- Container Fluid-->
<div class="container-fluid min-vh-100" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $judul; ?></li>
    </ol>
  </div>
  <button type="button"  class="btn btn-success btn-sm col-mb-4 <?=$auth->akses == 1 ? '' : 'd-none'?>" data-toggle="modal" data-target="#exampleModal"
                    id="#myBtn">
                    <i class="fas fa-plus"></i>
                    Tambah Petugas
                  </button>
  <br>
  <br>
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Detail Data Petugas</h6>
    </div>
    <div class="table-responsive p-3">
      <table class="table align-items-center table-flush" id="dataTable">
        <thead class="thead-light">
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Aktor</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $no = 0;

          foreach ($petugas as $value) {
            $no++

          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $value->username; ?></td>
              <td><?php echo $value->akses == 1 ? 'admin' : 'bendahara'; ?></td>

              <td class="<?=$auth->akses == 1 ? '' : 'd-none'?>">
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal2" id="#myBtn1">
                  <i class="fas fa-trash"></i>
                </button>
                <a href="<?php echo base_url('/Petugas/edit') ?>/<?php echo $value->id ?>" class="btn btn-warning btn-sm">
                  <i class="fas fa-pen"></i>
                </a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url() . 'Petugas/tambah_aksi'; ?>" method="post">
        <div class="modal-body">
          <input class="form-control form-control-sm  mb-3" id="username" name="username" type="text" required placeholder="Masukan Username">
          <input class="form-control form-control-sm  mb-3" id="password" name="password" type="password" required placeholder="Masukan Password">
          <select class="form-control form-control-sm mb-3" required name="akses" id="akses">
            <option value="" disabled selected>Pilih Role</option>
            <option value="1">Admin</option>
            <option value="2">bendahara</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    </form>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Pemberitahuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin akan menghapus data ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
        <a href="<?php echo base_url('/petugas/delete') ?>/<?php echo $value->id ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger alert_notif btn-icon-text"> <i class="ti-trash btn-icon-prepend"></i>Hapus</a>
      </div>
    </div>
  </div>
</div>

<!-- Page level plugins -->
<script src="<?= base_url() ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->

<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>