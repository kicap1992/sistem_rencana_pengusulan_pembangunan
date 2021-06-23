<!DOCTYPE html>
<html lang="en">

  <?php $this->load->view('camat/head') ?>

<body class="">
  <div class="wrapper ">
    
    <?php $this->load->view('camat/sidebar') ?>

    <div class="main-panel">
      
      <?php $this->load->view('camat/navbar') ?>
 
      <div class="content">

        <?php $this->load->view('camat/atas') ?>

        <!-- sini letak main -->

        

        <!-- sini akhir letak main -->

      </div>
      


      <?php $this->load->view('camat/footer') ?>
    </div>
  </div>
  
  <?php $this->load->view('camat/script') ?>
  <!-- bawah sini letak js tambahan -->
  
  
</body>

</html>
