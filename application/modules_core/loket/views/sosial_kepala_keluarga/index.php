<div id="real">
    <div id="statusdonor">
        <div><b>::. DATA KEPALA KELUARGA</b></div>
        <table class="table">
        <?php echo form_open('loket/sosial_kepala_keluarga/search','class="navbar-form pull-right"'); ?>
            <tr>
                <td width="50%"><a class="btn btn-small  " href="<?php echo base_url().'loket/sosial_kepala_keluarga/add';?>"> Tambah KK Baru</a></td>
                <td><input name="keysearch" placeholder="Masukkan kata kunci..."></td>
                <td><button type="submit" class="btn btn-small  "><i class="icon-search  "></i> Cari Kepala Keluarga</button></td>
            </tr>
        <?php echo form_close(); ?>
        </table>
        <center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
            <ul>
            <?php
              echo $paginator;
            ?>
            </ul>
        <table class="table table-striped">
            <thead>
                <tr>
                   <th>No</th> <th>Aksi</th><th>No KK</th><th>Nama</th><th>Alamat</th><th>RT/RW</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $no=$tot+1;
                $no2=1;
                    foreach($kk->result_array() as $db)
                    {
                ?>
                <tr>
                    <td><?php echo $no ; ?> </td>
                    <td>
                        <a class='btn btn-small  ' href="<?php echo base_url(); ?>loket/sosial_anggota_keluarga/add/<?php echo $db['id']; ?>/<?php echo $db['no_kk'];?>"><i class="icon-plus-sign  "></i>Akk</a>
                        <a class='btn btn-small  ' href="<?php echo base_url(); ?>loket/sosial_kepala_keluarga/edit/<?php echo $db['id']; ?>/<?php echo $db['no_kk'];?>"><i class="icon-wrench"></i></a>
                        <a class='btn btn-small  ' href="<?php echo base_url(); ?>loket/sosial_kepala_keluarga/delete/<?php echo $db['id']; ?>/<?php echo $db['no_kk'];?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $db['nama_kk']?> ?');"><i class="icon-remove"></i></a>
                        <a class='btn btn-small  ' href="<?php echo base_url(); ?>loket/sosial_kepala_keluarga/detail/<?php echo $db['id']; ?>/<?php echo $db['no_kk'];?>">Detail</a>
                        
                    </td>
                    <td><?php echo $db['no_kk']; ?></td>
                    <td><?php echo $db['nama_kk']; ?></td>
                    <td><?php echo $db['alamat']; ?></td>
                    <td><?php echo $db['rt']; ?>/<?php echo $db['rw'];?></td>
                </tr>
                <?php
                $no++;
                $no2++;

                    }       
            ?>
            </tbody>
        </table>

        <div class="pagination pagination-centered">
            <ul>
            <?php
              echo $paginator;
            ?>
            </ul>
        </div>
    </div>
</div>