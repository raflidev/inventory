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
    <?= form_open('admin/barang') ?>    
    <?php 
    // var_dump($this->session->status_user);
    // die;
    if($this->session->status_user !== 3 && $this->session->status_user !== 4) :?>
    <div class="card card-default ">
          <div class="card-header">
            <h3 class="card-title">INPUT BARANG</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="hidden" value="<?php if(isset($barangupdate)){ echo $barangupdate[0]['id_barang']; } ?>" name="idbarang" >    
                  <input class="form-control" value="<?php if(isset($barangupdate)){ echo $barangupdate[0]['nama_barang']; } ?>" placeholder="Masukan barang" name="namabarang" style="width: 100%;">    
                  <?= form_error('namabarang'); ?>              
              </div>
               <!-- /.form-group -->
               <div class="form-group">
                  <label>Satuan</label>
                  <select name="satuan" class="form-control select2bs4" style="width: 100%;">
                  <?php if(isset($barangupdate)){ ?>
                    <option selected="selected"><?= $barangupdate[0]['satuan']; ?></option>                    
                    <?php }else{ ?>
                    <option selected="selected">PCS</option>
                      <?php } ?>
                    <option>Lusin</option>
                    <option>Rim</option>                
                    <option>Kodi</option>
                    <option>Gross</option>
                  </select>
                  <?= form_error('satuan'); ?>              

                
                <!-- /.form-group -->  
              </div>
              </div>
               
              <!-- /.col -->              
              <div class="col-md-6">              
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="form-control" rows="5"  placeholder="Masukan deskripsi" name="deskripsi" style="width: 100%;"><?php if(isset($barangupdate)){ echo $barangupdate[0]['deskripsi']; } ?></textarea>
                  <?= form_error('deskripsi'); ?>              
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
    
                    <?php endif;?>
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
                  <th>Nama Barang</th>
                  <th>Deskripsi</th>
                  <th>Satuan</th>
                  <?php if($this->session->status_user == 1) : ?>
                  <th>Status</th>
                  <?php endif; ?>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($barang as $b) : ?>
                <tr>
                  <td><?= $b['nama_barang'] ?></td>
                  <td><?= $b['deskripsi'] ?></td>                 
                  <td><?= $b['satuan'] ?></td> 
                  <?php if($this->session->status_user == 1) { ?>
                  <td>               
                  <?php if($b['aktif'] == 0){ ?>
                    <div class="badge badge-danger">
                      Delay Manager
                    </div>                  
                  <?php } elseif($b['aktif'] == 1) { ?>  
                    <div class="badge badge-warning">
                      Delay Gudang
                    </div>
                  <?php }elseif($b['aktif'] == 2) {?>  
                    <div class="badge badge-success">
                      Disetujui
                    </div>
                  <?php } ?>                  
                  <?php }; ?>                  
                  </td>
                  <td>
                    <div class="btn-group btn-group-sm">
                    <?php if($this->session->status_user !== 3 && $this->session->status_user !== 4) :?>
                          <a href="<?= base_url("admin/barang/index/$b[id_barang]") ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                          <a href="<?= base_url("admin/barang/baranghapus/$b[id_barang]") ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    <?php else : ?>
                          <a href="<?= base_url("admin/barang/accept/$b[id_barang]") ?>" class="btn btn-success"><i class="fas fa-check"></i></a>
                          <a href="<?= base_url("admin/barang/baranghapus/$b[id_barang]") ?>" class="btn btn-danger"><i class="fas fa-times"></i></a>
                    <?php endif; ?>
                    </div>
                  </td>                                             
                </tr>               
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                <th>Nama Barang</th>
                  <th>Deskripsi</th>
                  <th>Satuan</th>
                  <?php if($this->session->status_user == 1) : ?>
                  <th>Status</th>
                  <?php endif; ?>
                  <th>Aksi</th>
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