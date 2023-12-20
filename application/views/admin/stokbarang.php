<div class="main-panel">
    <div class="content-wrapper">
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
                                    <th>Update Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($data_produk as $dp) : ?>
                                    <form action="<?= base_url('admin/updatestock/') ?>" method="post">
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $dp->nama_produk ?></td>
                                            <td>
                                                <?= $dp->nama_jenis ?>
                                            </td>
                                            <td><?= $dp->stock ?></td>
                                            <td><?= $dp->harga ?></td>
                                            <td class="py-1">
                                                <img src="<?= base_url('data/produk/') ?><?= $dp->gambar ?>" alt="image" />
                                            </td>

                                            <td>
                                                <input type="hidden" value="<?= $dp->id_produk ?>" name="id">
                                                <input type="number" value="<?= $dp->stock ?>" name="stok">
                                                <button class="btn btn-dark">Simpan</button>
                                            </td>
                                        </tr>
                                    </form>
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
                <form class="forms-sample" method="post" action="" enctype="multipart/form-data">
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
                                <label for="jenis">Jenis</label>
                                <input class="typeahead" type="text" placeholder="Makanan" name="jenis" id="jenis">
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
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Divisi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>

                    </button>
                </div>

                <div class="modal-body">
                    <form class="forms-sample" method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" name="email" id="email" value="" />
                        <input type="hidden" name="username" id="username" value="" readonly>
                        <input type="hidden" name="id" id="id" value="" />

                        <div class="form-group row g-3">
                            <div class="col-md-12">
                                <div id="form-group">
                                    <label for="nama">Nama</label>
                                    <input class="typeahead" type="text" name="nama" id="nama" value="" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div id="form-group">
                                    <label for="level">Level</label>
                                    <select name="level" class="form-control" required>
                                        <!-- <?php foreach ($level as $lvl) : ?>
                                <option value="<?php echo $lvl->id_level ?>"<?php if ($lvl->id_level == $pg->level) echo 'selected'; ?>><?php echo $lvl->level ?></option>
                                <?php endforeach; ?> -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div id="form-group">
                                    <label for="divisi">Divisi</label>
                                    <select name="divisi" class="form-control" required>
                                        <!-- <?php foreach ($divisi as $dv) : ?>
                                <option value="<?php echo $dv->id ?>"<?php if ($dv->id == $pg->divisi) echo 'selected'; ?>><?php echo $dv->nama_divisi ?></option>
                                <?php endforeach; ?> -->
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-info mr-2">Simpan</button>
                    <button class="btn btn-light" data-dismiss="modal" aria-label="Close">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<?php foreach ($data_produk as $dp) : ?>
    <!-- Logout Modal-->
    <div class="modal fade" id="hapusvendor<?= $dp->id_produk; ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color:#D1D4D8;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Hapus Data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <a class="btn" style="background-color:#B2533E; color:white;" href="<?= base_url('admin/hapus_vendor/' . $dp->id_produk) ?>">Hapus</a>
                    <button class="btn m-1" style="background-color:#D1D4D8; color: #B2533E;" type="button" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>