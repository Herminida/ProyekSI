<html>
<head>
  <title></title>
  <script type="text/javascript">
    $(document).ready(function() {


      <?php 
        $n = 1;
        if($detail_gudang_pengeluaran->num_rows()>0)
        {
          foreach($detail_gudang_pengeluaran->result_array() as $data)
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
              var id2 = $(\"#id".$n."\").val();

               $.ajax({
                            type:\"POST\",
                            url :\"".base_url()."farmasi/gudang_pengeluaran/updateid\",
                            data: \"jumlah=\"+jumlah+\"&keterangan=\"+keterangan+\"&id=\"+id2+\"&jeniskeluar=\"+jenis ,
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
      <?php foreach ($gudang_pengeluaran_header->result_array() as $h) { ?>
         
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
                <td>Tujuan</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['tujuan'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Tanggal Keluar</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['tanggal'];
                  ?>
                </td>
              
               
            </tr>

            

            

          </tbody>

         </table>
     <a href="<?php echo base_url();?>farmasi/gudang_pengeluaran/add/<?php echo $h['id'];?>" class="btn btn-small">Tambah Gudang Pengeluaran</a>
     <br><br>
<center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
<table class="table table-striped">

            <thead>
              <th>No</th>
		      <th width="250px">Nama Obat</th>
          <th width="60px">Jumlah</th>
		      <th width="10px">Jenis Keluar</th>
          <th>Keterangan</th>
		      <th width="165px" >Aksi</th>
        
        
            </thead>

            <tbody>
              <?php
        $no = 1;
        if($detail_gudang_pengeluaran->num_rows()>0)
        {
          foreach($detail_gudang_pengeluaran->result_array() as $data)
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
            <label id="jenis_keluar<?php echo $no ; ?>"><?php echo $data['jenis_keluar']; ?></label><input type="text" class="span1" id="jeniskeluar<?php echo $no;?>" value="<?php
                    echo $data['jenis_keluar']; ?>"> <div id="tampiljeniskeluar<?php echo $no ; ?>">coba</div>
          </td>
          <td>
            <label id="keterangan<?php echo $no ; ?>"><?php echo $data['keterangan']; ?></label><input type="text" class="span3" id="keterangan2<?php echo $no;?>" value="<?php
                    echo $data['keterangan']; ?>"><div id="tampilketerangan<?php echo $no ; ?>">coba</div>
          </td>
          <td><a class="btn btn-small" ><i class="icon icon-wrench" id="edit<?php echo $no ; ?>"></i></a>
            <a id="simpan<?php echo $no ; ?>" class="btn btn-small"><i class="icon icon-ok" ></i></a>
            <a href="<?php echo base_url();?>farmasi/gudang_pengeluaran/delete_item/<?php echo $data['keluar_id'];?>/<?php echo $data['id'];?>" class="btn btn-small" onclick="return confirm('Apakah Anda Yakin Ingin Mengahapus <?php echo $data['nama_obat']; ?> ?')" id="delete<?php echo $no ; ?>"><i class="icon icon-remove"></i></a>
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
       

      <a href="<?php echo base_url();?>farmasi/gudang_pengeluaran" class="btn btn-small">Kembali</a>
      <a href="<?php echo base_url();?>farmasi/gudang_pengeluaran/view/" class="btn btn-small">List Pengeluaran</a>
      <a class="btn btn-small" onclick="javascript:window.open('<?php echo base_url()?>farmasi/gudang_pengeluaran/cetak/<?php echo $h['id']; ?>','mywin','left=20,top=10,width=590,height=600,toolbar=0,resizable=0')"><i class="icon icon-print"></i> Cetak</a>

      <?php
      }
      ?>

    </div>

  </div>
  <?php 
$pesan = $this->session->flashdata('message');
        if ($this->session->flashdata('message')){
echo "<script>alert('$pesan')</script>";
        }
      
      ?>

</body>
</html>