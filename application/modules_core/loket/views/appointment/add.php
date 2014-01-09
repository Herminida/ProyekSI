

        <script>
                $(document).ready(function(){
                    $("#kelas_kamar").change(function(){
                         var id_kelas_kamar = $("#kelas_kamar").val();
                            $.ajax({
                                type : "POST",
                                url  : "<?php echo base_url(); ?>loket/appointment/GetRuangkamar",
                                data : "id_kelas_kamar=" + id_kelas_kamar,
                                success: function(data){
                                    $("#ruang_kamar").html(data);
                                }
                            });
                    });

                    $("#simpan").click(function(){
                        var klinik = $("#klinik").val();
                        var tglregistrasi=$("#tanggal_registrasi").val();
                        var idanggota = $("#id2").val();
                        var tgl = $("#tgl").val();
                        var bln = $("#bln").val();
                        var thn = $("#thn").val();
                        var nama1 = $("#nama2").val();
                        var tahun = thn+"-"+bln+"-"+tgl;
                        var penanggung_jawab=$("#penanggung_jawab").val();
                        var kelas_kamar=$("#kelas_kamar").val();
                        var ruang_kamar=$("#ruang_kamar").val();
                        if(penanggung_jawab==""){
                            alert('Penanggung Jawab tidak boleh kosong!');
                            $("#penanggung_jawab").focus();
                        }
                        else if(kelas_kamar==""){
                            alert('Kelas Kamar tidak boleh kosong!');
                        }
                        else if(ruang_kamar==""){
                            alert('Ruang Kamar tidak boleh kosong!');
                        }
                        else if(tglregistrasi==""){
                            alert('Tanggal Registrasi tidak boleh kosong!');
                        }
                        else{
                                $("#formsimpan").submit();
                        }
                    });
                    
                    
                    
                    $("#nik").keyup(function(){
                        var nik = $("#nik").val();
                        var nama = $("#nama").val();

                        $.ajax({
                            type:"POST",
                            url :"<?php echo base_url();?>loket/admission_registrasi/getall",
                            data:"nik="+nik+"&nama="+nama,
                            success : function (data) {

                                $("#tampilkandata").html(data);
                            }
                            
                        });
                    });//end of nik


                    $("#nama").keyup(function(){
                                            
                        var nama = $("#nama").val();
                        var nik = $("#nik").val();

                            $.ajax({
                                    type:"POST",
                                    url :"<?php echo base_url();?>loket/admission_registrasi/getall",
                                    data: "nama="+nama+"&nik="+nik,
                                        success : function (data) {
                                                $("#tampilkandata").html(data);
                                                }
                                                
                                    });
                    }); //end of nama


                    
                   $("#daftar").live("click",function(){
                 
                   var id=$(this).attr("id_anggota");
                   var nik=$(this).attr("nik");
                   var nama = $(this).attr("nama");
                   var sex = $(this).attr("sex");
                   var alamat = $(this).attr("alamat");
                   var tgl = $(this).attr("tgl");
                   var tahun = $(this).attr("tahun");
                   var idumur = $(this).attr("idumur");
                   //var noreg = $(this).attr("noreg");
                   var tglregistrasi=$(this).attr("tglregistrasi");
                   $("#id2").val (id);
                   $("#umur").val (idumur);
                   //$("#noreg2").val(noreg);
                   $("#nik2").val(nik);
                   $("#nama2").val(nama);
                   $("#sex2").val(sex);
                   $("#alamat2").val(alamat);
                   $("#tgl2").val(tgl);
                   $("#tahun2").val(tahun);
                   $("#tglregistrasi2").val(tglregistrasi);
                   });//end off daftar admission

                    $("#btn-cari").click(function(){
                        var kata_kunci=$("#kata_kunci").val();
                        if(kata_kunci==""){
                            alert("Kata kunci tidak boleh kosong!!!");
                        }
                        else{
                            $.ajax({
                            type:"POST",
                            url:"<?php echo base_url();?>loket/appointment/cari_pasien",
                            data:"kata_kunci="+kata_kunci,
                            success:function(data){
                                $("#tampil_cari").show();
                                $("#tampil_cari").html(data);
                            }
                        });
                        }
                    });
                    $("#cari_pasien").click(function(){
                        $("#tampil_cari").hide();
                        $("#kata_kunci").val("");
                    })
                });
    </script>
        <div id="myModal" class="modal_lebar hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">Pencarian Data Pasien</h3>
            </div>
            <div class="modal-body">
                    <div class="input-append">
                        <input class="span2" id="kata_kunci" type="text">
                        <button class="btn" id="btn-cari" type="button"><i class="icon icon-search"></i> Cari</button>
                    </div>
                    <hr>
                    <div id="tampil_cari"></div>
            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Batal</button>
            </div>
          </div>
          <div class="bs-docs-example" style="padding-bottom: 24px;">
            <a data-toggle="modal" href="#myModal" id="cari_pasien" class="btn btn-primary btn-large" style="float:right; margin-right:20px;"><i class="icon icon-search icon-white"></i> Cari Pasien</a>
        </div>
