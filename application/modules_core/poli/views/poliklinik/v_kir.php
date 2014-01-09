    <div class="span9"> <!-- content span -->
      <div class="row">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#">SKD</a>
          </li>
         </ul>
        <div class="span7">
          <form class="well" name="frmKir" id="frmKir">
            <input type="hidden" id="id_kir" name="id_kir">
            <table>
              <tr>
                <td><label for="time_kunjungan">Tgl</label></td>
                <td><input type="text" class="input-small" name="tanggal" id="tanggal" disabled value="<?php echo date('d-m-Y')?>"></td>
              </tr>
              <tr id="rowFrmAntrian">
                <input type="hidden" id="idpemeriksaan" name="idpemeriksaan"value=''>
                <input type="hidden" id="no_rm" name="no_rm"value=''>
                <td><label for="register">Reg</label></td>
                <td><div class="input-append">
                  <input type="text" id="register" name="register" readonly>
                  <a class="btn btn-small" type="button" href="<?php echo site_url('poli/'.'polidewasa/antrian');?>" rel="facebox"><i class="icon-search"></i></a>
                </div></td>
              </tr>
             <!--  <tr>
                <td><label>Dokter</label></td>
                <td><select id="dokter" name="dokter" disabled>
                  <option value='1'>Dokter Umum</option>
                  <option value='2'>Dokter Spesialis</option>
                </select>
                </td>
              </tr> -->
              <tr>
                <td><label for="hasil">Hasil</label></td>
                <td><textarea id="hasil" name="hasil" row="3" disabled></textarea></td>
              </tr>
              <tr>
                <td><label for="guna">Guna</label></td>
                <td><textarea id="guna" name="guna" row="3" disabled></textarea></td>
              </tr>
              <tr>
                <td><label for="no_kir">No. Surat</label></td>
                <td><input type="text" id="no_kir" name="no_kir" disabled></td>
              </tr>
            </table>
        <button class="btn btn-small" id="btnSimpan" name="btnSimpan">Simpan</button>
        <!-- TODO: edit+hapus <button class="btn btn-small" id="btnEdit"  name="btnEdit">Edit</button>
        <button class="btn btn-small" id="btnHapus" name="btnHapus">Hapus</button> -->
         </form>
        </div>
       </div><!--/row-->
       <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">Riwayat SKD</span>
        </div>
        <div>
          <hr>
        </div>
      </div>
      <a class="btn btn-small" id="btnEdit" name="btnEdit" onclick="edit()">Edit</a>
      <a class="btn btn-small" id="btnHapus" name="btnHapus" onclick="hapus()">Hapus</a>
        <a class="btn btn-small" id="btnCetak" name="btnCetak" onclick="openWindow('<?php echo site_url('poli/'.'polidewasa/cetakkir');?>')">Cetak</a>
           <!--  <th>Dokter</th> -->
      <table class="table dataTable" id="tblKir">
        <thead>
          <tr>
            <th>Register</th>
            <th>No Rm</th>
            <th>Nama Pasien</th>
            <th>Hasil</th>
            <th>Guna</th>
            <th>Tgl SKD</th>
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
    var newpage;
    var kirData;
    function openWindow(url) {
    $.post(url, {
        nama_anggota:kirData.nama_anggota,
        tempat_lahir:kirData.tempat_lahir,
        tanggal_lahir:kirData.tanggal_lahir,
        alamat:kirData.alamat,
        guna:kirData.guna,
        hasil:kirData.hasil,
        dokter:'Dokter Demo'
      }, function(result) {
        newpage=window.open('', 'popUpWindow','height=400, width=650, left=300, top=100, resizable=yes, scrollbars=yes, toolbar=yes, menubar=no, location=no, directories=no, status=yes');
        newpage.document.open();
        newpage.document.write(result);
        newpage.document.close();
    });
  }

   function openpopup(url) {
    var data={
        nama_anggota:kirData.nama_anggota,
        tempat_lahir:kirData.tempat_lahir,
        tanggal_lahir:kirData.tanggal_lahir,
        alamat:kirData.alamat,
        no_kir:kirData.no_kir,
        tgl_kir:kirData.tgl_kir,
        guna:kirData.guna,
        hasil:kirData.hasil,
        dokter:'Dokter Demo'
      };
      url = url+'/'+data
      window.open(url, "cetak", "width=300,height=400");
     return false;
   }

   function edit(){
    resetlink();
    if(kirData){
    $('#guna').val(kirData.guna);
    $('#hasil').val(kirData.hasil);
    $('#register').val(kirData.register);
    $('#no_kir').val(kirData.no_kir);
    $('#id_kir').val(kirData.id_kir)
    setformdisabled(false);
    }else{
     alert('Silahkan pilih salah satu data');
    }
   }

   function hapus(){
    if(kirData){
    if(confirm('Yakin akan menghapus?')){
    data={ id_kir:kirData.id_kir};
     $.ajax({
            url: "<?php echo site_url('poli/'.'polidewasa/hapuskir')?>",
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
resData='';
    }
      }else{
      alert('Silahkan pilih salah satu data');
    }
   }

   $(document).on('click','#tblKir tr',function () 
  {
    kirData = oTable.fnGetData( this );
    $('#tblKir tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });


    $(function(){
  jQuery(document).ready(function(){
      jQuery('a[rel*=facebox]').facebox();
       oTable=$('#tblKir').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('poli/'.'polidewasa/ajaxkir')?>",
        "aoColumns": [
            { "mData": "register" },
            { "mData": "no_rm" },
            { "mData": "nama_anggota" },
            { "mData": "hasil" },
            { "mData": "guna" },
            { "mData": "tgl_kir" }
         //   { "mData": "nama_pegawai" },
        ]
  });
      $('#frmKir').submit(function(){
        $('#btnSimpan').prop('disabled',true);
        var err=false;
        $('#frmKir input[name="no_kir"],#frmKir textarea').each(function(){
          if($(this).val()=='') err=true;
        });
        if(err){
          alert('Isian belum lengkap');
          $('#btnSimpan').prop('disabled',false);
        }else{
          data={
              dokter:$('#frmKir select[name="dokter"]').val(),
              guna:$('#frmKir textarea[name="guna"]').val()
              ,hasil:$('#frmKir textarea[name="hasil"]').val()
              ,idpemeriksaan:$('#rowFrmAntrian input[name="idpemeriksaan"]').val()
              ,no_rm:$('#rowFrmAntrian input[name="no_rm"]').val()
              ,no_kir:$('#frmKir input[name="no_kir"]').val()
              ,id_kir:$('#frmKir input[name="id_kir"]').val()
            };
          $.ajax({
            url: '<?php echo site_url('poli/'.'polidewasa/simpanKir')?>',
            data: data,
            method:'post',
            dataType: 'json',
            success: function(obj){
              if(obj.success){
                 alert('data sudah tersimpan');
                 oTable.fnClearTable();
                 resetlink();
                 //location.reload();
              }
            },
          });
        }
        return false;
      });

      $('#rowFrmAntrian input[name="tanggal"]').val('<?php echo date("d-m-Y")?>');
      resetlink();
  });
});

    function updatelink(sData){
       if(sData.id){
        setformdisabled(false);
      }
                 oTable = $('#tblKir').dataTable();
    };

    function resetlink(){
     setformdisabled(true);
      $('#rowFrmAntrian input').val('');
      $('#frmKir textarea').val('');
      $('#frmKir input[name="no_kir"]').val('');
    }

    function setformdisabled(stat){
    $('#frmKir textarea').prop('disabled',stat);
      $('#frmKir input[name="no_kir"]').prop('disabled',stat);
      $('#frmKir select').prop('disabled',stat);
      $('#btnSimpan').prop('disabled',stat);
    }
    </script>
    