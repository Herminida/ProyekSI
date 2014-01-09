<div id="real">
    <div id="statusdonor">
        <div><b>::. HASIL CARI KELURAHAN </b> </div>

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
                if($get_data->num_rows()>0)
                {
                    foreach($get_data->result_array() as $db)
                    {
                ?>
                
                <tr>
                    <td><?php echo $no ; ?> </td>
                    <td>
                        <a class='btn btn-small  ' href="<?php echo base_url(); ?>loket/sosial_kelurahan/edit/<?php echo $db['id_kelurahan']; ?>"><i class="icon-wrench  "></i></a>
                        <a class='btn btn-small  ' href="<?php echo base_url(); ?>loket/sosial_kelurahan/delete/<?php echo $db['id_kelurahan']; ?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $db['nama_kelurahan'] ?> ?');"><i class="icon-remove"></i></a>
                    

                    </td>

                    <td><?php echo $db['nama_kecamatan']; ?></td>
                    <td><?php echo $db['nama_kelurahan']; ?></td>
                </tr>

                


                <?php
                $no++;

                    }

                }
                else
                {
                    ?>
                    
                <tr style="text-align:center;">
                    <td colspan="6">Tidak Ada Data Yang ditemukan</td>
                </tr>
                    <?php
                }
            ?>


            </tbody>

        </table>

    <a href="<?php echo base_url();?>loket/sosial_kelurahan" class="btn btn-small  ">Kembali</a>
                

    </div>

</div>


