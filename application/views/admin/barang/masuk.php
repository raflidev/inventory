<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $judul ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $judul ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
    <!-- SELECT2 EXAMPLE -->
    <?= form_open('admin/barang/masuk') ?>
    <?php if($this->session->status_user !== 2 && $this->session->status_user !== 3) : ?>
    <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">INPUT BARANG MASUK</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- formopen -->
          
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                  <label>Nama Barang</label>            
                  <input value="<?php if(isset($masukupdate)){echo $masukupdate[0]['id_masuk'];}?>"  type="hidden" name="idmasuk">
                  <select name="namabarang" class="form-control select2bs4" style="width: 100%;">                  
                  <?php if(isset($masukupdate)) : ?>
                  <option value="<?php if(isset($masukupdate)){echo $masukupdate[0]['id_barang'];}?>"><?= $masukupdate[0]['nama_barang'] ?></option>
                  <?php else : ?>                
                  <option value="">...</option>
                  <?php endif; ?>
                    <?php foreach($barang as $b) :?>
                    <option value="<?= $b['id_barang'] ?>"><?= $b['nama_barang'] ?></option>
                    <?php endforeach?>
                  </select>
                  <?= form_error('namabarang') ?>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Supplier</label>
                  <select name="supplier" class="form-control select2bs4" style="width: 100%;">
                  <?php if(isset($masukupdate)) : ?>
                    <option value="<?php if(isset($masukupdate)){echo $masukupdate[0]['id_supplier'];}?>"><?= $masukupdate[0]['nama_supplier'] ?></option>
                  <?php else : ?>
                    <option value="">...</option>
                  <?php endif; ?>
                    <?php foreach($supplier as $s) :?>
                    <option value="<?= $s['id_supplier'] ?>"><?= $s['nama_supplier'] ?></option>
                    <?php endforeach?>
                  </select>
                  <?= form_error('supplier') ?>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->              
              <div class="col-md-6">
              <div class="form-group">
                  <label>Tanggal</label>
                  <input value="<?php if(isset($masukupdate)){echo $masukupdate[0]['tanggal_masuk'];}?>" class="form-control" type="date" name="tanggal" id="">
                  <?= form_error('tanggal') ?>
                </div>
                <!-- /.form-group -->
              <div class="form-group">
                  <label>Jumlah</label>
                  <input type="number" value="<?php if(isset($masukupdate)){echo $masukupdate[0]['jumlah_masuk'];}?>" placeholder="Masukan jumlah" name="jumlah" class="form-control" style="width: 100%;">
                  <?= form_error('jumlah') ?>
              </div>
                <!-- /.form-group -->

              </div>
            <button type="submit" name="submit" class="btn btn-primary form-control">Simpan</button>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
              </form>
          <!-- /.card-body -->

        </div>
        <!-- /.card -->
    <div class="card card-default">
                    <?php endif; ?>
          <!-- /.card-body -->
      
      <div class="row">
        <div class="col-12">
          <div class="card">            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Tanggal</th>
                  <th>Supplier</th>
                  <th>Jumlah</th>
                  <?php if($this->session->status_user !== 2) : ?>
                  <th>Aksi</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach($barangmasuk as $bm) : ?>
                <tr>
                  <td><?= $bm['nama_barang'] ?></td>
                  <td><?= $bm['tanggal_masuk'] ?></td>                 
                  <td><?= $bm['nama_supplier'] ?></td>                 
                  <td><?= $bm['jumlah_masuk'] ?></td>
                  <td>
                    <div class="btn-group btn-group-sm">
                  <?php if( $this->session->status_user == 3) : ?>                  
                  <?php if($bm['masuk_aktif'] == '0' ): ?>
                          <a href="<?= base_url("admin/barang/acceptmasuk/$bm[id_barang]/$bm[jumlah_masuk]/$bm[id_masuk]") ?>" class="btn btn-success"><i class="fas fa-check"></i></a>
                          <a href="<?= base_url("admin/barang/baranghapus/$bm[id_masuk]") ?>" class="btn btn-danger"><i class="fas fa-times"></i></a>                  
                  <?php elseif($bm['masuk_aktif'] == '1' ) : ?>                         
                          <a href="<?= base_url("admin/barang/denymasuk/$bm[id_barang]/$bm[jumlah_masuk]/$bm[id_masuk]") ?>" class="btn btn-danger"><i class="fas fa-times"></i></a>                  
                  <?php elseif($bm['masuk_aktif'] == '2' ) : ?>                         
                          
                  <?php endif; ?>
                  <?php elseif($this->session->status_user == 2) : ?>
                  <?php else : ?>
                          <a href="<?= base_url("admin/barang/masuk/$bm[id_masuk]") ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                          <a href="<?= base_url("admin/barang/masukhapus/$bm[id_masuk]") ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                  <?php endif; ?>
                    </div>                        
                  </td>
                </tr>               
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Barang</th>
                  <th>Tanggal</th>
                  <th>Supplier</th>
                  <th>Jumlah</th>
                  <?php if($this->session->status_user !== 2) : ?>
                  <th>Aksi</th>
                  <?php endif; ?>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->