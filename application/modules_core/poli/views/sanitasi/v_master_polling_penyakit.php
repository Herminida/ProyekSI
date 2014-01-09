    <div class="span9"> <!-- content span -->
      <div class="row">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#">Master Polling Penyakit</a>
          </li>
         </ul>
        <div class="span9">
          <form class="well" name="frmPolling" id="frmPolling">
            <input type="hidden" id="id_kegiatan" name="id_kegiatan">
            <table>
              <tr>
                <td><label for="penyakit">Jenis Penyakit Panduan Klinik</label></td>
                <td>
                  <select  id="penyakit">

                  </select>
                </td>
              </tr>
              <tr>
                <td><label for="pertanyaan">Pertanyaan</label></td>
                <td><input type="text" name="pertanyaan" id="pertanyaan" value="" class="input-large"></td>
              </tr>
            </table>
        <div class="labellegend">
          <span class="label">Jawaban</span>
        </div>
            <div class="well"><div class="row">
            <div class="span8">
            <button type="button" id="jadwalTambah" class="pull-right" onclick="tambahJadwal()"><i class="icon-plus-sign"></i> Tambah</button>
            <table id="tblJadwal" class="table">
                <tbody></tbody>
            </table>
            </div>
        </div></div>
        <button class="btn btn-small btn-primary" id="btnSimpan" name="btnSimpan">Simpan</button>
         </form>
        </div>
       </div><!--/row-->
       <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">Daftar Kategori Kegiatan</span>
        </div>
        <div>
          <hr>
        </div>
      </div>
      <a class="btn btn-small" id="btnEdit" name="btnEdit" onclick="edit()">Edit</a>
      <a class="btn btn-small" id="btnHapus" name="btnHapus" onclick="hapus()">Hapus</a>
        <table class="table dataTable" id="tblKatKegiatan">
        <thead>
          <tr>
            <th>Kategori</th>
            <th>Kegiatan</th>
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
    $(function(){
      jQuery(document).ready(function() {
        isikategori();
        });
      })
jid=0;
function tambahJadwal(obj){
    jid++;
    if((typeof obj)==='undefined' || (typeof obj.tgl)==='undefined'){
        obj={'tgl':''};
    }
    var tags = '<tr id="jawabanRow_'+jid+'">';
        tags+= '<td width="100"><label for="jawaban_'+jid+'">Jawaban</label></td>';
        tags+= '<td>';
        tags+= '    <input type="text" name="jadwal_tgl['+jid+']" id="jadwalTgl_'+jid+'" value="'+obj.tgl+'" class="input-large">';
        tags+= '    <textarea cols="10" rows="2" name="jadwal_tgl['+jid+']" id="jadwalTgl_'+jid+'" value="'+obj.tgl+'" placeholder="Kosongkan jika tidak perlu"/>';
        tags+= '  </td>';
        tags+= '<td width="80"><button type="button" id="jadwalHapus_'+jid+'" rel="hapusJadwal" onclick="clearJadwal()"><i class="icon-remove"></i>Hapus</button></td>';
        tags+= '</tr>';
    $('#tblJadwal > tbody:first').append(tags);
    
}
function clearJadwal(){
    $('#tblJadwal > tbody > tr:first').remove();
}
function isikategori(){
      var items="";
      var purl = '<?php echo site_url("poli/master/kegiatan/ajaxKategori");?>';
       $.getJSON(purl,function(kdatas){
       if (jQuery.isEmptyObject(kdatas)){
      }else{
        for(var i in kdatas){
          var kat = kdatas[i];
         items+="<option value='"+kat.id_kategori+"'>"+kat.nama_kategori+"</option>";
       } 
         $("#kategori option").remove();
         $("#kategori").append(items); 
        }
        }
    );
    }

   function edit(){
    resetlink();
    if(mkatData){
    $('#kategori').val(mkatData.kategori)
    $('#id_kegiatan').val(mkatData.id_kegiatan)
    $('#nama_kegiatan').val(mkatData.nama_kegiatan);
    
    }else{
     alert('Silahkan pilih salah satu data');
    }
   }

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

   function hapus(){
    if(mkatData){
    if(confirm('Yakin akan menghapus?')){
    data={ id_kegiatan:mkatData.id_kegiatan};
     $.ajax({
            url: "<?php echo site_url('poli/master/kegiatan/hapuskegiatan')?>",
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
mkatData='';
    }
      }else{
      alert('Silahkan pilih salah satu data');
    }
   }

   $(document).on('click','#tblKatKegiatan tr',function () 
  {
    mkatData = oTable.fnGetData( this );
    $('#tblKatKegiatan tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });


    $(function(){
  jQuery(document).ready(function(){
    tambahJadwal();
      
  });
});

    function resetlink(){
      $('#frmPolling input').val('');
      $('#kategori').val(1);
    }

   
    </script>
    