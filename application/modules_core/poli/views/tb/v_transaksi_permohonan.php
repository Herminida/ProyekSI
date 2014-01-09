<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
      <?php if($tab=='abc'){?>
        <li class="active"><a href="#" onclick="return false">Diagnosa ABC<br>&nbsp;</a></li>
      <?php }else{?>
        <li><?php echo anchor('poli/tb/transaksi_permohonan','Diagnosa ABC<br>&nbsp;')?></li>
      <?php }?>
      <?php if($tab=='de'){?>
        <li style="text-align:center" class="active"><a href="#" onclick="return false">Follow Up<br>Akhir Intensif (DE)</a></li>
      <?php }else{?>
        <li style="text-align:center"><?php echo anchor('poli/tb/transaksi_permohonan/de','Follow Up<br>Akhir Intensif (DE)')?></li>
      <?php }?>
      <?php if($tab=='jk'){?>
        <li style="text-align:center" class="active"><a href="#" onclick="return false">Follow Up<br>Akhir Sisipan (JK)</a></li>
      <?php }else{?>
        <li style="text-align:center"><?php echo anchor('poli/tb/transaksi_permohonan/jk','Follow Up<br>Akhir Sisipan (JK)')?></li>
      <?php }?>
      <?php if($tab=='fg'){?>
        <li style="text-align:center" class="active"><a href="#" onclick="return false">Follow Up<br>1 Bln Sebelum AP (FG)</a></li>
      <?php }else{?>
        <li style="text-align:center"><?php echo anchor('poli/tb/transaksi_permohonan/fg','Follow Up<br>1 Bln Sebelum AP (FG)')?></li>
      <?php }?>
      <?php if($tab=='hi'){?>
        <li style="text-align:center" class="active"><a href="#" onclick="return false">Follow Up<br>Akhir Pengobatan /AP (HI)</a></li>
      <?php }else{?>
        <li style="text-align:center"><?php echo anchor('poli/tb/transaksi_permohonan/hi','Follow Up<br>Akhir Pengobatan /AP (HI)')?></li>
      <?php }?>
    </ul>

    <form id="frmTransaksi">

        <div class="well" id="rowKpp">
            <table>
                <tr>
                    <td><label for="no_rm_tb">NIK TB</label></td>
                    <td><div class="input-append pull-left">
                        <input type="text" id="no_rm_tb" name="no_rm_tb" class="input-medium" readonly/>
                        <a class="btn btn-small" type="button" href="<?php echo site_url('poli/'.'popup/kpp/setkpp')?>" rel="facebox"><i class="icon-search"></i></a>
                    </div></td>
                </tr>
                <tr>
                    <td><label for="nama_anggota">Nama</label></td>
                    <td><input type="text" id="nama_anggota" name="nama_anggota" class="input-medium" readonly/></td>
                </tr>
                <tr>
                    <td><label for="yankes">Unit Yankes</label></td>
                    <td><select id="yankes" name="yankes" class="input-large">
                        <option value="">-- pilih --</option>
                        <?php foreach ($unit_kerja as $key => $value) {
                            echo '<option value="'.$value->id_unit_kerja.'">'.$value->nama_unit_kerja.'</option>';
                        }?>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="diagnosa">Alasan Pemeriksaan (Diagnosa)</label></td>
                    <td><select id="diagnosa" name="diagnosa" class="input-mini">
                        <?php if($tab=='abc'){?>
                        <option>A</option><option>B</option>
                        <option>C</option><option>ABC</option>
                        <?php }elseif($tab=='de'){?>
                        <option>D</option><option>E</option><option>DE</option>
                        <?php }elseif($tab=='fg'){?>
                        <option>F</option><option>G</option><option>FG</option>
                        <?php }elseif($tab=='hi'){?>
                        <option>H</option><option>I</option><option>HI</option>
                        <?php }elseif($tab=='jk'){?>
                        <option>J</option><option>K</option><option>JK</option>
                        <?php }?>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="tgl_ambil_s1">Tanggal Pengambilan Dahak A (s1)</label></td>
                    <td><div class="bfh-datepicker" data-format="d-m-y" data-date="">
                      <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                         <input type="text" class="input-small" id="tgl_ambil_s1" name="tgl_ambil_s1" readonly value="<?php echo date('d-m-Y')?>">
                         <button class="btn btn-small" type="button"><i class="icon-calendar"></i></button>
                      </div>
                      <div class="bfh-datepicker-calendar">
                        <table class="calendar table table-bordered">
                          <thead>
                            <tr class="months-header">
                              <th class="month" colspan="4">
                                <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                <span></span>
                                <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                              </th>
                              <th class="year" colspan="3">
                                <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                <span></span>
                                <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                              </th>
                            </tr>
                            <tr class="days-header">
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div></td>
                </tr>
                <tr>
                    <td><label for="tgl_ambil_p">Tanggal Pengambilan Dahak B (P)</label></td>
                    <td><div class="bfh-datepicker" data-format="d-m-y" data-date="">
                      <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                         <input type="text" class="input-small" id="tgl_ambil_p" name="tgl_ambil_p" readonly value="<?php echo date('d-m-Y')?>">
                         <button class="btn btn-small" type="button"><i class="icon-calendar"></i></button>
                      </div>
                      <div class="bfh-datepicker-calendar">
                        <table class="calendar table table-bordered">
                          <thead>
                            <tr class="months-header">
                              <th class="month" colspan="4">
                                <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                <span></span>
                                <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                              </th>
                              <th class="year" colspan="3">
                                <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                <span></span>
                                <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                              </th>
                            </tr>
                            <tr class="days-header">
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div></td>
                </tr>
                <?php if($tab=='abc'){?>
                <tr>
                    <td><label for="tgl_ambil_s2">Tanggal Pengambilan Dahak C (S2)</label></td>
                    <td><div class="bfh-datepicker" data-format="d-m-y" data-date="">
                      <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                         <input type="text" class="input-small" id="tgl_ambil_s2" name="tgl_ambil_s2" readonly value="<?php echo date('d-m-Y')?>">
                         <button class="btn btn-small" type="button"><i class="icon-calendar"></i></button>
                      </div>
                      <div class="bfh-datepicker-calendar">
                        <table class="calendar table table-bordered">
                          <thead>
                            <tr class="months-header">
                              <th class="month" colspan="4">
                                <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                <span></span>
                                <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                              </th>
                              <th class="year" colspan="3">
                                <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                <span></span>
                                <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                              </th>
                            </tr>
                            <tr class="days-header">
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div></td>
                </tr>
                <?php }?>
                <tr>
                    <td><label for="tgl_ambil_terakhir">Tanggal Pengambilan Dahak Terakhir</label></td>
                    <td><div class="bfh-datepicker" data-format="d-m-y" data-date="">
                      <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                         <input type="text" class="input-small" id="tgl_ambil_terakhir" name="tgl_ambil_terakhir" readonly value="<?php echo date('d-m-Y')?>">
                         <button class="btn btn-small" type="button"><i class="icon-calendar"></i></button>
                      </div>
                      <div class="bfh-datepicker-calendar">
                        <table class="calendar table table-bordered">
                          <thead>
                            <tr class="months-header">
                              <th class="month" colspan="4">
                                <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                <span></span>
                                <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                              </th>
                              <th class="year" colspan="3">
                                <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                <span></span>
                                <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                              </th>
                            </tr>
                            <tr class="days-header">
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div></td>
                </tr>
                <tr>
                    <td><label for="tgl_kirim_sediaan">Tanggal Pengiriman Sediaan</label></td>
                    <td><div class="bfh-datepicker" data-format="d-m-y" data-date="">
                      <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                         <input type="text" class="input-small" id="tgl_kirim_sediaan" name="tgl_kirim_sediaan" readonly value="<?php echo date('d-m-Y')?>">
                         <button class="btn btn-small" type="button"><i class="icon-calendar"></i></button>
                      </div>
                      <div class="bfh-datepicker-calendar">
                        <table class="calendar table table-bordered">
                          <thead>
                            <tr class="months-header">
                              <th class="month" colspan="4">
                                <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                <span></span>
                                <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                              </th>
                              <th class="year" colspan="3">
                                <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                <span></span>
                                <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                              </th>
                            </tr>
                            <tr class="days-header">
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div></td>
                </tr>
            </table>
        </div>

        <div class="labellegend">
          <span class="label">Nanah Lendir</span>
        </div>
        <div class="well">
            <label class="checkbox inline">
                <input type="checkbox" name="nanah_lendir_s1"> Dahak (S1)
            </label>
            <label class="checkbox inline">
                <input type="checkbox" name="nanah_lendir_p"> Dahak (P)
            </label>
            <?php if($tab=='abc'){?>
            <label class="checkbox inline">
                <input type="checkbox" name="nanah_lendir_s2"> Dahak (S2)
            </label>
            <?php }?>
        </div>

        <div class="labellegend">
          <span class="label">Bercak Darah</span>
        </div>
        <div class="well">
            <label class="checkbox inline">
                <input type="checkbox" name="bercak_darah_s1"> Dahak (S1)
            </label>
            <label class="checkbox inline">
                <input type="checkbox" name="bercak_darah_p"> Dahak (P)
            </label>
            <?php if($tab=='abc'){?>
            <label class="checkbox inline">
                <input type="checkbox" name="bercak_darah_s2"> Dahak (S2)
            </label>
            <?php }?>
        </div>

        <div class="labellegend">
          <span class="label">Air Liur</span>
        </div>
        <div class="well">
            <label class="checkbox inline">
                <input type="checkbox" name="air_liur_s1"> Dahak (S1)
            </label>
            <label class="checkbox inline">
                <input type="checkbox" name="air_liur_p"> Dahak (P)
            </label>
            <?php if($tab=='abc'){?>
            <label class="checkbox inline">
                <input type="checkbox" name="air_liur_s2"> Dahak (S2)
            </label>
            <?php }?>
        </div>

        <input type="hidden" id="id_permohonan_lab" name="id_permohonan_lab"/>
        <input type="hidden" id="tipe_diagnosa" name="tipe_diagnosa"/>
        <button id="btnSimpan" class="btn-primary"><i class="icon-ok icon-white"></i> Simpan</button>
    </form>

    <hr/>
    <button type="button" id="btnTambah"><i class="icon-plus-sign"></i> Tambah</button>
    <button type="button" id="btnUbah" disabled><i class="icon-edit"></i> Ubah</button>
    <button type="button" id="btnHapus" disabled><i class="icon-remove"></i> Hapus</button>

    <table id="tblPermohonan">
        <thead>
            <th>NIK TB</th>
            <th>Nama Pasien</th>
            <th>Yankes</th>
            <th>Alasan Pemeriksaan</th>
            <th>Register</th>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script type="text/javascript">
