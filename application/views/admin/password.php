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
            <?= form_open('admin/password') ?>
                <div class="card card-default">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password"  name="passwordold" class="form-control" >
                            <?= form_error('passwordold') ?>
                        </div>                        
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password"  name="passwordnew" class="form-control" >
                            <?= form_error('passwordnew') ?>
                        </div>                        
                        <div class="form-group">
                            <label>Confirmation Password</label>
                            <input type="password"  name="passwordnew2" class="form-control" >
                            <?= form_error('passwordnew2') ?>
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