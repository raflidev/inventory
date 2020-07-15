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
    <?= form_open('admin/supplier/') ?>
    <?php if($this->session->status_user == 2 & 1) : ?>
    <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">INPUT DATA SUPPLIER</h3>

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
                  <label>Nama Supplier</label>
                  <input value="<?php if(isset($supplierupdate)){ echo $supplierupdate[0]['id_supplier']; } ?>" type="hidden" name="idsupplier">
                  <input type="text" value="<?php if(isset($supplierupdate)){ echo $supplierupdate[0]['nama_supplier']; } ?>" placeholder="Masukan nama supplier" name="namasupplier" class="form-control" id="">
                  <?= form_error('namasupplier') ?>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Telp</label>
                  <input type="number" value="<?php if(isset($supplierupdate)){ echo $supplierupdate[0]['telp']; } ?>" placeholder="Masukan nomor telp" name="telp" class="form-control" id="">
                  <?= form_error('telp') ?>

                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->              
              <div class="col-md-6">
              <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="alamat"  placeholder="Masukan alamat" class="form-control" rows="5" id="" ><?php if(isset($supplierupdate)){ echo $supplierupdate[0]['alamat']; } ?></textarea>
                  <?= form_error('alamat') ?>

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
        <?php endif; ?>
    <div class="card card-default">
          
          <!-- /.card-body -->
      
      <div class="row">
        <div class="col-12">
          <div class="card">            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Supplier</th>
                  <th>Alamat</th>
                  <th>Telp</th>
                  <?php if($this->session->status_user == 2 & 1) : ?>
                  <th>Aksi</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach($supplier as $s) : ?>
                <tr>
                  <td><?= $s['nama_supplier'] ?></td>
                  <td><?= $s['alamat'] ?></td>                 
                  <td><?= $s['telp'] ?></td>                            
                  <?php if($this->session->status_user == 2 & 1) : ?>
                  <td>
                    <div class="btn-group btn-group-sm">
                          <a href="<?= base_url("admin/supplier/index/$s[id_supplier]") ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                          <a href="<?= base_url("admin/supplier/hapus/$s[id_supplier]") ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </div>                        
                  </td>
                  <?php endif; ?>
                </tr>               
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Supplier</th>
                  <th>Alamat</th>
                  <th>Telp</th>
                  <?php if($this->session->status_user == 2 & 1) : ?>
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