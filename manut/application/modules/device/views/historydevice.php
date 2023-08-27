<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h2 class="page-title text-truncate text-dark font-weight-medium mb-1"> &nbsp; &nbsp; &nbsp; <?= $title; ?></h2>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                </nav>
            </div>
        </div>
    </div>
</div>
</br>


<div class="container-fluid">

<?php echo anchor('device/rh/', '<button type="button" class="btn btn-success text-center">Grafik RH</button>'); ?>  &nbsp;
<?php echo anchor('device/suhu_udara/', '<button type="button" class="btn btn-info text-center">Grafik Suhu Udara</button>'); ?> &nbsp;
<?php echo anchor('device/suhu_daun/', '<button type="button" class="btn btn-secondary text-center">Grafik Suhu Daun</button>'); ?>&nbsp;
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="table table-hover">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Time</th>
                                    <th>RH</th>
                                    <th>Suhu Udara</th>
                                    <th>Suhu Daun</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $u) { //untuk menampilkan variabel data yang diangkut dari controller
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $u->time ?></td>
                                        <td><?php echo $u->rh ?></td>
                                        <td><?php echo $u->suhu_udara ?></td>
                                        <td><?php echo $u->suhu_daun ?></td>
                                        <td>  </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'csv'
            ]
        });
    });
</script>