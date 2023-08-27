<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center">
                        </div>
                    </div>
               <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
				<button class="btn waves-effect waves-light btn-rounded btn-primary text-center" data-toggle="modal" data-target="#ModalaAdd">Tambah Data</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <br/>
                <br/>
			</div>
				
			</div>
                </div>
            </div>
			
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                
           <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
				
                <div class="row">
				
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
			<div class="table-responsive">
            <table class="table">
               <thead>
                <tr>
                    <th>No</th>
                    <th>RH</th>
                    <th>Suhu Udara</th>
                    <th>Suhu Daun</th>
                    <th>Hasil VPD</th>
                    <th>Kontrol Suhu</th>
                    <th>Kontrol Kelembapan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="show_data">
                 
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
                <h3 class="modal-title" id="myModalLabel">TAMBAH DATA</h3>
            </div>
            <form>
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >RH</label>
                        <div class="col-xs-9">
                            <input name="rh" id="rh" class="form-control" type="text" placeholder="RH">
                        </div>
                    </div>
				
                  <div class="form-group">
                        <label class="control-label col-xs-3" >Suhu Udara</label>
                        <div class="col-xs-9">
                            <input name="suhu_udara" id="suhu_udara" class="form-control" type="text" placeholder="Suhu Udara">
                        </div>
                    </div>

					<div class="form-group">
                        <label class="control-label col-xs-3" >Suhu Daun</label>
                        <div class="col-xs-9">
                            <input name="suhu_daun" id="suhu_daun" class="form-control" type="text" placeholder="Suhu Daun">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Hasil VPD</label>
                        <div class="col-xs-9">
                            <input name="hasil_vpd" id="hasil_vpd" class="form-control" type="text" placeholder="Hasil VPD">
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kontrol Suhu</label>
                        <div class="col-xs-9">
                            <input name="kontrol_suhu" id="kontrol_suhu" class="form-control" type="text" placeholder="Kontrol Suhu">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kontrol Kelembapan</label>
                        <div class="col-xs-9">
                            <input name="kontrol_kelembapan" id="kontrol_kelembapan" class="form-control" type="text" placeholder="Kontrol Kelembapan">
                        </div>
                    </div>

                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->
 
        <!-- MODAL EDIT -->
        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Edit Data</h3>
            </div>
           <form>
                <div class="modal-body">
 
                <div class="form-group">
                        <label class="control-label col-xs-3" >RH</label>
                        <div class="col-xs-9">
                            <input name="rh_edit" id="rh_edit" class="form-control" type="text" placeholder="RH">
                        </div>
                    </div>
				
                  <div class="form-group">
                        <label class="control-label col-xs-3" >Suhu Udara</label>
                        <div class="col-xs-9">
                            <input name="suhu_udara_edit" id="suhu_udara_edit" class="form-control" type="text" placeholder="Suhu Udara">
                        </div>
                    </div>

					<div class="form-group">
                        <label class="control-label col-xs-3" >Suhu Daun</label>
                        <div class="col-xs-9">
                            <input name="suhu_daun_edit" id="suhu_daun_edit" class="form-control" type="text" placeholder="Suhu Daun">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Hasil VPD</label>
                        <div class="col-xs-9">
                            <input name="hasil_vpd_edit" id="hasil_vpd_edit" class="form-control" type="text" placeholder="Hasil VPD">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kontrol Suhu</label>
                        <div class="col-xs-9">
                            <input name="kontrol_suhu_edit" id="kontrol_suhu_edit" class="form-control" type="text" placeholder="Kontrol Suhu">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kontrol Kelembapan</label>
                        <div class="col-xs-9">
                            <input name="kontrol_kelembapan_edit" id="kontrol_kelembapan_edit" class="form-control" type="text" placeholder="Kontrol Kelembapan">
                        </div>
                    </div>

					<div class="form-group" hidden>
                        <label class="control-label col-xs-3" >ID</label>
                        <div class="col-xs-9">
                            <input name="id_edit" id="id_edit" class="form-control" type="text" placeholder="ID FORM" style="width:335px;" required>
                        </div>
                    </div>	
                    
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        </div>
        <!--END MODAL EDIT-->

         <!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
                    <form>
                    <div class="modal-body">
                                           
                            <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah anda yakin mau hapus data ini?</p></div>
                                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->