$(function(){
    $('a[rel*=facebox]').facebox();
    oTable=$('#tblPermohonan').dataTable({
        "sRowSelect": "single",
        "sDom": "frtip",
        "bProcessing": true,
        "bServerSide": true,
        "sServerMethod": "POST",
        "sAjaxSource": "<?php echo site_url('poli/'.'tb/transaksi_permohonan/data/'.$tab)?>",
        "aoColumns": [
            { "mData": "no_rm_tb" },
            { "mData": "nama_anggota" },
            { "mData": "nama_unit_kerja" },
            { "mData": "diagnosa" },
            { "mData": "register" },
        ]
    });

    $(document).on('click','#tblPermohonan tr',function(){
        sData = oTable.fnGetData(this);
        $('#tblPermohonan tr.DTTT_selected').removeClass('DTTT_selected');
        $(this).addClass('DTTT_selected');
        $('#btnUbah,#btnHapus').prop('disabled',false);
    });

    $('#btnTambah').click(function(){
        resetlink()
    }).click();
    $('#btnUbah').click(function(){
        popData=sData;
        updatelink();
    })
    $('#btnHapus').click(function(){
        if(confirm('Yakin akan menghapus?')){
            $.getJSON("<?php echo site_url('poli/'.'tb/transaksi_permohonan/hapus')?>/"+sData.id_permohonan_lab,null,function(obj){
                if(obj.success){
                    alert('data sudah terhapus');
                    resetlink();
                    oTable.fnFilter('');
                }else if(obj.error!=''){
                    alert(obj.error);
                }
            });
        }
    })

    $('#frmTransaksi').submit(function(){
        data={};
        $('#frmTransaksi [name]').each(function(){
            if($(this).attr('type')=='checkbox'){
                data[$(this).attr('name')]=$('[name="'+$(this).attr('name')+'"]:checked').val();
            }else{
                data[$(this).attr('name')]=$(this).val();
            }
        });
        data['tipe_diagnosa']='<?php echo $tab;?>';
        $.ajax({
            url: '<?php echo site_url('poli/'.'tb/transaksi_permohonan/simpan')?>',
            data: data, method:'post',dataType: 'json',
            success: function(obj){
                console.log(obj);
                if(obj.success){
                    alert('data Permohonan Lab sudah tersimpan');
                    resetlink();
                    oTable.fnFilter('');
                }else if(obj.error!=''){
                    alert(obj.error);
                }
            },
        });
        return false;
    });

});

