<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h2 class="page-title text-truncate text-dark font-weight-medium mb-1"> &nbsp; &nbsp; &nbsp; User Data</h2>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">

            <div class="customize-input float-right">
                <button class="btn waves-effect waves-light btn-rounded btn-success text-center" data-toggle="modal" data-target="#ModalaAdd">Add User</button>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
            </div>
        </div>
    </div>
</div>



<div class="container-fluid">
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status User</th>
                                    <th>Token Hardware</th>
                                    <th>HWID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $u) { //untuk menampilkan variabel data yang diangkut dari controller
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $u->name ?></td>
                                        <td><?php echo $u->HWID ?></td>
                                        <td> <?php if ($u->role_id == "1") {
                                                    echo "Admin";
                                                } else {
                                                    echo "User";
                                                } ?> </td>
                                        <td> <?php if ($u->is_active == "1") {
                                                    echo "Active";
                                                } else {
                                                    echo "Not Active";
                                                } ?> </td>
                                        <td><?php echo $u->token ?></td>
                                        <td><?php echo $u->HWID ?></td>

                                        <td><?php echo anchor('userdata/datasensor/' . $u->HWID, '<button type="button" class="btn btn-success text-center">History</button>'); ?> <h3> </h3> <?php echo anchor('userdata/monitoring/' . $u->HWID, '<button type="button" class="btn btn-info text-center">Monitoring</button>'); ?> <h3> </h3> 
                                        <?php echo anchor('userdata/fuzzyrule/' . $u->HWID, '<button type="button" class="btn btn-secondary text-center">Rule</button>'); ?> <h3> </h3> <?php echo anchor('userdata/perhitungan/' . $u->HWID, '<button type="button" class="btn btn-warning text-center">Perhitungan</button>'); ?> <h3> </h3>
                                             <?php echo anchor('userdata/edit/' . $u->HWID, '<button type="button" class="btn btn-primary text-center">Edit</button>'); ?> <h3> </h3> <?php echo anchor('userdata/hapus/' . $u->HWID, '<button type="button" class="btn btn-danger text-center">Delete User</button>'); ?>
                                        </td>

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
<!-- MODAL ADD -->
<div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Add User</h3>
            </div>
            <?php
            echo form_open_multipart('userdata/add', 'role="form" class="form-horizontal"');
            ?>
            <div class="modal-body">


                <div class="form-group">
                    <label class="control-label col-xs-3">Name</label>
                    <div class="col-xs-9">
                        <input type="text" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Email</label>
                    <div class="col-xs-9">
                        <input type="text" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Password</label>
                    <div class="col-xs-9">
                        <input type="text" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Role Id</label>
                    <div class="col-xs-9">
                        <select class="form-select" aria-label="role_id" name="role_id">
                            <option value="2">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Is Active</label>
                    <div class="col-xs-9">
                        <select class="form-select" aria-label="is_active" name="is_active">
                            <option value="0">Not Active</option>
                            <option value="1">Active</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-info" id="btn_simpan">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL ADD-->
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