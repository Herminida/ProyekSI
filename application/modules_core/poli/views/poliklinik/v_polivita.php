<div class="span9">
  <!-- content span -->
  <form name="frmVitamin" id="frmVitamin">
    <div class="row">
      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#">Pemberian Vitamin A &amp; Fe</a>
        </li>
      </ul>
      <div class="span9">
        <div class="well">
          <input type="hidden" name="id_vitamin" id="id_vitamin">
          <table>
            <tr>
              <td>
                <label for="tgl">Tgl</label>
              </td>
              <td colspan="13">
                <div class="bfh-datepicker" data-format="d-m-y" data-date="22-01-2013">
                  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                    <input type="text" class="input-medium" id="tgl" name="tgl" readonly>
                  </div>
                  <div class="bfh-datepicker-calendar">
                    <table class="calendar table table-bordered">
                      <thead>
                        <tr class="months-header">
                          <th class="month" colspan="4">
                            <a class="previous" href="#"></a> <a class="next" href="#"></a>
                          </th>
                          <th class="year" colspan="3">
                            <a class="previous" href="#"></a> <a class="next" href="#"></a>
                          </th>
                        </tr>
                        <tr class="days-header">
                          <td></td>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label for="kelurahan">Kelurahan</label>
              </td>
              <td colspan="13">
                <select id="kelurahan" name="kelurahan" class="span3">
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <label for="sasaran_by">Sasaran BY(6-11bl)</label>
              </td>
              <td colspan="7">
                <input type="text" id="sasaran_by" name="sasaran_by">
              </td>
              <td>
                &nbsp;
              </td>
              <td>
                <label for="vit_by">Dpt Vit.A(6-11bl)</label>
              </td>
              <td colspan="5">
                <input type="text" id="vit_by" name="vit_by">
              </td>
            </tr>
            <tr>
              <td>
                <label for="sasaran_blt">Sasaran BLT(12-60bl)</label>
              </td>
              <td colspan="7">
                <input type="text" id="sasaran_blt" name="sasaran_blt">
              </td>
              <td>
                &nbsp;
              </td>
              <td>
                <label for="vit_blt">Dpt Vit.A(12-60bl)</label>
              </td>
              <td colspan="5">
                <input type="text" id="vit_blt" name="vit_blt">
              </td>
            </tr>
            <tr>
              <td>
                <label for="sasaran_bufas">Sasaran Bufas</label>
              </td>
              <td colspan="7">
                <input type="text" id="sasaran_bufas" name="sasaran_bufas">
              </td>
              <td>
                &nbsp;
              </td>
              <td>
                <label for="vit_bufas">Dpt Bufas</label>
              </td>
              <td colspan="5">
                <input type="text" id="vit_bufas" name="vit_bufas">
              </td>
            </tr>
            <tr>
              <td>
                <label for="sasaran_bumil">Status Bumil</label>
              </td>
              <td class="span1">
                <input type="text" class="span1" id="sasaran_bumil" name="sasaran_bumil">
              </td>
              <td>
                &nbsp;
              </td>
              <td>
                <label for="fe1_bumil">Dpt Fe I</label>
              </td>
              <td>
                <input type="text" class="span1" id="fe1_bumil" name="fe1_bumil">
              </td>
              <td>
                &nbsp;
              </td>
              <td>
                <label for="fe3_bumil">Dpt Fe III</label>
              </td>
              <td>
                <input type="text" class="span1" id="fe3_bumil" name="fe3_bumil">
              </td>
              <td>
                &nbsp;
              </td>
              <td>
                <label for="ukur_lila_bumil">Pengukuran LILA</label>
              </td>
              <td>
                <input type="text" class="span1" id="ukur_lila_bumil" name="ukur_lila_bumil">
              </td>
              <td>
                &nbsp;
              </td>
              <td>
                <label for="kurang_lila_bumil">LILA&lt;23.5cm</label>
              </td>
              <td>
                <input type="text" class="span1" id="kurang_lila_bumil" name="kurang_lila_bumil">
              </td>
            </tr>
            <tr>
              <td>
                <label for="sasaran_wus">SasaranWus</label>
              </td>
              <td colspan="13">
                <input type="text" id="sasaran_wus" name="sasaran_wus">
              </td>
            </tr>
          </table>
           <button type="submit" id="btnSimpan" class="btn btn-primary btn-small">Simpan</button>
          <button type="button" id="btnReset" class="btn btn-small" onclick="resetlink(1)">Reset</button>
  </form>
        </div><!--/well-->
      </div>
    </div><!--/row-->
     <div class="row">
      <!--pemeriksaan-->
      <div class="labelhr">
        <span class="label">History Pemberian Vitamin</span>
      </div>
      <div>
        <hr>
      </div>
    </div>
    <table class="table datatable" id="tblVitamin">
      <thead>
        <tr>
          <th>Kelurahan </th>
          <th>Tgl</th>
          <th>Sasaran Bayi</th>
          <th>Sasaran BLT</th>
          <th>Sasaran Bufas</th>
          <th>Sasaran Bumil</th>
          <th>Sasaran Wus</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
   
