         <h2>Pendaftaran Pasien</h2>
          <div class="bs-docs-example">

            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#pasien_umum" data-toggle="tab">Pasien Umum</a></li>
              <li><a href="#pasien_rekanan" data-toggle="tab">Pasien Rekanan</a></li>
              <li><a href="#pasien_internal" data-toggle="tab">Pasien Internal</a></li>
              <li><a href="#pasien_ptpn" data-toggle="tab">Pasien PTPN</a></li>
            </ul>

            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="pasien_umum">
                    <?php $this->load->view('pendaftaran_pasien_umum/add'); ?>
              </div>
              <div class="tab-pane fade" id="pasien_rekanan">
               <?php $this->load->view('pendaftaran_pasien_rekanan/add'); ?>
              </div>
              <div class="tab-pane fade" id="pasien_internal">
                <?php $this->load->view('pendaftaran_pasien_internal/add'); ?>
              </div>
              <div class="tab-pane fade" id="pasien_ptpn">
                <?php $this->load->view('pendaftaran_pasien_ptpn/add'); ?>
              </div>
            </div>
          </div>



    