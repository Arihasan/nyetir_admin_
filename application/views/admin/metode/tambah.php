<div class="row">
  
  <div class="col-12">
    
    <div class="card">
      <div class="card-body">

        <form action="<?= site_url('metode/tambah') ?>" method="POST">
          <div class="form-group">
            <label>Nama Metode</label>
            <input type="text" class="form-control" name="nm_metode">
          </div>
          <div class="form-group">
            <label>Kode</label>
            <input type="text" class="form-control" name="kode">
          </div>
          <div class="form-group">
            <label>Jenis</label>
            <select name="jns_metode" class="form-control">
              <?php foreach (jenis_metode() as $k => $v): ?>
                <option value="<?= $k ?>"><?= $v ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label>Keterangan Tambahan</label>
            <textarea name="ket" id="ket"></textarea>
          </div>
          <div class="form-group">
            <label>Status</label>
            <select name="stts_metode" class="form-control">
            <?php foreach (status() as $k => $v): ?>
                <option value="<?= $k ?>"><?= $v ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <button type="submit" class="btn btn-success btn-sm">Simpan</button>
          <a href="<?= site_url('admin/daftar_metode') ?>" class="btn btn-danger btn-sm">Kembali</a>
        </form>

      </div>
    </div>

  </div>

</div>

<script>
  $(document).ready(function () {
    
    $('#ket').summernote({
      height: '400px',
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontStyle', ['fontname']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol']],
        ['height', ['height']],
        ['misc', ['undo', 'redo']],
      ]
    });

  });
</script>