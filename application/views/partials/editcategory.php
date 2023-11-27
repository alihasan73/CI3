<div class="my-3 px-5 row">
    <form action="<?php echo base_url().'category/update';?>" method="post">
    <div class="col-3">
        
        <?php foreach($category as $ctgr):?>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Kategori</label>
            <input type="hidden" name="id_kategori" value="<?php echo $ctgr->id_kategori; ?>">
            <input type="text" class="form-control" name='nama_kategori' required title="nama kategori wajib ditulis" id="exampleFormControlInput1" placeholder="nama-kategori"
            value="<?php echo $ctgr->nama_kategori;?>">
            <?php echo form_error('nama_kategori'); ?>
        </div>
        <div class="d-flex">
            <button type="reset" class="btn btn-danger me-3">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?php endforeach;?>
    </div>
    </form>
</div>