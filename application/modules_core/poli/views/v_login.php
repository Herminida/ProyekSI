<div class="span9 offset3"> <!-- content span -->
  <div class="row">
    <div class="span6" style="padding-top:70px;padding-bottom:20px">
      <?php if($error){?>
      <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Error!</strong> Username/Password tidak cocok.
      </div>
      <?php }?>
      <form name="frmLogin" method="post" class="well" action="">
        <?php echo img('resource/img/login.jpg');?>
        <label>Username <input type="text" name="username" class="input-block-level"></label>
        <label>Password <input type="password" name="password" class="input-block-level"></label>
        <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Login</button>
      </form>
    </div>
  </div>
</div><!--/span9-->

<script type="text/javascript">
$(function(){$('#menuSidebar').html('').hide();});
</script>