
						<h2>Pendaftaran Pasien Lama</h2>
						

						       
          <div class="bs-docs-example">

            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#rawat_jalan" data-toggle="tab">Rawat Jalan</a></li>
              <li><a href="#rawat_inap" data-toggle="tab">Rawat Inap</a></li>
              <li><a href="#pendukung" data-toggle="tab">Pendukung</a></li>
              <li><a href="#kebidanan" data-toggle="tab">Kebidanan</a></li>
            </ul>

            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="rawat_jalan">
                   <?php  $this->load->view('tbl_pasien_rawat_jalan/home');?>
              </div>
              <div class="tab-pane fade" id="rawat_inap">
               <?php  $this->load->view('tbl_pasien_rawat_inap/home');?>
              </div>
              <div class="tab-pane fade" id="pendukung">
                <?php  $this->load->view('tbl_pasien_pendukung/home');?>
              </div>
              <div class="tab-pane fade" id="kebidanan">
                <?php  $this->load->view('tbl_pasien_kebidanan/home');?>
              </div>
            </div>
          </div>

						
