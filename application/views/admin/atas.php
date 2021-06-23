        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-info">
                      <i class="fa fa-list text-info"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Jumlah Rencana Pembangunan</p>
                      <p class="card-title"><?=count($usulan->result())?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <a href="" style="color: grey"><i class="fa fa-arrow-right"></i> Ke Halaman</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fa fa-file-text-o text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Rencana Pembangunan Diterima</p>
                      <p class="card-title"><?=count($usulan_diterima->result())?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <a href="" style="color: grey"><i class="fa fa-arrow-right"></i> Ke Halaman</a>
                </div>
              </div>
            </div>
          </div>
        </div>