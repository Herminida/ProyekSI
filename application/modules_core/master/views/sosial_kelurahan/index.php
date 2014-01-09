<div id="real">
    <div id="statusdonor">
        <div><b>::. DATA KELURAHAN </b> 
            <b style="float:right; margin-right:148px; color:red;"><?php echo validation_errors(); ?></b>
        </div>
        <table class="table">
            <?php echo form_open('master/sosial_kelurahan/search','class="navbar-form pull-right" ');?>
            <tr>
                <td width="56%"><a class ="btn btn-small  " href="<?php echo base_url().'master/sosial_kelurahan/add' ;?>">Tambah Kelurahan</a></td>
                <td><input name="keysearch" placeholder="Masukkan Kata Kunci.."></td>
                <td><button type="submit" class="btn btn-small  "><i class="icon-search  "></i>Cari Kelurahan</button></td>              
            
            </tr>
            <?php echo form_close(); ?>
        </table>
        <center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
        <table class="table table-striped">
            <thead>
                <th>No</th>
                <th>Aksi</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>

            </thead>

           <tbody>

                <?php
                $no = 1;
                    foreach($kelurahan->result_array() as $db)
                    {
                ?>
                <tr>
                    <td><?php echo $no ; ?> </td>
                    <td>
                        <a class='btn btn-small  ' href="<?php echo base_url(); ?>master/sosial_kelurahan/edit/<?php echo $db['id_kelurahan']; ?>"><i class="icon-wrench  "></i></a>
                        <a class='btn btn-small  ' href="<?php echo base_url(); ?>master/sosial_kelurahan/delete/<?php echo $db['id_kelurahan']; ?>" onclick="return confirm('Anda yakin ingin mengahapus kelurahan <?php echo $db['nama_kelurahan'] ?> ?');"><i class="icon-remove"></i></a>
                    </td>
                    <td><?php echo $db['nama_kecamatan']; ?></td>
                    <td><?php echo $db['nama_kelurahan']; ?></td>
                </tr>
                <?php
                $no++;

                    }       
            ?>
            </tbody>

        </table>

    </div>

</div>