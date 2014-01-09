<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

 <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.css" />
            <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap-responsive.min.css" />

           <link href="<?php echo base_url();?>resource/css/tabletools.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/jquery.datatables.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/jquery.jqplot.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/jquery.datatables.rowgrouping.css" rel="stylesheet" type="text/css">

 <script src ="<?php echo base_url();?>resource/js/jquery.js"></script>
  
<script src ="<?php echo base_url();?>resource/js/bootstrap.min.js"></script>
<script src ="<?php echo base_url();?>resource/js/datatablenightly.js"></script>
    <script src ="<?php echo base_url();?>resource/js/tabletools.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/jquery.datatables.rowgrouping.js"></script>
    <script src ="<?php echo base_url();?>resource/js/jquery.jqplot.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/plugins/jqplot.json2.min.js"></script>

 



</head>
<body>
<div class="span10">
  <br/>
	<form class="well well-small" name="frmDiagnosa" id="frmDiagnosa">
    <input type="hidden" name="id_pegawai" id="id_pegawai" value='<?php echo $id_pegawai ?>'>
    <input type="hidden" name="id_tunjangan_pegawai" id="id_tunjangan_pegawai" value=''>
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
        <input type="hidden" name="tunjangan_id" id="tunjangan_id" value=''>
				<td><label for="frmDiagnosaICD">Pilih Tunjangan</label></td>
				<td>
          <div class="input-append">
          <input type="text" class="span3" id="nama_tunjangan" name="nama_tunjangan">
          <a class="btn btn-small" type="button"  onclick="tampilModalICD();" data-toggle="modal"><i class="icon-search"></i></a>
        </div>
        </td>
			</tr>
			<tr>
				<td><label for="nilai_tunjangan">Nilai Tunjangan</label></td>
				<td><input type="text" class="span3" id="nilai_tunjangan" name="nilai_tunjangan" val=""></td>
			</tr>
			
			</table>
			<button ="btn btn-small" type="button" name="btnTunjanganSimpan" id="btnTunjanganSimpan">Simpan</button>

      </form>   
      <button ="btn btn-small" name="btnTunjanganEdit" id="btnTunjanganEdit" onclick="edit()">Edit</button>
      <button ="btn btn-small" name="btnTunjanganHapus" id="btnTunjanganHapus" onclick="hapus();">Hapus</button>

	<table class="datatable" id="tblDiagnosa" name="tblDiagnosa" >
          <thead>
            <tr>
              <!-- <th>Kode Tunjangan</th> -->
              <th>Nama Tunjangan</th>
              <th>Nilai Tunjangan</th>
             
            </tr>
          </thead>
          <tbody>
         </tbody>
        </table>
    </div>

   <div id="modalICD" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
  <div class="input-append">
<input type="text" id="cariTunjangan">
<button id="btnCariPenyakit" name="btnCariTunjangan" onclick="cariTunjangan();">Cari</button>
</div>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
  <table id="tblListICD" name="tblListICD" class="table datatable">
          <thead>
            <tr>
             
             <th>Nama Tunjangan</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
</div>
<div class="modal-header">
<button class="btn" onClick="pilihICD();">Pilih</button>
</div>



    <script type="text/javascript">


diData='';
function cariTunjangan(){
  jTable.fnFilter($('#cariTunjangan').val());
}

  
function tampilModalICD(){

   jTable.fnFilter('');
  $('#modalICD').modal({
    backdrop:false
  })
}

function pilihICD(){
    $('#frmDiagnosa input[name="tunjangan_id"]').val(icData.id);
    $('#frmDiagnosa input[name="nama_tunjangan"]').val(icData.nama_tunjangan);
    $('#modalICD').modal('hide');

}

function reset(){
    $('#frmDiagnosa input[name="tunjangan_id"]').val(diData.tunjangan_id);
    /*$('#frmDiagnosa input[name="id_pegawai"]').val('');*/
    $('#frmDiagnosa input[name="nama_tunjangan"]').val('');
    $('#frmDiagnosa input[name="nilai_tunjangan"]').val('');
   
    
  }

  function hapus(){
  if(diData){
  if(confirm('Yakin akan menghapus?')){
  //start hapus
   data={ idTunjanganPegawai:diData.id_tunjangan_pegawai};
     $.ajax({
            url: "<?php echo site_url('hrd/'.'tunjangan_pegawai/deleteTunjanganPegawai')?>",
            data: data,
            method:'post',
            dataType: 'json',

            success: function(obj){
              if(obj.success){
                oTable.fnDeleteRow(oTable.fnGetPosition(row));
                alert('data sudah dihapus');
                reset();
              }
            },
          });
diData='';
//end hapus
        };
        }else{
      alert('Silahkan pilih salah satu tunjangan');
    }
}

