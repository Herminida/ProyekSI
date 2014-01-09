    <div class="span9"> <!-- content span -->
      <div class="row">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#">Input Kegiatan</a>
          </li>
         </ul>
        <div class="span7">
          <form class="well" name="frmKegiatan" id="frmKegiatan">
            <input type="hidden" id="id" name="id">
            <table>
              <tr>
                <td><label for="unker">Unit Kerja</label></td>
                <td>
                  <select  id="unker">
                    <option value="1">Puskesmas Karang Rejo</option>
                    <option value="2">Puskesmas Mamburungan</option>
                    <option value="3">Puskesmas Gunung Lingkas</option>
                    <option value="4">Puskesmas Juata Laut</option>
                    <option value="5">Puskesmas Juata Permai</option>
                    <option value="6">Puskesmas Pantai Amal</option>
                    <option value="7">Puskesmas Sebengkok</option>
                    <option value="8">Dinas Kesehatan Kota Tarakan</option>
                  </select>
                </td>
              </tr>
                  <tr>
                <td><label for="poli">Poliklinik</label></td>
                <td>
                  <select  id="poli">
                      <option value="Anak">Anak</option>
                      <option value="IGD">IGD</option>
                      <option value="Dewasa">Dewasa</option>
                      <option value="Gizi">Gizi</option>
                      <option value="Gigi">Gigi</option>
                      <option value="Imunisasi">Imunisasi</option>
                      <option value="Kebidanan">Kebidanan</option>
                      <option value="KB">KB</option>
                      <option value="Lansia">Lansia</option>
                  </select>
                </td>
              </tr>
                  <tr>
                <td><label for="kategori">Kategori</label></td>
                <td>
                  <select  id="kategori">
                   
                  </select>
                </td>
              </tr>
                  <tr>
                <td><label for="kegiatan">Kegiatan</label></td>
                <td>
                  <select  id="kegiatan">
                    
                  </select>
                </td>
              </tr>
              <tr>
                <td><label for="Kegiatan">Tanggal</label></td>
                  <td>
      
    <div class="bfh-datepicker" id="dpTanggal" data-format="d-m-y" data-date="" sql-date="<?php echo date('Y-m-d')?>">
              <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                 <input type="text" class="input-small" name="tgl" id="tgl" value="<?php echo date('d-m-Y');?>" autocomplete="off"  readonly  >
                 <button class="btn btn-small" type="button"><i class="icon-calendar"></i></button>
              </div>
              <div class="bfh-datepicker-calendar">
                <table class="calendar table table-bordered">
                  <thead>
                    <tr class="months-header">
                      <th class="month" colspan="4">
                        <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                        <span></span>
                        <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                      </th>
                      <th class="year" colspan="3">
                        <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                        <span></span>
                        <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                      </th>
                    </tr>
                    <tr class="days-header">
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
        </td>
              </tr>
              <tr>
                <td><label for="Kegiatan">Jumlah</label></td>
                <td><input type="text" name="jml" id="jml" value=""></td>
              </tr>
              
            </table>
        <button class="btn btn-small" id="btnSimpan" name="btnSimpan">Simpan</button>
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
            <th>Unit Kerja</th>
            <th>Poli</th>
            <th>Kategori</th>
            <th>Kegiatan</th>
            <th>Tgl</th>
            <th>Jml</th>
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
          $('#kategori').change(function() {
            isikegiatan();
          });

        });
      })

function isikegiatan(){
      var items="";
      var purl = '<?php echo site_url("poli/master/kegiatan/ajaxKegiatan");?>'+'/'+$('#kategori').val();
       $.getJSON(purl,function(kedatas){
       if (jQuery.isEmptyObject(kedatas)){
      }else{
        for(var i in kedatas){
          var keg = kedatas[i];
         items+="<option value='"+keg.id_kegiatan+"'>"+keg.nama_kegiatan+"</option>";
       } 
         $("#kegiatan option").remove();
         $("#kegiatan").append(items); 

        }
        }
    );
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
         $("#kategori").trigger('change'); 
        }
        }
    );
    }




   function edit(){
    resetlink();
    if(mkatData){
    $('#unker').val(mkatData.id_unit_kerja);
    $('#poli').val(mkatData.poli);
    $('#tgl').val(mkatData.tgl);
    $('#dpTanggal').attr('sql-date',mkatData.tgl_sql).attr('data-date',mkatData.tgl);
    $('#kategori').val(mkatData.id_kategori).trigger('change');
    $('#kegiatan').val(mkatData.id_kegiatan);
    $('#jml').val(mkatData.jml);
    $('#id').val(mkatData.id);
    
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
    data={ id:mkatData.id};
     $.ajax({
            url: "<?php echo site_url('poli/'.'master/kegiatan/hapusinput')?>",
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
       oTable=$('#tblKatKegiatan').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('poli/'.'master/kegiatan/getdatakegiatan')?>",
        "aoColumns": [
              { "mData": "nama_unit_kerja" }
              ,{ "mData": "poli" }
              ,{ "mData": "nama_kategori" }
              ,{ "mData": "nama_kegiatan" }
              ,{ "mData": "tgl" }
              ,{ "mData": "jml" }
        ]
  }).rowGrouping({
                bExpandableGrouping: true,
                bExpandSingleGroup: false,
                iExpandGroupOffset: -1,
                asExpandedGroups: [""]
            });

            GridRowCount();
      $('#frmKegiatan').submit(function(){
        var err=false;
        if($('#frmKegiatan #nama_kegiatan').val()=='') err=true;
        if(err){
          alert('Isian belum lengkap');
          return false;
        }else{
          data={
              id:$('#id').val()
              ,poli:$('#poli').val()
              ,kegiatan:$('#kegiatan').val()
              ,unker:$('#unker').val()
              ,jml:$('#jml').val()
              ,tgl:$('#dpTanggal').attr('sql-date')
            };
          $.ajax({
            url: '<?php echo site_url('poli/'.'master/kegiatan/simpaninput')?>',
            data: data,
            method:'post',
            dataType: 'json',
            success: function(obj){
              if(obj.success){
                 alert('data sudah tersimpan');
                 oTable.fnClearTable();
                 oTable.fnDraw();
                 resetlink();
                 mkatData ='';
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
      //$('#frmKegiatan input').val('');
      $('#kategori').val(1);
      $('#tgl').val('<?php echo date('d-m-Y')?>');
      $('#dpTanggal').attr('sql-date','<?php echo date('Y-m-d')?>');
      $('#unker').val(1);
      $('#poli').val('Anak');
      $('#jml').val('');
      $('#id').val('');

    }

   
    </script>
    