</div><!--/span9-->
<!-- Le javascript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script type="text/javascript">
    function resetlink(stat){
      setformdisabled(true);
      $('#frmVitamin input[name="tgl"]').val('<?php echo date("d-m-Y")?>');
      if (stat){
      isikelurahan();
    }
    }

    function isikelurahan(){
      var items="";
      var purl = '<?php echo site_url("poli/poliposyandu/ajaxKelurahan");?>';
       $.getJSON(purl,function(kdatas){
       if (jQuery.isEmptyObject(kdatas)){
      }else{
        //console.log(kdata[0]);
        for(var i in kdatas){
          var kel = kdatas[i];
         items+="<option value='"+kel.id_kelurahan+"'>"+kel.nama_kelurahan+"</option>";
       } 
         $("#kelurahan option").remove();
         $("#kelurahan").append(items); 
        }
        }
    );
    }

    function setformdisabled(status){
       $('#frmVitamin input').each(function(){
          //$(this).prop('disabled',status);
          if (status){
          $(this).val('');
          }
        });
    }

    function edit(a){
       row = $(a).closest("tr").get(0);
       posData = oTable.fnGetData(row);
       resetlink();
       setformdisabled(false);
         for(var key in posData) {
            $('#frmVitamin *[name="'+key+'"]').val(posData[key]);
          }
       //console.log(mData);
    }
    function hapus(a){
       if(confirm('Yakin akan menghapus?')){
      row = $(a).closest("tr").get(0);
      posData = oTable.fnGetData(row);
       data={ id_posyandu:posData.id_posyandu};
     $.ajax({
            url: '<?php echo site_url('poli/'.'polivita/hapus')?>',
            data: data,
            method:'post',
            dataType: 'json',

            success: function(obj){
              if(obj.success){
                alert('data sudah dihapus');
              }
            },
          });
      oTable.fnDeleteRow(oTable.fnGetPosition(row));
      posData='';
    }
  }
    $(document).on('click','#tblVitamin tr',function () 
  {
    mData = oTable.fnGetData(this);
    $('#tblVitamin tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);

  });

    $(function(){
      jQuery(document).ready(function() {
     
       //otable
        oTable=$('#tblVitamin').dataTable({
        "sRowSelect": "single",
        "sDom": "trtip",
        "bScrollCollapse": false, 
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('poli/'.'polivita/ajaxVitamin')?>",
        "aoColumns": [
                        { "mData": "nama_kelurahan" },
                        { "mData": "tgl" },
                        { "mData": "sasaran_by" },
                        { "mData": "sasaran_blt" },
                        { "mData": "sasaran_bumil" },
                        { "mData": "sasaran_bufas" },
                        { "mData": "sasaran_wus" },
                        { "mData":"id_vitamin","mRender":function(data){
                          var edit= '<a onclick=edit(this);>Edit</a>';
                          var hapus= '<a onclick="hapus(this)">Hapus</a>';
                         return edit+'  '+hapus;
                        }}
                    ]
        });
    //submit
       $('#frmVitamin').submit(function(){
        data={};
        $('#frmVitamin input,#frmVitamin select').each(function(){
          data[$(this).attr('name')]=$(this).val();
        });
        $.ajax({
          url: '<?php echo site_url('poli/'.'polivita/simpan')?>',
          data: data,
          method:'post',
          dataType: 'json',

          success: function(data){
            if(data.success){
              alert('data sudah tersimpan');
              oTable = $('#tblVitamin').dataTable();
              oTable.fnClearTable();
            }else if(data.error!=''){
              alert(data.error);
            }
          },
        });
        resetlink(1)
        return false;
        //end submit function
      });
       isikelurahan();
     //end doc ready function  
     } );

  })
    </script>