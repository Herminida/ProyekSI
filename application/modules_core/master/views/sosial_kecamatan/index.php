<div id="real">
    <div id="statusdonor">
        <div><b>::. DATA KECAMATAN </b> 
            <b style="float:right; margin-right:140px; color:red;"><?php echo validation_errors(); ?></b>
        </div>
        <table class="table">
            <?php echo form_open('master/sosial_kecamatan/search','class="navbar-form pull-right" ');?>
            <tr>
                <td width="56%"><a class ="btn btn-small  " href="<?php echo base_url().'master/sosial_kecamatan/add' ;?>">Tambah Kecamatan</a></td>
                <td><input name="keysearch" placeholder="Masukkan Kata Kunci.."></td>
                <td><button type="submit" class="btn btn-small  "><i class="icon-search  "></i>Cari Kecamatan</button></td>              
            
            </tr>
            <?php echo form_close(); ?>
        </table>
        <center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
        <table class="table table-striped">
            <thead>
                <th>No</th>
                <th>Aksi</th>
                <th>Kecamatan</th>

            </thead>

            <tbody>

                <?php
                $no = 1;
                    foreach($kecamatan->result_array() as $db)
                    {
                ?>
                <tr>
                    <td><?php echo $no ; ?> </td>
                    <td>
                        <a class='btn btn-small  ' href="<?php echo base_url(); ?>master/sosial_kecamatan/edit/<?php echo $db['id_kecamatan']; ?>"><i class="icon-wrench  "></i></a>
                        <a class='btn btn-small  ' href="<?php echo base_url(); ?>master/sosial_kecamatan/delete/<?php echo $db['id_kecamatan']; ?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $db['nama_kecamatan'] ?> ?');"><i class="icon-remove"></i></a>
                    </td>
                    <td><?php echo $db['nama_kecamatan']; ?></td>
                </tr>
                <?php
                $no++;

                    }       
            ?>
            </tbody>

        </table>

    </div>

</div>
<?php 
$pesan = $this->session->flashdata('message');
                if ($this->session->flashdata('message')){
echo "<script>alert('$pesan')</script>";
                }
            
            ?>