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
    <div class="row">
        <div class="col-6">
            <?= form_open('admin/profile') ?>
                <div class="card card-default">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" value="<?= $profile[0]['nama_user'] ?>"  name="nama" class="form-control" >
                            <?= form_error('nama') ?>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" value="<?= $profile[0]['nama_user'] ?>"  name="gambar" class="form-control" >
                            <?= form_error('nama') ?>
                        </div>
                    <button type="submit" name="submit" class="btn btn-primary form-control">Simpan</button>                                    
                    </div>                        
                </div>
            </form>        
        </div>            
    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->