function resetlink(){
    sData=null;
    $('#tblPermohonan tr.DTTT_selected').removeClass('DTTT_selected');
    $('#frmTransaksi [name]:not(:radio,:checkbox)').val('');
    $('#frmTransaksi [name],#frmTransaksi button').prop('disabled',true).prop('checked',false);
    $('#btnUbah,#btnHapus').prop('disabled',true);
    $('#rowPasien [name]').val('');
}

function setkpp(obj){
    resetlink();
    popData=obj;
    updatelink();
}

function updatelink(){
    $('#frmTransaksi [name]:not(:radio,:checkbox)').val('');
    $('#frmTransaksi [name],#frmTransaksi button').prop('disabled',false).prop('checked',false);
    $.getJSON('<?php echo site_url('poli/'.'tb/transaksi_permohonan/detail_by_rm_tb/'.$tab)?>/'+popData.no_rm_tb,null,function(obj){
        for(var key in obj) {
            comp=$('#frmTransaksi [name="'+key+'"]');
            if(comp.attr('type')=='checkbox'){
                if(obj[key]=='on' || obj[key]=='1'){
                    comp.prop('checked',true);
                }
            }else{
                comp.val(obj[key]);
            }
        }
    });
    $('#no_rm_tb').val(popData.no_rm_tb)
    $('#nama_anggota').val(popData.nama_anggota)
}
</script>