function edit(){
    if(diData){
    reset();
    $('#frmDiagnosa input[name="id_tunjangan_pegawai"]').val(diData.id_tunjangan_pegawai);
    $('#frmDiagnosa input[name="tunjangan_id"]').val(diData.tunjangan_id);
    $('#frmDiagnosa input[name="nama_tunjangan"]').val(diData.nama_tunjangan);
    $('#frmDiagnosa input[name="nilai_tunjangan"]').val(diData.nilai_tunjangan);
    }else{
      alert('Silahkan pilih salah satu Tunjangan');
    }
  }

$(document).on('click','#tblDiagnosa tr',function () 
  {
    diData = oTable.fnGetData(this);
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
        "sAjaxSource": "<?php echo site_url('hrd/'.'tunjangan_pegawai/ajaxListTunjanganPegawai')?>"+'/'+pegawai_id,
        "aoColumns": [
        //id_diagnosa,register,icd,time_diagnosa,kasus,kode_penyakit,nama_penyakit,nama_subkelompok,subkelompok,nama_kelompok,kelompok
           /* { "mData": "tunjangan_id" },*/
            { "mData": "nama_tunjangan" },
            { "mData": "nilai_tunjangan" }
            
        ]
  });
  
  
    jTable=$('#tblListICD').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
      //"sScrollY":"200px",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('hrd/'.'tunjangan_pegawai/ajaxListTunjangan')?>",
        "aoColumns": [
            { "mData": "nama_tunjangan" }
           
           
        ]
  });
    //var j = new FixedHeader(jTable);
 
});






  $('#btnTunjanganSimpan').click(function(){

    var nilai_tunjangan = $("#nilai_tunjangan").val();
    var tunjangan_id = $("#tunjangan_id").val();

    if (tunjangan_id=="") {

      alert("Pilih Tunjangan Terlebih Dahulu");
         $("#nama_tunjangan").focus();
    }

       else if (nilai_tunjangan=="") {
        alert("Nilai Tunjangan Masih Kosong");
         $("#nilai_tunjangan").focus();

        }
        else {


          data={

                id_tunjangan_pegawai:$('#frmDiagnosa input[name="id_tunjangan_pegawai"]').val(),
                pegawai_id:$('#frmDiagnosa input[name="id_pegawai"]').val(),
                tunjangan_id:$('#frmDiagnosa input[name="tunjangan_id"]').val(),
                 nilai_tunjangan:$('#nilai_tunjangan').val(),

                
            };
            console.log(data);
          $.ajax({

            url: "<?php echo site_url('hrd/'.'tunjangan_pegawai/simpanTunjangan')?>",
            data: data,
            method:'post',
            dataType: 'json',
            success: function(data){
              if(data.success){
                alert('data telah disimpan');
                $('#nilai_tunjangan').val("");
                $('#nama_tunjangan').val("");
                $('#tunjangan_id').val("");
                oTable.fnClearTable();
                
      diData="";
        reset();
              }
            },
          });
           }
        return false;
       
      });

$('#nilai_tunjangan').click(function(){

  var pegawai_id = $('#id_pegawai').val();
  var tunjangan_id = $('#tunjangan_id').val();
  var nama_tunjangan = $('#nama_tunjangan').val();

  var nilai_tunjangan = $('#nilai_tunjangan').val();

  if (nilai_tunjangan!=""){

  }
  else {
    $.ajax({
            type:"POST",
                url :"<?php echo base_url();?>hrd/tunjangan_pegawai/cek",
                data:"pegawai_id="+pegawai_id+"&tunjangan_id="+tunjangan_id,
                    success : function (data) {

                    if (data>0) {
                           alert("Pegawai Sudah Mendapat "+nama_tunjangan+" ");
                            
                      $('#nama_tunjangan').val("");
                      $('#tunjangan_id').val("");
                      $("#nama_tunjangan").focus();
                                }
                                else {
                                    $("#nilai_tunjangan").focus();
                                }
                            }


                        });

  }

  

});


</script>
</body>
</html>
