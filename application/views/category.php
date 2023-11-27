
    <div class="my-3 px-5 d-flex justify-content-between">
        <h3>Daftar Kategori</h3>
        <?php echo $this->session->flashdata('message');?>
        <button class="btn btn-primary" type='button' data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Kategori</button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <form action="<?php echo base_url().'category/create';?>" method="POST">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" name='nama_kategori' required title="nama kategori wajib ditulis" id="exampleFormControlInput1" placeholder="nama-kategori">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" >Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>

<div class="container-fluid">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Kategori</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    
    <tbody>
      <?php
      $no = 1;
      foreach($category as $ctgr):
      ?>
      <tr>
        <th scope="row"><?php echo $no++; ?></th>
        <td><?php echo $ctgr["nama_kategori"];?></td>
        <td>
          <div class='d-flex'>
            <a href="<?php echo base_url().'category/edit/'.$ctgr['id_kategori'];?>" class="btn btn-warning me-3">Edit</a>           
            <a href="<?php echo site_url('category/delete/'.$ctgr['id_kategori']); ?>" onclick="return confirm('Anda yakin hapus?')" class="btn btn-danger">Delete</a>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
