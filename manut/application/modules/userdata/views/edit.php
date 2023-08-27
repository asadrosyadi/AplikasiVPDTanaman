<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <center> <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> Fuzzy Rule</h4></center> </br>

    <div class="row">
        <div class="col-lg-8">
        <?php
        foreach ($rule as $r) { //untuk menampilkan variabel data yang diangkut dari controller
        ?>
            <?= form_open_multipart('userdata/fuzzyrule/' . $r->HWID); ?>
            <div class="form-group row" disabled>
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $r->email; ?>" readonly>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row" hidden> 
                <label for="name" class="col-sm-2 col-form-label">Nama Pengguna :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" readonly>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="HWID" class="col-sm-2 col-form-label">HWID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="HWID" name="HWID" value="<?= $r->HWID; ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Min RH (a)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="min_rh" name="min_rh" value="<?= $r->min_rh; ?>">
                    <?= form_error('min_rh', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Mid RH (b)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="mid_rh" name="mid_rh" value="<?= $r->mid_rh; ?>">
                    <?= form_error('mid_rh', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Mid2 RH (c)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="mid2_rh" name="mid2_rh" value="<?= $r->mid2_rh; ?>">
                    <?= form_error('mid2_rh', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Max RH (d)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="max_rh" name="max_rh" value="<?= $r->max_rh; ?>">
                    <?= form_error('max_rh', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Min Suhu Udara (a)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="min_suhu_udara" name="min_suhu_udara" value="<?= $r->min_suhu_udara; ?>">
                    <?= form_error('min_suhu_udara', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Mid Suhu Udara (b)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="mid_suhu_udara" name="mid_suhu_udara" value="<?= $r->mid_suhu_udara; ?>">
                    <?= form_error('mid_suhu_udara', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Mid2 Suhu Udara (c)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="mid2_suhu_udara" name="mid2_suhu_udara" value="<?= $r->mid2_suhu_udara; ?>">
                    <?= form_error('mid2_suhu_udara', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Max Suhu Udara (d)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="max_suhu_udara" name="max_suhu_udara" value="<?= $r->mid_suhu_udara; ?>">
                    <?= form_error('max_suhu_udara', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Min Suhu Daun (a)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="min_suhu_daun" name="min_suhu_daun" value="<?= $r->min_suhu_daun; ?>">
                    <?= form_error('min_suhu_daun', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Mid Suhu Daun (b)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="mid_suhu_daun" name="mid_suhu_daun" value="<?= $r->mid_suhu_daun; ?>">
                    <?= form_error('mid_suhu_daun', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Mid2 Suhu Daun (c)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="mid2_suhu_daun" name="mid2_suhu_daun" value="<?= $r->mid2_suhu_daun; ?>">
                    <?= form_error('mid2_suhu_daun', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Max Suhu Daun (d)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="max_suhu_daun" name="max_suhu_daun" value="<?= $r->max_suhu_daun; ?>">
                    <?= form_error('max_suhu_daun', '<small class=                                                                                                                                                                                                                "text-danger pl-3">', '</small>'); ?>
                </div>
            </div>


            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Waktu Jeada Pembacaan Sensor</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jeda_pembacaan" name="jeda_pembacaan" value="<?= $r->jeda_pembacaan; ?>">
                    <?= form_error('jeda_pembacaan', '<small class="text-danger pl-3">', '</small>'); ?>
                    <h6>dalam hitungan menit. </h6>

                </div>
            </div>


            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>


            </form>

            <?php } ?>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->