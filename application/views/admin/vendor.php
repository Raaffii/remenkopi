<div class="main-panel">
  <div class="page-header diva content-wrapper flex-wrap p-3 m-0">
    <div class="header-left d-flex align-items-center" style="display:inline-flex;">
      <h4 style="font-weight:bold; color:#B2533E; text-align:center; margin:auto 2em auto 1em;">Vendor</h4>
    </div>
    <div class="header m-0 w-50">
      <input type="text" class="form-control" id="exampleInputName1" placeholder="Search" />

    </div>

    <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
      <button type="button" data-toggle="modal" data-target="#tambahvendor" class="btn mt-2 mt-sm-0 btn-icon-text">
        <i class="fa fa-plus-square-o fa-fw"></i> Tambah Menu </button>
    </div>
  </div>
  <div class="content-wrapper">
    <?= $this->session->flashdata('message') ?>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Vendor</h4>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Produk</th>
                  <th>Jenis</th>
                  <th>Stok</th>
                  <th>Harga</th>
                  <th>Gambar</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_produk as $dp) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $dp->nama_produk ?></td>
                    <td>
                      <?= $dp->nama_jenis ?>
                    </td>
                    <td><?= $dp->stock ?></td>
                    <td><?= $dp->harga ?></td>
                    <td class="py-1">
                      <img src="<?= base_url('data/produk/') ?><?= $dp->gambar ?>" />
                    </td>
                    <td><i class="fa fa-solid fa-faw fa-pencil fa-lg" type="button" data-toggle="modal" data-target="#formedit<?= $dp->id_produk; ?>"></i>
                      <i class="fa fa-solid fa-trash fa-fw fa-lg red" style="color:red;" type="button" data-toggle="modal" data-target="#hapusvendor<?= $dp->id_produk; ?>"></i>
                    </td>
                  </tr>
                <?php endforeach; ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="tambahvendor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <div class="modal-body">
        <form class="forms-sample" method="post" action="<?php echo base_url('admin/tambah_vendor') ?>" enctype="multipart/form-data">
          <div class="form-group row g-3">
            <div class="col-md-12">
              <div id="form-group">
                <label for="nama_produk">Nama Menu</label>
                <input class="typeahead" type="text" placeholder="Nama" name="nama_produk" id="nama_produk">
              </div>
            </div>
          </div>

          <div class="form-group row g-3">
            <div class="col-md-12">
              <div id="form-group">
                <label for="nama_jenis">Jenis</label>
                <select name="jenis" class="js-example-basic-single" style="width: 100%;" id="nama_jenis">
                  <?php foreach ($data_jenis as $dj) : ?>
                    <option value="<?php echo $dj->id_jenis ?>"><?php echo $dj->nama_jenis ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group row g-3">
            <div class="col-md-12">
              <div id="form-group">
                <label for="stok">Stok</label>
                <input class="typeahead" type="text" placeholder="Stok" name="stock" id="stok">
              </div>
            </div>
          </div>

          <div class="form-group row g-3">
            <div class="col-md-12">
              <div id="form-group">
                <label for="harga">Harga</label>
                <input class="typeahead" type="text" placeholder="Harga" name="harga" id="harga">
              </div>
            </div>
          </div>

          <div class="form-group row g-3">
            <label for="gambar" class="form-label">Gambar</label>
            <div class="col-md-12">
              <div class="input-group">
                <input class="form-control file-upload-info" type="file" name="gambar" id="gambar" Required>
              </div>
            </div>
          </div>
      </div>


      <div class="modal-footer">
        <button type="submit" class="btn mr-2" style="background-color:#B2533E; color:white;">Simpan</button>
        <!-- <button class="btn btn-light" data-dismiss="modal" aria-label="Close">Cancel</button> -->
      </div>
      </form>
    </div>
  </div>
</div>

<?php foreach ($data_produk as $dp) : ?>
  <div class="modal fade" id="formedit<?= $dp->id_produk; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Vendor</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>

          </button>
        </div>

        <div class="modal-body">
          <form class="forms-sample" method="post" action="<?php echo site_url('admin/edit_vendor') ?>" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="id_produk" value=" <?php echo $dp->id_produk ?> ">
            <div class="form-group row g-3">
              <div class="col-md-12">
                <div id="form-group">
                  <label for="nama_produk">Nama Menu</label>
                  <input class="typeahead" type="text" placeholder="Nama" name="nama_produk" value="<?php echo $dp->nama_produk ?>" id="nama_produk">
                </div>
              </div>
            </div>

            <div class="form-group row g-3">
              <div class="col-md-12">
                <div id="form-group">
                  <label for="nama_jenis">Jenis</label>
                  <select name="jenis" class="js-example-basic-single" style="width: 100%;" id="nama_jenis">
                    <?php foreach ($data_jenis as $dj) : ?>
                      <option value="<?php echo $dj->id_jenis ?>" <?php if ($dj->id_jenis == $dp->jenis) echo 'selected'; ?>><?php echo $dj->nama_jenis ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group row g-3">
              <div class="col-md-12">
                <div id="form-group">
                  <label for="stok">Stok</label>
                  <input class="typeahead" type="text" placeholder="Stok" name="stock" value="<?php echo $dp->stock ?>" id="stok">
                </div>
              </div>
            </div>

            <div class="form-group row g-3">
              <div class="col-md-12">
                <div id="form-group">
                  <label for="harga">Harga</label>
                  <input class="typeahead" type="text" placeholder="Harga" name="harga" value="<?php echo $dp->harga ?>" id="harga">
                </div>
              </div>
            </div>

            <div class="form-group row g-3">
              <label for="gambar" class="form-label">Gambar</label>
              <div class="col-md-12">
                <div class="input-group">
                  <input class="form-control file-upload-info" type="file" name="gambar" value="<?php echo $dp->gambar ?>" id="gambar">
                </div>
              </div>
            </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn mr-2" style="background-color:#B2533E; color:white;">Simpan</button>
          <!-- <button class="btn btn-light" data-dismiss="modal" aria-label="Close">Cancel</button> -->
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<?php foreach ($data_produk as $dp) : ?>
  <!-- Logout Modal-->
  <div class="modal fade" id="hapusvendor<?= $dp->id_produk; ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content" style="background-color:#D1D4D8;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Hapus Data?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="d-flex align-items-center justify-content-center p-4">
          <a class="btn but1" href="<?= base_url('admin/hapus_vendor/' . $dp->id_produk) ?>">Hapus</a>
          <button class="btn but m-1" type="button" data-dismiss="modal">Tidak</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>