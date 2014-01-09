<html>
<head>
  <title></title>
  <script type="text/javascript">
    $(document).ready(function() {


      <?php 
        $n = 1;
        if($detail_gudang_penerimaan2->num_rows()>0)
        {
          foreach($detail_gudang_penerimaan2->result_array() as $data)
          {

          echo "
            $(\"#simpan".$n."\").hide();
            $(\"#jumlah".$n."\").show();
            $(\"#keterangan".$n."\").show();
            $(\"#nota".$n."\").hide();
            $(\"#keterangan2".$n."\").hide();
            $(\"#tampilketerangan".$n."\").hide();
              $(\"#tampiljumlah".$n."\").hide();
            $(\"#edit".$n."\").click(function() {
              $(\"#simpan".$n."\").show();
              $(\"#nota".$n."\").show();
              $(\"#keterangan2".$n."\").show();
              $(\"#jumlah".$n."\").hide();
              $(\"#keterangan".$n."\").hide();
              
            });
         $(\"#simpan".$n."\").click(function() {
              var jumlah = $(\"#nota".$n."\").val();
              var keterangan = $(\"#keterangan2".$n."\").val();
              var id2 = $(\"#id".$n."\").val();

               $.ajax({
                            type:\"POST\",
                            url :\"".base_url()."farmasi/gudang_penerimaan/updateid\",
                            data: \"jumlah=\"+jumlah+\"&keterangan=\"+keterangan+\"&id=\"+id2 ,
                            success : function (data) {
                                $(\"#tampiljumlah".$n."\").html(data);
                                $(\"#tampilketerangan".$n."\").html(data);
                                window.location.reload();
                            }

                            
                        });

  


              $(\"#simpan".$n."\").show();
              $(\"#simpan".$n."\").hide();
              $(\"#nota".$n."\").hide();
              $(\"#keterangan2".$n."\").hide();
              $(\"#jumlah".$n."\").hide();
              $(\"#keterangan".$n."\").hide();
               $(\"#tampiljumlah".$n."\").show();
            $(\"#tampilketerangan".$n."\").show();
            });

              $(\"#cek_list\").click(function() {
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
      <?php echo form_open('farmasi/gudang_penerimaan/cek_list');?>
      <?php foreach ($gudang_penerimaan_header2->result_array() as $h) { ?>
         
      <table class="table">
          
          <tbody>
            <tr>
                <td>No Nota</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['no_nota'];
                  ?>
                  
                </td>
                
            </tr>

            <tr>
                <td>Dari</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['nama_unit_kerja'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Penerima</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['tujuan'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Tanggal Terima</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['tanggal'];
                  ?>
                </td>
              
               
            </tr>

            

          </tbody>

         </table>
     <!-- <a href="<?php echo base_url();?>farmasi/gudang_penerimaan/add/<?php echo $h['id'];?>" class="btn btn-small">Tambah Gudang Apotek Penerimaan</a> 
     <br><br>-->
<center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
<table class="table table-striped">

            <thead>
              <th>No</th>
		      <th width="250px">Nama Obat</th>
		      <th width="60px">Jumlah</th>
          <th>Keterangan</th>
		      <th width="125px" >Aksi</th>
        
        
            </thead>

            <tbody>
              <?php
        $no = 1;
        if($detail_gudang_penerimaan2->num_rows()>0)
        {
          foreach($detail_gudang_penerimaan2->result_array() as $data)
          {
        ?>
        
        <tr>
          <input type="hidden" id="id<?php echo $no ; ?>" value="<?php echo $data['id']; ?>">
          <input type="hidden" name="idpenerimaan" value="<?php echo $h['id']; ?>">
          
          <td><?php echo $no ; ?> </td>
          <td><?php echo $data['nama_obat']; ?></td>
          <td>
            <label id="jumlah<?php echo $no ; ?>"><?php echo $data['jumlah']; ?></label><input type="text" class="span1" id="nota<?php echo $no;?>" value="<?php
                    echo $data['jumlah']; ?>"> <div id="tampiljumlah<?php echo $no ; ?>">coba</div>
          </td>
          <td>
            <label id="keterangan<?php echo $no ; ?>"><?php echo $data['keterangan']; ?></label><input type="text" class="span3" id="keterangan2<?php echo $no;?>" value="<?php
                    echo $data['keterangan']; ?>"><div id="tampilketerangan<?php echo $no ; ?>">coba</div>
          </td>
          <td>

            <?php 

            $id = $h['id'];
            $cek = "sudah";
            $query = $this->gudang_penerimaan_model->sudahada($id,$cek);

            if ($query->num_rows>0) {

          echo "&#x2713";
          }
            
            else{
              ?>


            <a class="btn btn-small" ><i class="icon icon-wrench" id="edit<?php echo $no ; ?>"></i></a>
            <a id="simpan<?php echo $no ; ?>" class="btn btn-small"><i class="icon icon-ok" ></i></a>
            <a href="<?php echo base_url();?>farmasi/gudang_penerimaan/delete_item/<?php echo $data['keluar_id'];?>/<?php echo $data['id'];?>" class="btn btn-small" onclick="return confirm('Apakah Anda Yakin Ingin Mengahapus <?php echo $data['nama_obat']; ?> ?')" id="delete<?php echo $no ; ?>"><i class="icon icon-remove"></i></a>
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
       

      <a href="<?php echo base_url();?>farmasi/gudang_penerimaan/view_penerimaan" class="btn btn-small">Kembali</a>
      <a class="btn btn-small" onclick="javascript:window.open('<?php echo base_url()?>farmasi/gudang_penerimaan/cetak/<?php echo $h['id']; ?>','mywin','left=20,top=10,width=590,height=600,toolbar=0,resizable=0')"><i class="icon icon-print"></i>Cetak</a>
      <input type="submit" name="submit" id="cek_list" class="btn btn-small" value="Cek List">

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