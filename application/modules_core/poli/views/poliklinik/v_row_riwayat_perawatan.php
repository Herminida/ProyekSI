    <div class="row" id="rowRiwayatPerawatan">
        <div class="labelhr">
          <span class="label">Riwayat Perawatan :</span>
          <span id="btnRiwayatPerawatan">
            <span class="muted">Tidak ada riwayat</span>
          </span>
        </div>
        <div><hr></div>
        <div id="tabRiwayatPerawatan" class="tab-content span9">
        </div>
        <div class="span9"><em class="text-warning">tidak ada data riwayat perawatan</em></div>
    </div>

<script type="text/javascript">
// $(function(){
    // resetRiwayatPerawatan();
    // updateRiwayatPerawatan(1);
// });

function resetRiwayatPerawatan(){
  $('#btnRiwayatPerawatan').html('');
  $('#tabRiwayatPerawatan').html('').next().show();
}

function updateRiwayatPerawatan(){
      var htmlbtn='';
      var htmltab='';
      var i=0;
  $.getJSON("<?php echo site_url('poli/'.'poliriwayat/perawatan')?>/"+sData.no_rm,null,function(obj){
      // console.log(obj);
      for(var key in obj) {
        i++;
        htmlbtn+='<a href="#tabRiwayatPerawatan'+i+'" data-toggle="tab" class="btn">'+key+' ('+obj[key].jumlah+')</a>';
        htmltab+='<div class="tab-pane scrollable "style="height: 300px; overflow-y: auto"  id="tabRiwayatPerawatan'+i+'">'+obj[key].data+'</div>';
  $('#tabRiwayatPerawatan').next().hide();
      $('#btnRiwayatPerawatan').html(htmlbtn);
      $('#tabRiwayatPerawatan').html(htmltab);
        $('#btnRiwayatPerawatan a').click(function(){
        if ($(this).hasClass('active')){
          $(this).removeClass('active');
          $('#tabRiwayatPerawatan').hide();

        }else{
          $('#btnRiwayatPerawatan a.active').removeClass('active');
          $(this).addClass('active');
          $('#tabRiwayatPerawatan').show();          
        }
      });
      }

     
      
  });
  $.getJSON("<?php echo site_url('poli/'.'poliriwayat/perawatanlab')?>/"+sData.no_rm,null,function(obj){
      // console.log(obj);
      for(var key in obj) {
        i++;
        htmlbtn+='<a href="#tabRiwayatPerawatan'+i+'" data-toggle="tab" class="btn"> Lab ('+obj[key].jumlah+')</a>';
        htmltab+='<div class="tab-pane scrollable "style="height: 300px; overflow-y: auto"  id="tabRiwayatPerawatan'+i+'">'+obj[key].data+'</div>';
      }
      $('#tabRiwayatPerawatan').next().hide();
      $('#btnRiwayatPerawatan').html(htmlbtn);
      $('#tabRiwayatPerawatan').html(htmltab);
        $('#btnRiwayatPerawatan a').click(function(){
        if ($(this).hasClass('active')){
          $(this).removeClass('active');
          $('#tabRiwayatPerawatan').hide();

        }else{
          $('#btnRiwayatPerawatan a.active').removeClass('active');
          $(this).addClass('active');
          $('#tabRiwayatPerawatan').show();          
        }
      });
  });



}
</script>