<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Less use only-->
  <!-- <link href="<?php echo base_url();?>resource/css/default.less" rel="stylesheet/less" type="text/css"> -->
  <!-- Less  end-->
 <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
  
  <link href="<?php echo base_url();?>resource/css/bootstrap-formhelpers.css" rel="stylesheet" type="text/css">
  
 <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.css" />
            <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap-responsive.min.css" />
  <link href="<?php echo base_url();?>resource/css/facebox.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/tabletools.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/jquery.datatables.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/jquery.jqplot.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/jquery.datatables.rowgrouping.css" rel="stylesheet" type="text/css">
  

  <script src ="<?php echo base_url();?>resource/js/jquery.js"></script>
  <script src ="<?php echo base_url();?>resource/js/datatablenightly.js"></script>
  <script src ="<?php echo base_url();?>resource/js/tabletools.min.js"></script>
  <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
  <script src ="<?php echo base_url();?>resource/js/jquery.datatables.rowgrouping.js"></script>
  <script src ="<?php echo base_url();?>resource/js/jquery.jqplot.min.js"></script>
  <script src ="<?php echo base_url();?>resource/js/plugins/jqplot.json2.min.js"></script>

    


<script type="text/javascript">


diData='';
function cariGaji(){
  jTable.fnFilter($('#cariGaji').val());
}

  
function tampilModalICD(){

   jTable.fnFilter('');
  $('#modalICD').modal({
    backdrop:false
  })
}


function edit(){
    if(diData){
    $('#frmDiagnosa input[name="id_gaji_pegawai"]').val(diData.id_gaji_pegawai);
    $('#frmDiagnosa input[name="gaji_id"]').val(diData.gaji_id);
    $('#frmDiagnosa input[name="nama_gaji"]').val(diData.nama_gaji);
    $('#frmDiagnosa input[name="nilai_gaji"]').val(diData.nilai_gaji);
    }else{
      alert('Silahkan pilih salah satu Gaji');
    }
  }

