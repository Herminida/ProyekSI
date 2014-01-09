  <div class="span9"> <!-- content span -->
    <form name="frmPosyandu" id="frmPosyandu">
      <div class="row">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#">Posyandu</a>
          </li>
        </ul>
        <div class="span7 well">
          <input type="hidden" name="id_posyandu" value="">
            <table>
              <tr>
                <td><label for="tgl">Tgl</label></td>
                <td><div class="bfh-datepicker" data-format="d-m-y" data-date="22-01-2013">
                  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                   <input type="text" name="tgl" id="tgl" class="input-medium" readonly>
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
            <td><label for="kelurahan">Kelurahan</label></td>
            <td><select class="span3" id="kelurahan" name="kelurahan">
              <option value=''>Pilih Kelurahan</option>
            </select>

            </td>
          </tr>
          <tr>
            <td><label for="jml_pend">Jml Penduduk</label></td>
            <td>
              <input type="text" id="jml_pend" name="jml_pend">
            </td>
          </tr>
          <tr>
            <td><label for="jml_by">Jml BY (0-11bl)</label></td>
            <td><input type="text" id="jml_by" name="jml_by"></td>
          </tr>
          <tr>
            <td><label for="jml_blt">Jml BLT (12-59bl)</label></td>
            <td><input type="text" id="jml_blt" name="jml_blt"></td>
          </tr>
          <tr>
            <td><label for="jml_posy">Jml Posy yg ada</label></td>
            <td><input type="text" id="jml_posy" name="jml_posy" ></td>
          </tr>
        </table>
      </div><!--/well-->
      </div><!--/row-->
        <div class="row"> <!--pemeriksaan-->
          <div class="labelhr">
            <span class="label">Posy yg dilapor</span>
          </div>
          <div>
            <hr>
          </div>
        </div>

      <div class="row">
        <div class="span7 well">
          <table>
            <tr>
              <td><label>Jml</label></td>
              <td><input type="text" id="posy_jml" name="posy_jml" ></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><label>Status</label></td>
              <td><select class="span3" id="status" name="status" >
                    <option value='0'>Lama</option>
                    <option value='1'>Baru</option>
                  </select>
              </td>
            </tr>
            <tr>
              <td><label>BY</label></td>
              <td><input type="text" id="posy_by" name="posy_by" ></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><label>TindakLanjut</label></td>
              <td><input type="textarea" row="3" id="tindak_lanjut" name="tindak_lanjut" ></td>
            </tr>
            <tr>
              <td><label>BLT</label></td>
              <td><input type="text" id="posy_blt" name="posy_blt" ></td>
            </tr>
          </table>
          <button type="submit" id="btnSimpan" class="btn btn-primary btn-small">Simpan</button>
          <button type="button" id="btnReset" class="btn btn-small" onclick="resetlink(1)">Reset</button>
        </div>
      </div>
    </form> 
      <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">Riwayat Perawatan</span>
        </div>
        <div>
          <hr>
        </div>
      </div>
      <table class="table datatable" id="tblPosyandu">
        <thead>
          <tr>
            <th>Nama Kelurahan</th>
            <th>Tanggal</th>
            <th>Jml Bayi</th>
            <th>Jml BLT</th>
            <th>Jml Posyandu</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>

    </form>
  </div><!--/span9-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
    function resetlink(stat){
      setformdisabled(true);
      $('#frmPosyandu input[name="tanggal"]').val('<?php echo date("d-m-Y")?>');
      if (stat){isikelurahan();}
    }

    function isikelurahan(){
      var items="";
      var purl = '<?php echo site_url("poli/poliposyandu/ajaxKelurahan");?>';
       $.getJSON(purl,function(kdatas){
       if (jQuery.isEmptyObject(kdatas)){
      }else{
        for(var i in kdatas){
          var kel = kdatas[i];
          console.log(kdatas[0]);
         items+="<option value='"+kel.id_kelurahan+"'>"+kel.nama_kelurahan+"</option>";
       } 
         $("#kelurahan option").remove();
         $("#kelurahan").append(items); 
        }
        }
    );
    }

    function setformdisabled(status){
       $('#frmPosyandu input').each(function(){
          if (status){
          $(this).val('');
          }
        });
    }

    function edit(a){
       row = $(a).closest("tr").get(0);
       posData = oTable.fnGetData(row);
       //resetlink();
       setformdisabled(false);

         for(var key in posData) {
            $('#frmPosyandu *[name="'+key+'"]').val(posData[key]);
            if(key=='kelurahan'){
             // console.log('ini kelurahan');
              $('#frmPosyandu *[name="kelurahan"]').val(posData[key]);
            }
          }
       //console.log(mData);
    }
    function hapus(a){
      if(confirm('Yakin akan menghapus?')){
      row = $(a).closest("tr").get(0);
      posData = oTable.fnGetData(row);
       data={ id_posyandu:posData.id_posyandu};
     $.ajax({
            url: '<?php echo site_url('poli/'.'poliposyandu/hapus')?>',
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
    $(document).on('click','#tblPosyandu tr',function () 
  {
    mData = oTable.fnGetData(this);
    $('#tblPosyandu tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);

  });

    $(function(){
      jQuery(document).ready(function() {
     
       //facebox
       jQuery('a[rel*=facebox]').facebox()
     
       //otable
        oTable=$('#tblPosyandu').dataTable({
        "sRowSelect": "single",
        "sDom": "trtip",
        "bScrollCollapse": false, 
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('poli/'.'poliposyandu/ajaxPosyandu')?>",
        "aoColumns": [
        //id_posyandu, kelurahan, tgl, jml_pend, jml_by, jml_blt, jml_posy, posy_jml, posy_by, posy_blt, status, tindak_lanjut
                        { "mData": "nama_kelurahan" },
                        { "mData": "tgl" },
                        { "mData": "jml_by" },
                        { "mData": "jml_blt" },
                        { "mData": "jml_posy" },
                        { "mData":"id_posyandu","mRender":function(data){
                          var edit= '<a onclick=edit(this);>Edit</a>';
                          var hapus= '<a onclick="hapus(this)">Hapus</a>';
                         return edit+'  '+hapus;
                        }}
                    ]
        });
    //submit
       $('#frmPosyandu').submit(function(){
        data={};
        $('#frmPosyandu input,#frmPosyandu select').each(function(){
          data[$(this).attr('name')]=$(this).val();
        });
        $.ajax({
          url: '<?php echo site_url('poli/'.'poliposyandu/simpan')?>',
          data: data,
          method:'post',
          dataType: 'json',

          success: function(data){
            if(data.success){
              alert('data sudah tersimpan');
              resetlink();
              isikelurahan();
              oTable = $('#tblPosyandu').dataTable();
              oTable.fnClearTable();
            }else if(data.error!=''){
              alert(data.error);
            }
          },
        });
        resetlink()
        return false;
        //end submit function
      });
       isikelurahan();
     //end doc ready function  
     } );

  })
    </script>
    