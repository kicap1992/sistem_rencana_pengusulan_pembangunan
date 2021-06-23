<!DOCTYPE html>
<html lang="en">

  <?php $this->load->view('admin/head') ?>

<body class="">
  <div class="wrapper ">
    
    <?php $this->load->view('admin/sidebar') ?>

    <div class="main-panel">
      
      <?php $this->load->view('admin/navbar') ?>
 
      <div class="content">

        <?php $this->load->view('admin/atas') ?>

        <!-- sini letak main -->
        
        
        
        <!-- sini akhir letak main -->

      </div>
      


      <?php $this->load->view('admin/footer') ?>
    </div>
  </div>
  
  <?php $this->load->view('admin/script') ?>
  <!-- bawah sini letak js tambahan -->
  
  
</body>

</html>
