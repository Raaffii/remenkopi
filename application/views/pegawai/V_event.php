<div class="main-panel">
    <div class="content-wrapper pb-0">
        <div class="1 or 2" style="display: flex;">
            <div class="1">
                <div class="row">
                    <div class="col-sm-4 stretch-card grid-margin" style="width: 3500px;">

                        <div class="col-sm-6 col-xl-4 stretch-card grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title mb-2">Upcoming events</div>

                                    <h3 class="mb-3">-</h3>
                                    <?php foreach ($data_event as $de) : ?>
                                        <div class="d-flex border-bottom border-top py-3">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" checked /></label>
                                            </div>
                                            <div class="ps-2">
                                                <span class="font-12 text-muted"><?= $de->tanggal; ?></span>
                                                <p class="m-0 text-black"> <?= $de->nama_event; ?> </p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>