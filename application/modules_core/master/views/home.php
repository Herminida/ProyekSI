
  <div class="main-container">
    <div class="container-fluid">
      <section>
        <div class="page-header">
          <h1>Halaman Data Master</h1>
        </div>
        
        Selamat Datang, Anda login Sebagai<strong>"<?php echo $this->session->userdata("nama"); ?>"</strong> </br>
        <a href="<?php echo site_url();?>/login/user_login/logout"> Logout </a>
        
      </section>

    </div>
  </div>