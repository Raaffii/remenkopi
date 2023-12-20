<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Vendor</h4>
                    <a href="<?= base_url('pegawai/exportToExcel') ?>" class="btn btn-success">Export to Excel</a>
                    <a href="<?= base_url('cek.xlsx'); ?>" download> <i class="mdi mdi mdi-eye menu-icon"></i></a>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Tanggal</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($data_transaksi as $dp) : ?>
                                    <?php
                                    $tanggal_transaksi = new DateTime($dp->tanggal);
                                    $tanggal_sekarang = new DateTime();


                                    $is_sama_hari = $tanggal_transaksi->format('Y-m-d') === $tanggal_sekarang->format('Y-m-d');


                                    $background_color = $is_sama_hari ? 'background-color: #ABDBDB;' : '';
                                    ?>

                                    <tr style="<?= $background_color ?>">
                                        <td><?= $dp->nama_produk ?></td>
                                        <td><?= $dp->tanggal ?></td>
                                        <td><?= $dp->stock ?></td>
                                        <td><?= $dp->harga ?></td>
                                        <td class="py-1">
                                            <img src="<?= base_url('data/produk/') ?><?= $dp->gambar ?>" alt="image" />
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