    <div class="span9"> <!-- content span -->
      <div class="row">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#">Master Kelompok ICDX</a>
          </li>
         </ul>
        <div class="span7">
          <form class="well" name="frmKelompokIcdx" id="frmKelompokIcdx">
            <input type="hidden" id="id_kelompok" name="id_kelompok">
            <table>
              <tr>
                <td><label for="kode">Kode Kelompok</label></td>
                <td><input type="text" name="kode_kelompok" id="kode_kelompok" value=""></td>
              </tr>
              <tr>
                <td><label for="nama">Nama Kelompok</label></td>
                <td><input type="text" name="nama_kelompok" id="nama_kelompok" value=""></td>
              </tr>
            </table>
        <button class="btn btn-small" id="btnSimpan" name="btnSimpan">Simpan</button>
        <button type="button" class="btn btn-small" id="btnReset" name="btnReset" onclick="resetlink()">Reset</button>
         </form>
        </div>
       </div><!--/row-->
       <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">Daftar Kelompok ICDX</span>
        </div>
        <div>
          <hr>
        </div>
      </div>
      <a class="btn btn-small" id="btnEdit" name="btnEdit" onclick="edit()">Edit</a>
      <a class="btn btn-small" id="btnHapus" name="btnHapus" onclick="hapus()">Hapus</a>
        <table class="table dataTable" id="tblKelompokIcdx">
        <thead>
          <tr>
            <th>Kode</th>
            <th>Nama</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
 </div>
 <!--/span9-->
 
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
   

   function edit(){
    resetlink();
    if(kelicdData){
      $('#nama_kelompok').val(kelicdData.nama_kelompok);
    $('#id_kelompok').val(kelicdData.kode_kelompok)
    $('#kode_kelompok').val(kelicdData.kode_kelompok)

    
    }else{
     alert('Silahkan pilih salah satu data');
    }
   }

   function hapus(){
    if(kelicdData){
    if(confirm('Yakin akan menghapus?')){
    data={ id_kelompok:kelicdData.kode_kelompok};
     $.ajax({
            url: "<?php echo site_url('master/icdx/hapuskelompok')?>",
            data: data,
            method:'post',
            dataType: 'json',

            success: function(obj){
              if(obj.success){
                oTable.fnDeleteRow(oTable.fnGetPosition(row));
                alert('data sudah dihapus');
                resetlink();
              }
            },
          });
kelicdData='';
    }
      }else{
      alert('Silahkan pilih salah satu data');
    }
   }

   $(document).on('click','#tblKelompokIcdx tr',function () 
  {
    kelicdData = oTable.fnGetData( this );
    $('#tblKelompokIcdx tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });


    $(function(){
  jQuery(document).ready(function(){

       oTable=$('#tblKelompokIcdx').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('master/icdx/getListKelompok')?>",
        "aoColumns": [
              { "mData": "kode_kelompok" },
              { "mData": "nama_kelompok" }
        ]
  });
      $('#frmKelompokIcdx').submit(function(){
        var err=false;
        if($('#nama_kelompok').val()==''||$('#kode_kelompok').val()=='') err=true;
        if(err){
          alert('Isian belum lengkap');
          return false;
        }else{
          data={
               nama_kelompok:$('#nama_kelompok').val()
              ,id_kelompok:$('#id_kelompok').val()
              ,kode_kelompok:$('#kode_kelompok').val()
            };
          $.ajax({
            url: '<?php echo site_url('master/icdx/simpankelompok')?>',
            data: data,
            method:'post',
            dataType: 'json',
            success: function(obj){
              if(obj.success){
                 alert('data sudah tersimpan');
                 oTable.fnClearTable();
                 oTable.fnDraw();
                 resetlink();
                 kelicdData ='';
              }else{
                alert('data icdx sudah ada')
              }
            },
          });
        }
        return false;
      });

      resetlink();
  });
});

    function resetlink(){
      $('#frmKelompokIcdx input').val('');
    }

   
    </script>
    