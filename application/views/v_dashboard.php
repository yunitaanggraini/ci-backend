

<div class="wrapper wrapper-content m-t-xl wrapper wrapper-content animated fadeInRight">
    
    <h1 class="text-white"> WELCOME 
    <?php echo strtoupper($this->session->userdata('username')) ?>
    </h1>
    <?php
    if($this->session->userdata('usergroup')=='UG001'){
        ?>
        <h1 class="text-white">WELCOME TO SISTEM MANAGEMENT AUDIT</h1>
        <h2 class="text-white">General Affair</h2>
    <?php
    }elseif ($this->session->userdata('usergroup')=='UG002') {
    ?>
        <h1 class="text-white">WELCOME TO SISTEM MANAGEMENT AUDIT</h1>
        <h2 class="text-white">Auditor</h2>
    <?php
    }elseif ($this->session->userdata('usergroup')=='UG003') {
      ?>
      <h1 class="text-white">WELCOME TO SISTEM MANAGEMENT AUDIT</h1>
      <h2 class="text-white">Manager Auditor</h2>
    <?php
    }elseif ($this->session->userdata('usergroup')=='UG004') {
        ?>
    <h1 class="text-white">WELCOME TO SISTEM MANAGEMENT AUDIT</h1>
    <h2 class="text-white">Supervisor</h2>
    <?php }?>
    </div>