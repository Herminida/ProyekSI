    <div class="span9"> <!-- content span -->
      <div class="row">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#">Master Tindakan</a>
          </li>
         </ul>
        <div class="span7">
          <form class="well" name="frmKelompokTindakan" id="frmKelompokTindakan">
            <input type="hidden" id="id_tindakan" name="id_tindakan">
            <table>
              <tr>
                <td><label for="kode">Kelompok</label></td>
                <td> 
                  <select id="id_kelompok"></select>
                </td>
              </tr>
              <tr>
                <td><label for="nama">Klinik</label></td>
                <td><select id="id_klinik" name="id_klinik" disabled>
                    <option value="1">Anak</option>
                    <option value="2">IGD</option>
                    <option value="3">Dewasa</option>
                    <option value="4">Gizi</option>
                    <option value="5">Gigi</option>
                    <option value="6">Imunisasi</option>
                    <option value="7">Kebidanan</option>
                    <option value="8">KB</option>
                    <option value="10">Lansia</option>
          </select></td>
              </tr>
              <tr>
                <td><label for="kode">Tindakan</label></td>
                <td><input type="text" name="namatindakan" id="namatindakan" value=""></td>
              </tr>

            </table>
        <button class="btn btn-small" id="btnSimpan" name="btnSimpan">Simpan</button>
        <button type="button" class="btn btn-small" id="btnReset" name="btnReset" onclick="resetlink()">Reset</button>
         </form>
        </div>
       </div><!--/row-->
       <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">Daftar Kelompok Tindakan</span>
        </div>
        <div>
          <hr>
        </div>
      </div>
      <a class="btn btn-small" id="btnEdit" name="btnEdit" onclick="edit()">Edit</a>
      <a class="btn btn-small" id="btnHapus" name="btnHapus" onclick="hapus()">Hapus</a>
        <table class="table dataTable" id="tblKelompokTindakan">
        <thead>
          <tr>
            <th>Tindakan</th>
            <th>Kelompok</th>
            <th>Klinik</th>
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
    function isikelompok(){
      var items="";
      var purl = '<?php echo site_url("master/tindakan/ajaxKelompok");?>';
       $.getJSON(purl,function(kdatas){
       if (jQuery.isEmptyObject(kdatas)){
      }else{
        for(var i in kdatas){
          var kat = kdatas[i];
         items+="<option value='"+kat.id+"'>"+kat.tindakan_kelompok+"</option>";
       } 
         $("#id_kelompok option").remove();
         $("#id_kelompok").append(items); 
         $("#id_kelompok").trigger('change'); 
        }
        }
    );
    }

    function setklinikkelompok(){
      var items="";
      var purl = '<?php echo site_url("master/tindakan/ajaxKlinikKelompok");?>'+'/'+$('#id_kelompok').val();
       $.getJSON(purl,function(kdatas){
       if (jQuery.isEmptyObject(kdatas)){
      }else{
        $("#id_klinik").val(kdatas[0].id); 
        }
        }
    );
    }

   function edit(){
    resetlink();
    if(kelicdData){
    $('#namatindakan').val(kelicdData.namatindakan);
    $('#id_kelompok').val(kelicdData.id_kelompok)
    $('#klinik').val(kelicdData.id_klinik)
    $('#id_tindakan').val(kelicdData.id_tindakan)
    $("#id_kelompok").trigger('change'); 

    
    }else{
     alert('Silahkan pilih salah satu data');
    }
   }

   function hapus(){
    if(kelicdData){
    if(confirm('Yakin akan menghapus?')){
    data={ id_tindakan:kelicdData.id_tindakan};
     $.ajax({
            url: "<?php echo site_url('master/tindakan/hapustindakan')?>",
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

   $(document).on('click','#tblKelompokTindakan tr',function () 
  {
    kelicdData = oTable.fnGetData( this );
    $('#tblKelompokTindakan tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });


    $(function(){
  jQuery(document).ready(function(){
      isikelompok()
       $('#id_kelompok').change(function() {
            setklinikkelompok();
          });
       oTable=$('#tblKelompokTindakan').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('master/tindakan/getListTindakan')?>",
        "aoColumns": [
              { "mData": "namatindakan" },
              { "mData": "tindakan_kelompok" },
              { "mData": "nama_klinik" }
        ]
  });
      $('#frmKelompokTindakan').submit(function(){
        var err=false;
        if($('#nama_kelompok').val()==''||$('#kode_kelompok').val()=='') err=true;
        if(err){
          alert('Isian belum lengkap');
          return false;
        }else{
          data={
               namatindakan:$('#namatindakan').val()
              ,id_kelompok:$('#id_kelompok').val()
              ,id_tindakan:$('#id_tindakan').val()
            };
          $.ajax({
            url: '<?php echo site_url('master/tindakan/simpantindakan')?>',
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
                alert('data tindakan sudah ada')
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
      $('#frmKelompokTindakan input').val('');
      $('#frmKelompokTindakan select').val(1);
    }

   
    </script>
    