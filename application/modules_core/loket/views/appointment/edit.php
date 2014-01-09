

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
                        var tanggal_registrasi = $("#tanggal_registrasi").val();
                        var nama=$("#nama").val();
                        var alamat = $("#alamat").val();
                        var no_telepon = $("#no_telepon").val();
                        var jenis_kelamin=formsimpan.jenis_kelamin[0].checked;
                        var jenis_kelamin2=formsimpan.jenis_kelamin[1].checked;
                        var tanggal_lahir = $("#tanggal_lahir").val();
                        var dokter = $("#dokter").val();
                        var keperluan=$("#keperluan").val();
                        if(tanggal_registrasi==""){
                            alert('Tanggal Registrasi tidak boleh kosong!');
                            $("#tanggal_registrasi").focus();
                        }
                        else if(nama==""){
                            alert('Nama tidak boleh kosong!');
                            $("#nama").focus();
                        }
                        else if(alamat==""){
                            alert('Alamat tidak boleh kosong!');
                            $("#alamat").focus();
                        }
                        else if(no_telepon==""){
                            alert('No Telepon tidak boleh kosong!');
                            $("#no_telepon").focus();
                        }
                         else if(jenis_kelamin==false && jenis_kelamin2==false ){
                            alert('Jenis Kelamin masih kosong!');
                        }
                        else if(tanggal_lahir==""){
                            alert('Tanggal Lahir tidak boleh kosong!');
                            $("#tanggal_lahir").focus();
                        }
                        else if(dokter==""){
                            alert('Dokter tidak boleh kosong!');
                            $("#dokter").focus();
                        }
                        else if(keperluan==""){
                            alert('Keperluan tidak boleh kosong!');
                            $("#keperluan").focus();
                        }
                        else{
                            $("#formsimpan").submit();
                        }
                    });
                });
    </script>
<?php 
    foreach ($data_appointment->result_array() as $tampil) {
?>
<h3>Appointment</h3>
<hr>
<div id="real">
  <div id="statusdonor">
    <?php echo form_open('loket/appointment/edit','id="formsimpan"','class="form-horizontal"'); ?>
    <input type="hidden" name="id_appointment" value="<?php echo $tampil['id_appointment'];?>">
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
                        $("#tanggal_registrasi").val("<?php echo date('Y-m-d');?>");
                    });
                </script>
                <p><input type="text" name="tanggal_registrasi" value="<?php echo $tampil['tanggal_registrasi'];?>" id="tanggal_registrasi" class="span3" placeholder="Tanggal Registrasi..." /></p>

                </td>
                <td style="width:30%; color:red;"><?php echo form_error('tanggal_lahir'); ?> </td>
               
            </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" id="nama" placeholder="Nama..." value="<?php echo $tampil['nama'];?>" class="span3" size="30" ></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('nik'); ?></td> 
        </tr>

        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input type="text" name="alamat" id="alamat" placeholder="Alamat..." value="<?php echo $tampil['alamat'];?>" class="span3" size="30" ></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('nama_anggota'); ?></td> 
        </tr>

        <tr>
            <td>No Telepon</td>
            <td>:</td>
            <td><input type="text" name="no_telepon" id="no_telepon" placeholder="No Telepon..." value="<?php echo $tampil['no_telepon'];?>" class="span3" size="30" ></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('alamat'); ?></td> 
        </tr>

        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
               <label class="radio inline">
                        <?php
                            if($tampil['jenis_kelamin']=="l"){
                        ?>
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="l" checked>
                            Laki Laki
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="l" >
                            Laki Laki
                        <?php
                            }
                        ?>
                    </label>
                    <label class="radio inline">
                        <?php
                            if($tampil['jenis_kelamin']=="p"){
                        ?>
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="p" checked>
                            Perempuan
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="p" >
                            Perempuan
                        <?php
                            }
                        ?>
                    </label>     
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('sex'); ?></td> 
        </tr>

        <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td>
                <script>
                    $(function() {
                        $( "#tanggal_lahir" ).datepicker({
                        changeMonth: true,
                        changeYear: true
                        });
                        $( "#tanggal_lahir" ).change(function() {
                            $( "#tanggal_lahir" ).datepicker( "option", "dateFormat","yy-mm-dd" );
                        });
                    });
                </script>
                <p><input type="text" name="tanggal_lahir" value="<?php echo $tampil['tanggal_lahir'];?>" id="tanggal_lahir" class="span3" placeholder="Tanggal Lahir..." /></p>

            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('tgl_lahir'); ?></td> 
        </tr>
        <tr>
            <td>Dokter</td>
            <td>:</td>
            <td>
                <select name="dokter" class="span4" id="dokter">
                    <option value="">==Silahkan Pilih==</option>
                     <?php
                            foreach ($data_dokter->result_array() as $tampil2) {
                            if($tampil['dokter_id']==$tampil2['nik_dokter']){
                            ?>
                            <option value="<?php echo $tampil2['nik_dokter'];?>" selected="selected"><?php echo $tampil2['nama_dokter'];?></option>
                            <?php
                            }
                            else{
                                ?>
                                <option value="<?php echo $tampil2['nik_dokter'];?>"><?php echo $tampil2['nama_dokter'];?></option>
                                <?php
                            }
                        }
                        ?>       
                </select>
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('umur'); ?></td> 
        </tr>

        <tr>
            <td>Keperluan</td>
            <td>:</td>
            <td>
                <textarea name="keperluan" id="keperluan" class="span4" rows="5"><?php echo $tampil['keperluan'];?></textarea>
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
      </tbody>

    </table>
    <?php echo form_close(); ?>
<?php
}
?>
  </div>
</div>


    