<html>
<head>
  <title></title>
  <script type="text/javascript">
    $(document).ready(function() {


      <?php 
        $n = 1;
        if($detail_gudang_penerimaan->num_rows()>0)
        {
          foreach($detail_gudang_penerimaan->result_array() as $data)
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
                            url :\"".base_url()."gudang_penerimaan/updateid\",
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
      <?php foreach ($gudang_penerimaan_header->result_array() as $data) { ?>
         
      <table class="table">
          
          <tbody>
            <tr>
                <td>No Nota</td>
                <td>:</td>
                <td>
                  <?php
                    echo $data['no_nota'];
                  ?>
                  
                </td>
                
            </tr>

            <tr>
                <td>Tujuan</td>
                <td>:</td>
                <td>
                  <?php
                    echo $data['nama_unit_kerja'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Tanggal Terima</td>
                <td>:</td>
                <td>
                  <?php
                    echo $data['tanggal'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Sumber</td>
                <td>:</td>
                <td>
                  <?php
                    echo $data['nama_sumber'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Supplier</td>
                <td>:</td>
                <td>
                  <?php
                    echo $data['nama_supplier'];
                  ?>
                </td>
              
               
            </tr>

          </tbody>

         </table>
     <a href="<?php echo base_url();?>gudang_penerimaan/add/<?php echo $data['id'];?>" class="btn btn-small btn-success">Tambah Gudang Penerimaan</a>
     <br><br>

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
        if($detail_gudang_penerimaan->num_rows()>0)
        {
          foreach($detail_gudang_penerimaan->result_array() as $data)
          {
        ?>
        
        <tr>
          <input type="hidden" id="id<?php echo $no ; ?>" value="<?php echo $data['id']; ?>">
          
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
          <td><a class="btn btn-small btn-success" ><i class="icon icon-wrench" id="edit<?php echo $no ; ?>"></i></a>
            <a id="simpan<?php echo $no ; ?>" class="btn btn-small btn-success"><i class="icon icon-ok" ></i></a>
            <a href="<?php echo base_url();?>gudang_penerimaan/delete_item/<?php echo $data['terima_id'];?>/<?php echo $data['id'];?>" class="btn btn-small btn-warning" onclick="return confirm('Apakah Anda Yakin Ingin Mengahapus <?php echo $data['nama_obat']; ?> ?')" id="delete<?php echo $no ; ?>"><i class="icon icon-remove icon-white"></i></a>
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
       

      <a href="<?php echo base_url();?>gudang_penerimaan" class="btn btn-mini btn-success">Kembali</a>
      <a href="<?php echo base_url();?>gudang_penerimaan/view/" class="btn btn-mini btn-success">List Penerimaan</a>
     

      <?php
      }
      ?>

    </div>

  </div>

</body>
</html>