<h3>Appointment</h3>
<hr>
<div id="real">
  <div id="statusdonor">
    <?php echo form_open('loket/appointment/add','id="formsimpan"','class="form-horizontal"'); ?>
    <table class="table table-striped">
      <thead></thead>
      <tbody>
       
        <tr>
                <td style="width:30%">Tanggal Registrasi</td>
                <td>:</td>
                <td style="width:50%">
                    <script>
                    $(function() {
                        $( "#tanggal_registrasi" ).datepicker({
                        changeMonth: true,
                        changeYear: true
                        });
                        $( "#tanggal_registrasi" ).change(function() {
                            $( "#tanggal_registrasi" ).datepicker( "option", "dateFormat","yy-mm-dd" );
                        });
                    });
                </script>
                <p><input type="text" name="tanggal_registrasi" id="tanggal_registrasi" class="span3" placeholder="Tanggal Registrasi..." /></p>

                </td>
                <td style="width:30%; color:red;"><?php echo form_error('tanggal_lahir'); ?> </td>
               
            </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><input type="text" name="nik" id="nik2" class="span3" size="30" readonly="readonly"></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('nik'); ?></td> 
        </tr>

        <tr>
            <td>Nama Pasien</td>
            <td>:</td>
            <td><input type="text" name="nama_anggota" id="nama2" class="span3" size="30" readonly="readonly"></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('nama_anggota'); ?></td> 
        </tr>

        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input type="text" name="alamat" id="alamat2" class="span3" size="30" readonly="readonly"></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('alamat'); ?></td> 
        </tr>

        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><input type="text" name="sex" id="sex2" class="span3" size="30" readonly="readonly"></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('sex'); ?></td> 
        </tr>

        <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td><input type="text" name="tgl_lahir" id="tgl2" class="span3" size="30" readonly="readonly"></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('tgl_lahir'); ?></td> 
        </tr>

<!--         <tr>
            <td>Umur</td>
            <td>:</td>
            <td><input type="text" name="umur" id="umur" class="span3" id="tahun2" readonly="readonly"></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('umur'); ?></td> 
        </tr>
 -->        <!-- <tr>
            <td>Penanggung</td>
            <td>:</td>
            <td>
                <input type="text" name="penanggung_jawab" id="penanggung_jawab" placeholder="Nama Penanggung Jawab..." class="span3">
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('umur'); ?></td> 
        </tr> -->
        <!-- <tr>
            <td>Kelas Kamar</td>
            <td>:</td>
            <td>
                <select class="span4" id="kelas_kamar">
                    <option value="">==Silahkan Pilih==</option>
                    <?php
                        foreach ($data_kelas_kamar->result_array() as $hasil_kelas) {
                        ?>
                            <option value="<?php echo $hasil_kelas['id_kelas_kamar'];?>"><?php echo $hasil_kelas['nama_kelas_kamar'];?></option>
                        <?php
                        }
                    ?>
                </select>
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('umur'); ?></td> 
        </tr>
        <tr>
            <td>Ruang Kamar</td>
            <td>:</td>
            <td>
                <select name="ruang_kamar" class="span4" id="ruang_kamar">
                    <option value="">==Silahkan Pilih==</option>
                </select>
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('umur'); ?></td> 
        </tr> -->
        <tr>
            <td>Unit Layanan</td>
            <td>:</td>
            <td>
                <select name="unit_layanan" class="span4" id="unit_layanan">
                    <option value="">==Silahkan Pilih==</option>
                    <?php
                        foreach ($data_unit_layanan->result_array() as $hasil_unit_layanan) {
                        ?>
                            <option value="<?php echo $hasil_unit_layanan['id'];?>"><?php echo $hasil_unit_layanan['nama_klinik'];?></option>
                        <?php
                        }
                    ?>
                </select>
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('umur'); ?></td> 
        </tr>

        <tr>
            <td>Dokter</td>
            <td>:</td>
            <td>
                <select name="dokter" class="span4" id="dokter">
                    <option value="">==Silahkan Pilih==</option>
                    <?php
                        foreach ($data_dokter->result_array() as $hasil_dokter) {
                        ?>
                            <option value="<?php echo $hasil_dokter['nik_dokter'];?>"><?php echo $hasil_dokter['nama_dokter'];?></option>
                        <?php
                        }
                    ?>
                </select>
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('umur'); ?></td> 
        </tr>

        <tr>
            <td>Keluhan</td>
            <td>:</td>
            <td>
                <textarea name="keluhan" id="keluhan" class="span4" rows="5"></textarea>
            </td> 
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('umur'); ?></td> 
        </tr>
        
        <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> <?php echo form_button(array('type'=>'button','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                </td>
                <td>&nbsp;</td>
                
            </tr>

            <input type="hidden" name="id_pasien" id="id2"  >
      </tbody>

    </table>
    <?php echo form_close(); ?>

  </div>
</div>


    