
    <div class="my-3 px-5 d-flex justify-content-between">
        <h3>Daftar Produk</h3>
        <?php echo $this->session->flashdata('message');?>
        <div>
          <a href="<?php echo base_url().'product/create_view';?>" class="btn btn-primary me-3">Tambah Produk</a>           
        <a href="<?php echo base_url().'product/save';?>" class="btn btn-primary me-3">Get Produk</a>
        </div>
    </div>

<div class="container-fluid">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Product</th>
        <th scope="col">Kategori</th>
        <th scope="col">Harga</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    
    <tbody>
      <?php
      $no = 1;
      foreach($product as $prd):
      ?>
      <tr>
        <th scope="row"><?php echo $no++; ?></th>
        <td><?php echo $prd["nama_produk"];?></td>
        <td><?php echo $prd["nama_kategori"];?></td>
        <td><?php echo $prd["harga"];?></td>
        <td><?php echo $prd["nama_status"];?></td>
        <td>
          <div class='d-flex'>
            <a href="<?php echo base_url().'product/edit/'.$prd['id_produk'];?>" class="btn btn-warning me-3">Edit</a>           
            <a href="<?php echo site_url().'product/delete/'.$prd['id_produk']; ?>" onclick="return confirm('Anda yakin hapus?')" class="btn btn-danger">Delete</a>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
