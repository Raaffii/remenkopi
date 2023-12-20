<div class="main-panel">
    <div class="page-header diva content-wrapper flex-wrap p-3 m-0">
        <div class="header-left d-flex align-items-center" style="display:inline-flex;">
            <h4 style="font-weight:bold; color:#B2533E; text-align:center; margin:auto 2em auto 1em;">Event</h4>
        </div>
        <div class="header m-0 w-50">
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Search" />

        </div>

        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
            <button type="button" data-toggle="modal" data-target="#tambahevent" class="btn mt-2 mt-sm-0 btn-icon-text">
                <i class="fa fa-plus-square-o fa-fw"></i> Tambah Event </button>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <?= $this->session->flashdata('message') ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Event</h4>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Event</th>
                                    <th>Waktu</th>
                                    <th>Tanggal</th>
                                    <th>Deskripsi</th>
                                    <th>Status Posting</th>
                                    <th>Posting</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php $cek = 0; ?>
                                <?php foreach ($data_event as $de) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $de->nama_event ?></td>
                                        <td><?= $de->waktu ?></td>
                                        <td><?= date('l, d F Y', strtotime($de->tanggal)) ?></td>
                                        <td><?= $de->deskripsi ?></td>
                                        <td><?= $de->posting ?></td>
                                        <?php if ($de->posting == 0) : ?>
                                            <td><a href="<?= base_url('admin/post/') ?><?= $de->id_event ?>">Post</a></td>
                                        <?php else :  ?>
                                            <td><a href="<?= base_url('admin/unpost/') ?><?= $de->id_event ?>">Unpost</a></td>
                                        <?php endif ?>
                                        <td>status</td>
                                        <td><i class="fa fa-solid fa-faw fa-pencil fa-lg" type="button" data-toggle="modal" data-target="#formeditevent<?= $de->id_event; ?>"></i>
                                            <i class="fa fa-solid fa-trash fa-fw fa-lg red" style="color:red;" type="button" data-toggle="modal" data-target="#hapusevent<?= $de->id_event; ?>"></i>
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
<div class="modal fade" id="tambahevent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Event</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="forms-sample" method="post" action="<?php echo site_url('admin/tambah_event') ?>" enctype="multipart/form-data">
                    <div class="form-group row g-3">
                        <div class="col-md-12">
                            <div id="form-group">
                                <label for="nama_event">Nama Event</label>
                                <input class="typeahead" type="text" placeholder="Nama" name="nama_event" id="nama_event">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row g-3">
                        <div class="col-md-12">
                            <div id="form-group">
                                <label for="waktu">Waktu</label>
                                <input class="form-control" type="text" placeholder="Waktu" onfocus="this.type='time'" onblur="this.type='text'" name="waktu" id="waktu">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row g-3">
                        <div class="col-md-12">
                            <div id="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input class="typeahead" type="text" placeholder="Tanggal" onfocus="this.type='date'" onblur="this.type='text'" name="tanggal" id="Tanggal">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row g-3">
                        <div class="col-md-12">
                            <div id="form-group">
                                <label for="Status">Status</label>
                                <input class="typeahead" type="text" placeholder="Status" name="Status" id="Status">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row g-3">
                        <div class="col-md-12">
                            <div id="form-group">
                                <label for="userfile">Deskripsi</label>
                                <textarea class="form-control" id="exampleTextarea1" rows="4" name="deskripsi"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row g-3">
                        <div class="col-md-12">
                            <div id="form-group">
                                <label for="userfile">Pilih Foto:</label>
                                <input type="file" name="userfile" size="20" name="foto" />
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

<?php foreach ($data_event as $de) : ?>
    <div class="modal fade" id="formeditevent<?= $de->id_event; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>

                    </button>
                </div>

                <div class="modal-body">
                    <form class="forms-sample" method="post" action="<?php echo site_url('admin/edit_event') ?>" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="id_event" value=" <?php echo $de->id_event ?> ">
                        <div class="form-group row g-3">
                            <div class="col-md-12">
                                <div id="form-group">
                                    <label for="nama_event">Nama Event</label>
                                    <input class="typeahead" type="text" placeholder="Nama" name="nama_event" value="<?php echo $de->nama_event ?>" id="nama_event">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row g-3">
                            <div class="col-md-12">
                                <div id="form-group">
                                    <label for="waktu">Waktu</label>
                                    <input class="form-control" type="text" placeholder="Waktu" onfocus="this.type='time'" onblur="this.type='text'" name="waktu" value="<?php echo $de->waktu ?>" id="waktu">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row g-3">
                            <div class="col-md-12">
                                <div id="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input class="typeahead" type="text" placeholder="Tanggal" onfocus="this.type='date'" onblur="this.type='text'" name="tanggal" value="<?php echo $de->tanggal ?>" id="Tanggal">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row g-3">
                            <div class="col-md-12">
                                <div id="form-group">
                                    <label for="Status">Status</label>
                                    <input class="typeahead" type="text" placeholder="Status" name="Status" value="<?php echo $de->status ?>" id="Status">
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

<?php foreach ($data_event as $de) : ?>
    <!-- Logout Modal-->
    <div class="modal fade" id="hapusevent<?= $de->id_event; ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color:#D1D4D8;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Hapus Data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="d-flex align-items-center justify-content-center p-4">
                    <a class="btn but1" href="<?= base_url('admin/hapus_event/' . $de->id_event) ?>">Hapus</a>
                    <button class="btn but m-1" type="button" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>