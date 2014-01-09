    <div class="span9"> <!-- content span -->
      <div class="row">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#">Master Penyakit ICDX</a>
          </li>
         </ul>
        <div class="span7">
          <form class="well" name="frmIcdx" id="frmIcdx">
            <input type="hidden" id="id_icdx" name="id_icdx">
            <table>
              <tr>
                <td><label for="kode_kelompok">Kelompok</label></td>
                <td>
                  <select  id="kode_kelompok">
                  </select>
                </td>
              </tr>
              <tr>
                <td><label for="kode_subkelompok">Sub Kelompok</label></td>
                <td>
                  <select  id="kode_subkelompok">
                  </select>
                </td>
              </tr>
              <tr>
                <td><label for="kode">Kode Penyakit</label></td>
                <td><input type="text" name="kode_penyakit" id="kode_penyakit" value=""></td>
              </tr>
              <tr>
                <td><label for="nama">Nama Penyakit</label></td>
                <td><input type="text" name="nama_penyakit" id="nama_penyakit" value=""></td>
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
        <table class="table dataTable" id="tblPenyakitIcdx">
        <thead>
          <tr>
            <th>Kelompok</th>
            <th>Kode Penyakit</th>
            <th>Nama Penyakit</th>
            <th>Subkelompok</th>
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
      var purl = '<?php echo site_url("master/icdx/ajaxKelompok");?>';
       $.getJSON(purl,function(kdatas){
       if (jQuery.isEmptyObject(kdatas)){
      }else{
        for(var i in kdatas){
          var kat = kdatas[i];
         items+="<option value='"+kat.kode_kelompok+"'>"+kat.nama_kelompok+"</option>";
       } 
         $("#kode_kelompok option").remove();
         $("#kode_kelompok").append(items); 
         $("#kode_kelompok").trigger('change'); 
        }
        }
    );
    }
    function isisubkelompok(){
      var items="";
      var purl = '<?php echo site_url("master/icdx/ajaxSubKelompok");?>'+'/'+$('#kode_kelompok').val();
       $.getJSON(purl,function(kdatas){
       if (jQuery.isEmptyObject(kdatas)){
      }else{
        for(var i in kdatas){
          var kat = kdatas[i];
         items+="<option value='"+kat.kode_subkelompok+"'>"+kat.nama_subkelompok+"</option>";
       } 
         $("#kode_subkelompok option").remove();
         $("#kode_subkelompok").append(items); 
        }
        }
    );
    }


   function edit(){
    resetlink();
    if(kelicdData){

    $('#nama_penyakit').val(kelicdData.nama_penyakit);
    $('#id_icdx').val(kelicdData.id);
    $('#kode_penyakit').val(kelicdData.kode_penyakit);
    $('#kode_subkelompok').val(kelicdData.kode_subkelompok);
    $('#kode_kelompok').val(kelicdData.kelompok);

    }else{
     alert('Silahkan pilih salah satu data');
    }
   }

   function hapus(){
    if(kelicdData){
    if(confirm('Yakin akan menghapus?')){
    data={ id:kelicdData.id};
     $.ajax({
            url: "<?php echo site_url('master/icdx/hapuspenyakit')?>",
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

   $(document).on('click','#tblPenyakitIcdx tr',function () 
  {
    kelicdData = oTable.fnGetData( this );
    $('#tblPenyakitIcdx tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });

function GridRowCount() {
            $('span.rowCount-grid').remove();
            $('input.expandedOrCollapsedGroup').remove();

            $('.dataTables_wrapper').find('[id|=group-id]').each(function () {
                var rowCount = $(this).nextUntil('[id|=group-id]').length;
                $(this).find('td').append($('<span />', { 'class': 'rowCount-grid' }).append($('<b />', { 'text': rowCount })));
            });

            $('.dataTables_wrapper').find('.dataTables_filter').append($('<input />', { 'type': 'button', 'class': 'expandedOrCollapsedGroup collapsed', 'value': 'Expanded All Group' }));

            $('document').on('click','.expandedOrCollapsedGroup', function () {
                if ($(this).hasClass('collapsed')) {
                    $(this).addClass('expanded').removeClass('collapsed').val('Collapse All Group').parents('.dataTables_wrapper').find('.collapsed-group').trigger('click');
                }
                else {
                    $(this).addClass('collapsed').removeClass('expanded').val('Expanded All Group').parents('.dataTables_wrapper').find('.expanded-group').trigger('click');
                }
            });
        };
    $(function(){
  jQuery(document).ready(function(){
       isikelompok()
        $('#kode_kelompok').change(function() {
            isisubkelompok();
          });

       oTable=$('#tblPenyakitIcdx').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('master/icdx/getlistPenyakit')?>",
        "aoColumns": [
               { "mData": "nama_kelompok" }
              ,{ "mData": "kode_penyakit" }
              ,{ "mData": "nama_penyakit" }
              ,{ "mData": "nama_subkelompok" }

        ]}).rowGrouping({
                bExpandableGrouping: true,
                bExpandSingleGroup: false,
                iExpandGroupOffset: -1,
                asExpandedGroups: [""]
  });
      GridRowCount()
      $('#frmIcdx').submit(function(){
        var err=false;
        if($('#nama_penyakit').val()==''||$('#kode_penyakit').val()=='') err=true;
        if(err){
          alert('Isian belum lengkap');
          return false;
        }else{
          data={
               nama_penyakit:$('#nama_penyakit').val()
              ,kode_penyakit:$('#kode_penyakit').val()
              ,id:$('#id_icdx').val()
              ,kode_subkelompok:$('#kode_subkelompok').val()
              ,kode_kelompok:$('#kode_kelompok').val()
            };
          $.ajax({
            url: '<?php echo site_url('master/icdx/simpanPenyakit')?>',
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
      $('#frmIcdx input').val('');
      $('#kode_subkelompok').val(1);
    $('#kode_kelompok').val(1);
    }

   
    </script>
    