    <div class="span9"> <!-- content span -->
      <div class="row">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#">Master Kegiatan</a>
          </li>
         </ul>
        <div class="span7">
          <form class="well" name="frmKegiatan" id="frmKegiatan">
            <input type="hidden" id="id_kegiatan" name="id_kegiatan">
            <table>
              <tr>
                <td><label for="kategori">Kategori</label></td>
                <td>
                  <select  id="kategori">

                  </select>
                </td>
              </tr>
              <tr>
                <td><label for="kegiatan">Kegiatan</label></td>
                <td><input type="text" name="nama_kegiatan" id="nama_kegiatan" value=""></td>
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
            url: "<?php echo site_url('poli/'.'master/kegiatan/hapuskegiatan')?>",
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
        "sAjaxSource": "<?php echo site_url('poli/'.'master/kegiatan/getlistkegiatan')?>",
        "aoColumns": [
              { "mData": "nama_kategori" }
              ,{ "mData": "nama_kegiatan" }
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
              kategori:$('#frmKegiatan #kategori').val()
              ,id_kegiatan:$('#frmKegiatan #id_kegiatan').val()
              ,nama_kegiatan:$('#frmKegiatan #nama_kegiatan').val()
            };
          $.ajax({
            url: '<?php echo site_url('poli/'.'master/kegiatan/simpankegiatan')?>',
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
      $('#frmKegiatan input').val('');
      $('#kategori').val(1);
    }

   
    </script>
    