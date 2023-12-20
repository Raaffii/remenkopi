<div class="main-panel">

    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pesan, Kritik Dan Saran</h4>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Pesan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($data_pesan as $dp) : ?>

                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $dp->name ?></td>
                                        <td>
                                            <?= $dp->email ?>
                                        </td>
                                        <td><?= $dp->phone ?></td>
                                        <td><?= $dp->pesan ?></td>
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