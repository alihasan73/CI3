<div class="my-3 px-5 row">
    <form action="<?php echo base_url().'product/update';?>" method="post">
    <!-- <?php var_dump($category); ?> -->
    <div class='mb-5'>
        <h2>Edit Produk</h2>
    </div>
    <div class="col-3">
        <?php foreach($product as $prd):?>
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk*</label>
            <input type="hidden" name="id_produk" value="<?php echo $prd->id_produk; ?>">
            <input type="text" class="form-control" name='nama_produk' required title="nama produk wajib ditulis" id="nama_produk" placeholder="nama-produk"
            value="<?php echo $prd->nama_produk;?>"
            >
            <?php echo form_error('nama_produk'); ?>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga*</label>
            <input type="text" class="form-control" name='harga' required title="harga wajib ditulis" id="harga" placeholder="Harga" value="<?php echo $prd->harga;?>"
            >
            <?php echo form_error('harga'); ?>
        </div>
        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori*</label>
            <select class="form-select" id="kategori_id" name='kategori_id' aria-label="Default select example" value="<?php echo $prd->kategori_id;?>">
                
                <?php foreach($category as $cgtr): ?>
                    <option value="<?php echo $cgtr['id_kategori'];?>"><?php echo $cgtr['nama_kategori']; ?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('kategori_id'); ?>
        </div>
        <div class="mb-3">
            <label for="status_id" class="form-label">Status*</label>
            <select class="form-select" id="status_id" name='status_id' aria-label="Default select example" value="<?php echo $prd->status_id;?>">
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
        <?php endforeach;?>
    </div>
    </form>
</div>