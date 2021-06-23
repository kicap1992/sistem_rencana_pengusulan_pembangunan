<!DOCTYPE html>
<html lang="en">

  <?php $this->load->view('user/head') ?>

<body class="">
  <div class="wrapper ">
    
    <?php $this->load->view('user/sidebar') ?>

    <div class="main-panel">
      
      <?php $this->load->view('user/navbar') ?>
 
      <div class="content">

        <?php $this->load->view('user/atas') ?>

        <!-- sini letak main -->

        

        <!-- sini akhir letak main -->

      </div>
      


      <?php $this->load->view('user/footer') ?>
    </div>
  </div>
  
  <?php $this->load->view('user/script') ?>
  <!-- bawah sini letak js tambahan -->
  
  
</body>

</html>