$(document).on('click','#tblDiagnosa tr',function () 
  {
    
    diData = oTable.fnGetData(this);
    console.log(diData);
    $('#tblDiagnosa tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });

$(document).on('click','#tblListICD tr',function () 
  {
    icData = jTable.fnGetData( this );
    $('#tblListICD tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });

$(document).ready(function(){  

	var pegawai_id = $('#frmDiagnosa input[name="id_pegawai"]').val()


	oTable=$('#tblDiagnosa').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('hrd/'.'gaji_pegawai/ajaxListGajiPegawai')?>"+'/'+pegawai_id,
        "aoColumns": [
            { "mData": "nama_gaji" },
            { "mData": "nilai_gaji" }
        ]
  });
  
  
    jTable=$('#tblListICD').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
      //"sScrollY":"200px",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('hrd/'.'gaji_pegawai/ajaxListGaji')?>",
        "aoColumns": [
            { "mData": "nama_gaji" }
           
           
        ]
  });
    //var j = new FixedHeader(jTable);
 
});

  function hapus(){
    var gaji_pegawai  =  diData.id_gaji_pegawai;
    var data={
                id_gaji_pegawai:gaji_pegawai,
            };
      $.ajax({
        
                method:"post",
                dataType: 'json',
                url :"<?php echo base_url();?>hrd/gaji_pegawai/hapus",
                data:data,
                    success : function (data) {
                    if (data.success) {
                           alert("Gaji Berhasil Dihapus");
                            oTable.fnClearTable();
                                }
                                else {
                                 alert("Gaji Gagal Dihapus");
                                }
                            }


                        });


  }

  function simpan(){
    
  	var nilai_gaji = $("#nilai_gaji").val();
  	var gaji_id = $("#gaji_id").val();

  	if (gaji_id=="") {

  		alert("Pilih Gaji Terlebih Dahulu");
         $("#nama_gaji").focus();
  	}

       else if (nilai_gaji=="") {
        alert("Nilai Gaji Masih Kosong");
         $("#nilai_gaji").focus();

        }
        else {


          data={
                pegawai_id:$('#frmDiagnosa input[name="id_pegawai"]').val(),
                id_gaji_pegawai:$('#frmDiagnosa input[name="id_gaji_pegawai"]').val(),
                gaji_id:gaji_id,
                 nilai_gaji:$('#nilai_gaji').val(),

                
            };
            console.log(data);
          $.ajax({

            url: "<?php echo site_url('hrd/'.'gaji_pegawai/simpanGaji')?>",
            data: data,
            method:'post',
            dataType: 'json',
            success: function(data){
              if(data.success){
                alert('data telah disimpan');
                $('#nilai_gaji').val("");
                $('#nama_gaji').val("");
                $('#gaji_id').val("");
                  oTable.fnClearTable();
                 diData="";
        reset();
              }
            },
          });
           }
        return false;
       
      };

 function cekGaji(){

	var pegawai_id = $('#id_pegawai').val();
	var gaji_id = icData.id_gaji
	var nama_gaji = icData.nama_gaji

	$.ajax({
            type:"POST",
                url :"<?php echo base_url();?>hrd/gaji_pegawai/cek",
                async:false,
                data:"pegawai_id="+pegawai_id+"&gaji_id="+gaji_id,
                    success : function (data) {
                    if (data>0) {
                           alert("Pegawai Sudah Mendapat "+nama_gaji+" ");
                           	return false;
                			          }else
                                {
                                   $('#frmDiagnosa input[name="gaji_id"]').val(icData.id_gaji);
                                   $('#frmDiagnosa input[name="nama_gaji"]').val(icData.nama_gaji);
                                   $('#modalICD').modal('hide');
   
                                  return true;                                 ;
                                }
                            }


                        });


};


</script>
</head>
<body>
<div class="span10">
  <br/>
	<form class="well well-small" name="frmDiagnosa" id="frmDiagnosa">
    <input type="hidden" name="id_pegawai" id="id_pegawai" value='<?php echo $id_pegawai ?>'>
    <input type="hidden" name="id_gaji_pegawai" id="id_gaji_pegawai" value=''>
		<table>
			<tr>
				<td><label for="nip_pegawai">Nip Pegawai</label></td>
				<td><input type="text" class="span3" id="nip_pegawai" name="nip_pegawai" value="<?php echo $nip_pegawai ?>" readonly="true"></td>
			</tr>
			<tr>
				<td><label for="nip_pegawai">Nama Pegawai</label></td>
				<td><input type="text" class="span3" id="nama_pegawai" name="nama_pegawai" value="<?php echo $nama_pegawai ?>" readonly="true"></td>
			</tr>
			<tr>
				<td><label for="nama_jabatan">Jabatan</label></td>
				<td><input type="text" class="span3" id="nama_jabatan" name="nama_jabatan" value="<?php echo $nama_jabatan ?>" readonly="true"></td>
			</tr>
			<tr>
        <input type="hidden" name="gaji_id" id="gaji_id" value=''>
				<td><label for="frmDiagnosaICD">Pilih Gaji</label></td>
				<td>
          <div class="input-append">
          <input type="text" class="span3" id="nama_gaji" name="nama_gaji">
          <a class="btn btn-small" type="button"  onclick="tampilModalICD();" data-toggle="modal"><i class="icon-search"></i></a>
        </div>
        </td>
			</tr>
			<tr>
				<td><label for="nilai_gaji">Nilai Gaji</label></td>
				<td><input type="text" class="span3" id="nilai_gaji" name="nilai_gaji" val=""></td>
			</tr>
			
			</table>
			<button ="btn btn-small" type="button" name="btnGajiSimpan" id="btnGajiSimpan" onclick="simpan()">Simpan</button>

      </form>   
      <button ="btn btn-small" name="btnGajiEdit" id="btnGajiEdit" onclick="edit()">Edit</button>
      <button ="btn btn-small" name="btnGajiHapus" id="btnGajiHapus" onclick="hapus();">Hapus</button>

	<table class="datatable" id="tblDiagnosa" name="tblDiagnosa" >
          <thead>
            <tr>
              <th>Nama Gaji</th>
              <th>Nilai Gaji</th>
             
            </tr>
          </thead>
          <tbody>
         </tbody>
        </table>
    </div>

   <div id="modalICD" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
  <div class="input-append">
<input type="text" id="cariGaji">
<button id="btnCariPenyakit" name="btnCariGaji" onclick="cariGaji();">Cari</button>
</div>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
  <table id="tblListICD" name="tblListICD" class="table datatable">
          <thead>
            <tr>
             
             <th>Nama Gaji</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
</div>
<div class="modal-header">
<button class="btn" onClick="cekGaji();">Pilih</button>
</div>


<script src ="<?php echo base_url();?>resource/js/bootstrap.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/bootstrap.datepicker.js"></script>
    <script src ="<?php echo base_url();?>resource/js/bootstrap.timepicker.js"></script>
    <script src ="<?php echo base_url();?>resource/js/facebox.js"></script>
    <script src ="<?php echo base_url();?>resource/js/colreorderwithresize.js"></script>
    <script src ="<?php echo base_url();?>resource/js/printthis.js"></script>
    <script src ="<?php echo base_url();?>resource/js/printarea.js"></script>
    <script src ="<?php echo base_url();?>resource/js/fixedheader.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/plugins/jqplot.barRenderer.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/plugins/jqplot.dateAxisRenderer.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/plugins/jqplot.canvasTextRenderer.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/plugins/jqplot.enhancedLegendRenderer.min.js"></script>
    
    
    <!-- Less -->
    <!-- <script src ="<?php echo base_url();?>resource/js/less.min.js"></script> -->
</body>
</html>
