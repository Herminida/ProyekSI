    <li class="tab disabled"><a class="tab-link" data-popup="diagnosa" href="#">Diagnosa Penyakit</a></li>
    <li class="tab disabled"><a class="tab-link" data-popup="tindakanmedis" href="#">Tindakan Medis</a></li>
    <li class="tab disabled"><a class="tab-link" data-popup="resep" href="#">Resep</a></li>
    <li class="tab disabled"><a class="tab-link" data-popup="rujukpoli" href="#">Rujuk Klinik</a></li>
    <li class="tab disabled"><a class="tab-link" data-popup="rujukluar" href="#">Rujuk Luar</a></li>
    <li class="tab disabled"><a class="tab-link" data-popup="rujuklab" href="#">Laboratorium</a></li>
</ul>

<script type="text/javascript">
    function updateNavTab(){
      if(sData.no_rm){
        $("a.tab-link").each(function() {
          var href = '<?php echo site_url('poli/'.'popup');?>/' + $(this).attr('data-popup');
          $(this).attr("href", href + '/'+ sData.no_rm);
          $(this).attr("rel", 'facebox');
        });
        $('#tab-link li.disabled').removeClass('disabled');
        $('a.tab-link').unbind();
        $('a.tab-link[rel="facebox"]').facebox();
      }
    };

    function resetNavTab(){
      $('a.tab-link').attr('href','#').attr('rel','');
      $('#tab-link li.tab').addClass('disabled');
      $('a.tab-link').unbind();
      $('a.tab-link').click(function(){return false;});
    }
</script>