<div class="main-panel">

    <div class="content-wrapper pb-0">
        <div class="1 or 2" style="display: flex;">
            <div class="1">
                <div class="row">
                    <div class="col-sm-4 stretch-card grid-margin" style="width: 800px;">
                        <div class="card" style="background-color:  #F8F5F2;">
                            <div class="card-body">
                                <label for="exampleInputName1">Kasir</label>
                                <form action="<?= base_url("pegawai/cari/") ?>" method="post" style="display: flex;">
                                    <input type="text" class="form-control" id="exampleInputName1" name="pencarian" placeholder="Search" />
                                    <button class="btn btn-primary" btn-fw>cari</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="btn-group" role="group" aria-label="Basic example" style="width: 800px; margin-bottom:20px;">
                        <form action="<?= base_url('pegawai/filter') ?>" method="post" style="width: 50rem; background-color:#B2533E;">
                            <input type="hidden" value="1" name="filterisasi">
                            <button type=" button" class="btn btn-primary" style="background-color:  #B2533E"> Makanan</button>
                        </form>
                        <form action="<?= base_url('pegawai/filter') ?>" method="post" style="width: 50rem; background-color:#B2533E">
                            <input type="hidden" value="2" name="filterisasi">
                            <button type=" button" class="btn btn-primary" style="background-color:  #B2533E" style="width: 500rem;"> Minuman </button>
                        </form>
                        <form action="<?= base_url('pegawai/filter') ?>" method="post" style="width: 50rem; background-color:#B2533E">
                            <input type="hidden" value="3" name="filterisasi">
                            <button type=" button" class="btn btn-primary" style="background-color:  #B2533E"> Main Course </button>
                        </form>
                        <form action="<?= base_url('pegawai/filter') ?>" method="post" style="width: 50rem; background-color:#B2533E">
                            <input type="hidden" value="4" name="filterisasi">
                            <button type=" button" class="btn btn-primary" style="background-color:  #B2533E"> Desert </button>
                        </form>
                    </div>

                </div>


                <div class="row">
                    <?php foreach ($data_produk as $dp) : ?>
                        <a class="col-sm-4 stretch-card grid-margin kartu" style="width: 200px;" data-toggle="modal" data-target="#formedit<?= $dp->id_produk; ?>">
                            <div class=" card kartuproduk">
                                <div class="card-body p-0">
                                    <img style="height: 10rem;" class="img-fluid w-100" src="<?= base_url() ?>/data/produk/<?= $dp->gambar ?>" alt="" />
                                </div>
                                <div class="card-body px-3 text-dark">
                                    <div class="d-flex justify-content-between">
                                        <p class="text-muted font-13 mb-0"><?= $dp->nama_jenis ?></p>
                                        <i class="mdi mdi-heart-outline"></i>
                                    </div>
                                    <h5 class="font-weight-semibold"> <?= $dp->nama_produk ?> </h5>
                                    <div class="d-flex justify-content-between font-weight-semibold">

                                        <p class="mb-0">Rp. <?= $dp->harga ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>

                    <?php endforeach ?>


                </div>
            </div>
            <div class="2">
                <div class="card" style="width: 420px;">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Harga</h4>
                        <p class="card-description">
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Produk</th>
                                        <th>Product</th>

                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $grouped_data = [];
                                    $total_harga = 0;

                                    foreach ($data_kasir as $dk) {
                                        if (!isset($grouped_data[$dk->nama_produk])) {
                                            $grouped_data[$dk->nama_produk] = [
                                                'no' => ++$no,
                                                'nama_produk' => $dk->nama_produk,
                                                'harga' => $dk->harga,
                                                'status' => $dk->status,
                                                'jumlah' => 1,
                                            ];
                                        } else {
                                            $grouped_data[$dk->nama_produk]['harga'] += $dk->harga;
                                            $grouped_data[$dk->nama_produk]['jumlah']++;
                                        }
                                    }

                                    foreach ($grouped_data as $data) : ?>
                                        <tr>
                                            <td><?= $data['no'] ?></td>
                                            <td><?= $data['nama_produk'] ?></td>
                                            <td class="text-danger"><?= number_format($data['harga'], 0, ',', '.') ?></td>
                                            <td>
                                                <label class="badge badge-danger"><?= $data['status'] ?></label>
                                            </td>
                                            <td><?= $data['jumlah'] ?>x</td>

                                            <td>
                                                <a type="button" class="btn btn-inverse btn-icon" href="<?= base_url('pegawai/hapustransaksi/') . $dk->id_transaksi ?>">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $total_harga = $total_harga + $data['harga'] ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div><br>
                        <div style="display: flexbox;">
                            <a style="margin-right:5px" data-toggle="modal" data-target="#pilihdivisi" type="button" class="btn btn-primary btn-fw" href="">
                                Simpan
                            </a>
                            <label>Total : <?= number_format($total_harga, 0, ',', '.') ?></label>
                            <p></p>
                            <a style="margin-right:5px" data-toggle="modal" data-target="#pilihdivisi" type="button" class="btn btn-danger btn-fw" href="">
                                Hapus Semua
                            </a>
                        </div>

                    </div>


                </div>
            </div>
        </div>

    </div>
    <?php foreach ($data_produk as $dp) : ?>
        <div class="modal fade" id="formedit<?= $dp->id_produk; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= $dp->nama_produk ?></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>

                        </button>
                    </div>

                    <div class="modal-body" style="justify-content: center; text-align:center">

                        <div>
                            <img class="img-fluid" src="<?= base_url() ?>/data/produk/<?= $dp->gambar ?>" alt="" width="200rem" />
                        </div>
                        <br>
                        <form action="<?= base_url("pegawai/inputkasir/") . $dp->id_produk ?>" method="post">
                            <input type="number" style="border-radius: 20rem; background-color:#B2533E; text-align:center" name="jumlah">
                            <br><br>
                            <button type="submit" class="btn mr-2" style="background-color:#B2533E; color:white;">Simpan</button>
                        </form>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>