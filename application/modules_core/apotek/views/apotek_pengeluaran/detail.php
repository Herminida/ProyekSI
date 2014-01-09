<html>
<head>
  <title></title>
  <script type="text/javascript">
    $(document).ready(function() {


      <?php 
        $n = 1;
        if($detail_apotek_pengeluaran->num_rows()>0)
        {
          foreach($detail_apotek_pengeluaran->result_array() as $data)
          {

          echo "
            $(\"#simpan".$n."\").hide();
            $(\"#jumlah".$n."\").show();
            $(\"#keterangan".$n."\").show();
            $(\"#jenis_keluar".$n."\").show();
            $(\"#nota".$n."\").hide();
            $(\"#keterangan2".$n."\").hide();
            $(\"#jeniskeluar".$n."\").hide();
            $(\"#tampilketerangan".$n."\").hide();
            $(\"#tampiljumlah".$n."\").hide();
            $(\"#tampiljeniskeluar".$n."\").hide();

            $(\"#edit".$n."\").click(function() {
              $(\"#simpan".$n."\").show();
              $(\"#nota".$n."\").show();
              $(\"#jeniskeluar".$n."\").show();
              $(\"#keterangan2".$n."\").show();
              $(\"#jumlah".$n."\").hide();
              $(\"#keterangan".$n."\").hide();
              $(\"#jenis_keluar".$n."\").hide();
              
            });
         $(\"#simpan".$n."\").click(function() {
              var jumlah = $(\"#nota".$n."\").val();
              var keterangan = $(\"#keterangan2".$n."\").val();
              var jenis = $(\"#jeniskeluar".$n."\").val();
              var id2 = $(\"#id_detail".$n."\").val();

               $.ajax({
                            type:\"POST\",
                            url :\"".base_url()."apotek/apotek_pengeluaran/updateid\",
                            data: \"jumlah=\"+jumlah+\"&keterangan=\"+keterangan+\"&id_detail=\"+id2+\"&jeniskeluar=\"+jenis ,
                            success : function (data) {
                                $(\"#tampiljumlah".$n."\").html(data);
                                $(\"#tampilketerangan".$n."\").html(data);
                                $(\"#tampiljeniskeluar".$n."\").html(data);
                                window.location.reload();
                            }

                            
                        });

  


              
              $(\"#simpan".$n."\").hide();
              $(\"#nota".$n."\").hide();
              $(\"#jeniskeluar".$n."\").hide();
              $(\"#keterangan2".$n."\").hide();
              $(\"#jumlah".$n."\").hide();
              $(\"#jenis_keluar".$n."\").hide();
              $(\"#keterangan".$n."\").hide();
               $(\"#tampiljumlah".$n."\").show();
            $(\"#tampilketerangan".$n."\").show();
            $(\"#tampiljeniskeluar".$n."\").show();
            });
  
             $(\"#validasi\").click(function() {
              $(\"#edit".$n."\").hide();
              $(\"#delete".$n."\").hide();


             });
            ";
          $n++;
          }
        }
        ?>

        

    });
  </script>
</head>
<body>
  <div id="real">
    <div id="statusdonor">
      <?php echo form_open('apotek/apotek_pengeluaran/validasi');?>
      <?php foreach ($apotek_pengeluaran_header->result_array() as $h) { ?>
         
      <table class="table">
          <input type="hidden" name="tanggal_keluar" value="<?php echo $h['tanggal_registrasi']; ?>">
          
          <tbody>
            <tr>
                <td>No Resep</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['no_resep'];
                  ?>
                  
                </td>
                
            </tr>

            <tr>
                <td>Nama Dokter</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['nama_dokter'];
                  ?>
                  
                </td>
                
            </tr>

            <tr>
                <td>Nama Klinik</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['nama_klinik'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Tanggal Periksa</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['tanggal_registrasi'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Nama Pasien</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['nama_anggota'];
                  ?>
                </td>
              
               
            </tr>
            <tr>
                <td>Nomer Rekam Medis</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['no_rm'];
                  ?>
                </td>
              
               
            </tr>
            
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['sex'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Umur</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['umur'];
                  ?>
                </td>
              
               
            </tr>
            
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['alamat'];
                  ?>
                </td>
              
               
            </tr>

          </tbody>

         </table>
          <?php
            $id=$h['pemeriksaan_id']; 
             $query = $this->apotek_pengeluaran_model->double($id);
                
    if ($query->num_rows>0) {

    echo "";
    }
            
            else{
              ?>
     <a href="<?php echo base_url();?>apotek/apotek_pengeluaran/add/<?php echo $h['pemeriksaan_id'];?>" class="btn btn-small">Tambah Obat Resep</a>
     <br><br>
      <?php
          }
            ?>
<center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
<table class="table table-striped">

            <thead>
              <th>No</th>
		      <th width="250px">Nama Obat</th>
          <th width="60px">Jumlah</th>
		      <th width="10px">Aturan Pakai</th>
          <th>Keterangan</th>
		      <th width="165px" >Aksi</th>
        
        
            </thead>

            <tbody>
              <?php
        $no = 1;
        if($detail_apotek_pengeluaran->num_rows()>0)
        {
          foreach($detail_apotek_pengeluaran->result_array() as $data)
          {
        ?>
        
        <tr>
          
          <input type="hidden" id="id<?php echo $no ; ?>" name="item_id<?php echo $no ; ?>" value="<?php echo $data['item_id']; ?>">
          <input type="hidden"  name="pemeriksaan_id" value="<?php echo $data['pemeriksaan_id']; ?>">
          <input type="hidden" id="id_detail<?php echo $no ; ?>" value="<?php echo $data['id_detail']; ?>">
          <td><?php echo $no ; ?> </td>
          <td><?php echo $data['nama_obat']; ?></td>
          <td>
            <label id="jumlah<?php echo $no ; ?>"><?php echo $data['jumlah']; ?></label><input type="text" name="jumlah" class="span1" id="nota<?php echo $no;?>" value="<?php
                    echo $data['jumlah']; ?>"> <div id="tampiljumlah<?php echo $no ; ?>"></div>
          </td>
          <td>
            <label id="jenis_keluar<?php echo $no ; ?>"><?php echo $data['segma']; ?></label><input type="text" class="span1" id="jeniskeluar<?php echo $no;?>" value="<?php
                    echo $data['segma']; ?>"> <div id="tampiljeniskeluar<?php echo $no ; ?>"></div>
          </td>
          <td>
            <label id="keterangan<?php echo $no ; ?>"><?php echo $data['ket_resep']; ?></label><input type="text" class="span3" id="keterangan2<?php echo $no;?>" value="<?php
                    echo $data['ket_resep']; ?>"><div id="tampilketerangan<?php echo $no ; ?>"></div>
          </td>
          <td>
            <?php
            $id=$data['pemeriksaan_id']; 
             $query = $this->apotek_pengeluaran_model->double($id);
                
    if ($query->num_rows>0) {

    echo "Obat sudah di validasi";
    }
            
            else{
              ?>
            <a class="btn btn-small" ><i class="icon icon-wrench" id="edit<?php echo $no ; ?>"></i></a>
            <a id="simpan<?php echo $no ; ?>" class="btn btn-small"><i class="icon icon-ok" ></i></a>
            <a href="<?php echo base_url();?>apotek/apotek_pengeluaran/delete_item/<?php echo $data['pemeriksaan_id'];?>/<?php echo $data['id_detail'];?>" class="btn btn-small" onclick="return confirm('Apakah Anda Yakin Ingin Mengahapus <?php echo $data['nama_obat']; ?> ?')" id="delete<?php echo $no ; ?>"><i class="icon icon-remove"></i></a>
          <?php
          }
            ?>

          </td>
          
        </tr>

        


        <?php
        $no++;

          }

        }
        else
        {
          ?>
          
        <tr style="text-align:center;">
          <td colspan="6">Tidak Ada Obat</td>
        </tr>
          <?php
        }
      ?>

            </tbody>
        </table>
       

      <a href="<?php echo base_url();?>apotek/apotek_pengeluaran" class="btn btn-small">Kembali</a>
      <a class="btn btn-small" onclick="javascript:window.open('<?php echo base_url()?>apotek/apotek_pengeluaran/cetak/<?php echo $h['pemeriksaan_id']; ?>','mywin','left=20,top=10,width=590,height=600,toolbar=0,resizable=0')"><i class="icon icon-print"></i> Cetak</a>
      <input type="submit" name="submit" id="validasi" class="btn  btn-small" value="Validasi">
      
      <?php
      }
      ?>

    </div>
 
  </div>
  <?php echo form_close();?>

  <?php 
$pesan = $this->session->flashdata('message');
        if ($this->session->flashdata('message')){
echo "<script>alert('$pesan')</script>";
        }
      
      ?>

</body>
</html>