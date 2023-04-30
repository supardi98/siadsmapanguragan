        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"><?= $judul;?></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>             
              <li class="breadcrumb-item active" aria-current="page"><?= $judul;?></li>
            </ol>
          
          </div>

          <!-- <div class="text-center">            
            <h4 class="pt-1" style="color:black;">Cari Siswa Berdasarkan NISN</h4>
            </div>

            <div class="input-group mb-5  center">
                    <div class="input-group-prepend">
                      <button  class="btn btn-success" id="basic-addon1"><i class="fas fa-search"></i></button>
                    </div>
                    <input type="text" class="form-control" placeholder="Masukan NISN Siswa" aria-label="Username"
                      aria-describedby="basic-addon1">
            </div> -->

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-6 col-md-5 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Biodata Siswa</div>
                    
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            </div> -->

            <div class="col-xl-12 col-md-5 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Tagihan Siswa</div>
                      <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jumlah</th>
                        <th>Jenis Pembayaran</th>
                        <th>Bukti Upload</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      <tr>
                        <?php
                        $no = 0;

                        foreach ($querySis as $value) {
                            $no++
                        ?>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $value->nisn; ?></td>
                        <td><?php echo $value->nama; ?></td>
                        <td><?php echo $value->nama_kelas; ?></td>
                        <td><?php echo rupiah($value->biaya); ?></td>
                        <td>Buku LKS, BAT</td>
                        <td>
                        <a  href="<?php echo base_url('/Transaksi/bukti') ?>/<?php echo $value->id ?>" data-toggle="tooltip" data-placement="bottom"  class="btn btn-success btn-sm">
                         Lihat Bukti
                        </a>
                        </td>
                        <td>
                        <a  href="<?php echo base_url('/Transaksi/pembayaran') ?>/<?php echo $value->id ?>" data-toggle="tooltip" data-placement="bottom"  class="btn btn-success btn-sm">
                           BAYAR
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
                </div>
              </div>
            </div>
         </div>
                      </div>
      
        </div>
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel2">DETAILS KEUANGAN</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                
                </div>
                <div class="modal-footer">
              
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                  
                </div>
              
              </div>
         </div>
<script>
  $(document).ready( function () {
    $('#dataTable').DataTable();
} );
</script>

<script>
$(document).ready(function()  {
    $(document).on('click', '#myBtn3', function(){
        var nama = $(this).data('nama');
        var kelas = $(this).data('kelas');
        var tanggal = $(this).data('tanggal');
        var setoran = $(this).data('setoran');
        var biaya = $(this).data('biaya');
        $('#nama').text(nama);
        $('#kelas').text(kelas);
        $('#tanggal').text(tanggal);
        $('#setoran').text(setoran);
        $('#biaya').text(biaya);
        $('#modal').modal('hide');  
    }) 
})
</script>