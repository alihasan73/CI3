<div class="my-3 px-5 row">
    <form action="<?php echo base_url().'product/create';?>" method="post">
    <!-- <?php var_dump($category); ?> -->
    <div class='mb-5'>
        <h2>Tambah Produk</h2>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk*</label>
            <input type="text" class="form-control" name='nama_produk' required title="nama produk wajib ditulis" id="nama_produk" placeholder="nama-produk"
            >
            <?php echo form_error('nama_produk'); ?>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga*</label>
            <input type="text" class="form-control" name='harga' required title="harga wajib ditulis" id="harga" placeholder="Harga"
            >
            <?php echo form_error('harga'); ?>
        </div>
        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori*</label>
            <select class="form-select" id="kategori_id" name='kategori_id' aria-label="Default select example">
                <option selected>Open this select category</option>
                <?php foreach($category as $cgtr): ?>
                    <option value="<?php echo $cgtr['id_kategori'];?>"><?php echo $cgtr['nama_kategori']; ?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('kategori_id'); ?>
        </div>
        <div class="mb-3">
            <label for="status_id" class="form-label">Status*</label>
            <select class="form-select" id="status_id" name='status_id' aria-label="Default select example">
                <option selected>Open this select status</option>
                <?php foreach($status as $sts): ?>
                    <option value="<?php echo $sts['id_status'];?>"><?php echo $sts['nama_status']; ?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('status_id'); ?>
        </div>
        <div class="d-flex">
            <button type="reset" class="btn btn-danger me-3">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    </form>
</div>