<script type="text/javascript">
    $(document).ready(function(){
        tampil_data_barang();   //pemanggilan fungsi tampil barang.
  
          
        //fungsi tampil barang
        function tampil_data_barang(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url()?>admin/data_data',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
					var o = 1;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+o+'</td>'+
                                '<td>'+data[i].rh+'</td>'+
                                '<td>'+data[i].suhu_udara+'</td>'+
								'<td>'+data[i].suhu_daun+'</td>'+
								'<td>'+data[i].hasil_vpd+'</td>'+
								'<td>'+data[i].kontrol_suhu+'</td>'+
								'<td>'+data[i].kontrol_kelembapan+'</td>'+
								
                                '<td>'+
                                    '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].id+'">Edit</a>'+' '+
									
                                    '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id+'">Hapus</a>'+
                                '</td>'+
                                '</tr>';
						o++;
                    }
					
                    $('#show_data').html(html);
                }
				
            });
        }
 
        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : 'GET',
                url  : '<?php echo base_url('admin/get_data')?>',
                dataType : 'JSON',
                data : {id:id},
                success: function(data){
                    $.each(data,function(rh, suhu_udara, suhu_daun, hasil_vpd, kontrol_suhu, kontrol_kelembapan, id){
                        $('#ModalEdit').modal('show');
                        $('[name="rh_edit"]').val(data.rh);
						$('[name="suhu_udara_edit"]').val(data.suhu_udara);
                        $('[name="suhu_daun_edit"]').val(data.suhu_daun);
                        $('[name="hasil_vpd_edit"]').val(data.hasil_vpd);
                        $('[name="kontrol_suhu_edit"]').val(data.kontrol_suhu);
                        $('[name="kontrol_kelembapan_edit"]').val(data.kontrol_kelembapan);
                        $('[name="id_edit"]').val(data.id);
                    });
                }
            });
            return false;
        });
 
 
        //GET HAPUS
        $('#show_data').on('click','.item_hapus',function(){
            var id =$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('#textkode').val(id);
        });
 
       
        
 
        //Hapus Ruang
        $('#btn_hapus').on('click',function(){
            var id =$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url()?>admin/hapus",
            dataType : "JSON",
                    data : {id: id},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                            tampil_data_barang();
                    }
                });
                return false;
            });
 
    

$('#btn_simpan').on('click',function(){
            var rh= $('#rh').val();
			var suhu_udara= $('#suhu_udara').val();
			var suhu_daun= $('#suhu_daun').val();
			var hasil_vpd= $('#hasil_vpd').val();
			var kontrol_suhu= $('#kontrol_suhu').val();
			var kontrol_kelembapan= $('#kontrol_kelembapan').val();

            
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/add')?>",
                dataType : "JSON",
                data : {rh:rh, suhu_udara:suhu_udara, suhu_daun:suhu_daun, hasil_vpd:hasil_vpd, kontrol_suhu:kontrol_suhu, kontrol_kelembapan:kontrol_kelembapan},
                success: function(data){
                    $('[name="rh"]').val("");
                    $('[name="suhu_udara"]').val("");
					$('[name="suhu_daun"]').val("");
					$('[name="hasil_vpd"]').val("");
					$('[name="kontrol_suhu"]').val("");
					$('[name="kontrol_kelembapan"]').val("");
                    $('#ModalaAdd').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });

         $('#btn_update').on('click',function(){
            var rh= $('#rh_edit').val();
			var suhu_udara= $('#suhu_udara_edit').val();
			var suhu_daun= $('#suhu_daun_edit').val();
			var hasil_vpd= $('#hasil_vpd_edit').val();
			var kontrol_suhu= $('#kontrol_suhu_edit').val();
			var kontrol_kelembapan= $('#kontrol_kelembapan_edit').val();
			var id=$('#id_edit').val();
            
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/edit')?>",
                dataType : "JSON",
                data : {rh:rh, suhu_udara:suhu_udara, suhu_daun:suhu_daun, hasil_vpd:hasil_vpd, kontrol_suhu:kontrol_suhu, kontrol_kelembapan:kontrol_kelembapan, id:id},
                success: function(data){
                    $('[name="rh_edit"]').val("");
                    $('[name="suhu_udara_edit"]').val("");
					$('[name="suhu_daun_edit"]').val("");
					$('[name="hasil_vpd_edit"]').val("");
					$('[name="kontrol_suhu_edit"]').val("");
					$('[name="kontrol_kelembapan_edit"]').val("");
                   $('[name="id_edit"]').val("");
                    $('#ModalEdit').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });
}); 
</script>