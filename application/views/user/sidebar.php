    <div class="sidebar" data-color="white" data-active-color="danger">
      
      <div class="logo">
        <a href="<?=base_url()?>user" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="<?=base_url()?>assets/img/parepare.png" height="40px">
          </div>
        </a>
        <a href="<?=base_url()?>user" class="simple-text logo-normal">
          Bacukiki
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li <?php if ($this->uri->segment(2) == ''): ?>class="active"<?php endif ?>>
            <a href="<?=base_url()?>user">
              <i class="fa fa-home"></i>
              <p>Halaman Utama</p>
            </a>
          </li>
          <li <?php if ($this->uri->segment(2) == 'rencana_pembangunan'): ?>class="active"<?php endif ?>>
            <a href="<?=base_url()?>user/rencana_pembangunan">
              <i class="nc-icon nc-bank"></i>
              <p>Rencana Pembangunan</p>
            </a>
          </li>
          
          <!-- <li <?php if ($this->uri->segment(2) == 'laporan'): ?>class="active"<?php endif ?>>
            <a href="<?=base_url()?>user/laporan">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Laporan</p>
            </a>
          </li> -->

          <li <?php if ($this->uri->segment(2) == 'profil'): ?>class="active"<?php endif ?>>
            <a href="<?=base_url()?>user/profil">
              <i class="fa fa-user-circle"></i>
              <p>Profil</p>
            </a>
          </li>
          
          <li>
            <a onclick="logout()">
              <i class="nc-icon nc-button-power"></i>
              <p>Logout</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>