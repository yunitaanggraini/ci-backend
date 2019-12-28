

<div class="wrapper wrapper-content m-t-xl wrapper wrapper-content animated fadeInRight">
    
    <h1> WELCOME 
    <?php echo $this->session->userdata('username') ?>
    </h1>
    <?php
    if($this->session->userdata('usergroup')=='UG001'){
        ?>
        <h1>WELCOME TO SISTEM MANAGEMENT AUDIT</h1>
        <h2>General Affair</h2>
    <?php
    }elseif ($this->session->userdata('usergroup')=='UG002') {
    ?>
        <h1>WELCOME TO SISTEM MANAGEMENT AUDIT</h1>
        <h2>Auditor</h2>
    <?php
    }elseif ($this->session->userdata('usergroup')=='UG003') {
      ?>
      <h1>WELCOME TO SISTEM MANAGEMENT AUDIT</h1>
      <h2>Manager Auditor</h2>
    <?php
    }elseif ($this->session->userdata('usergroup')=='UG004') {
        ?>
    <h1>WELCOME TO SISTEM MANAGEMENT AUDIT</h1>
    <h2>Supervisor</h2>
    <?php }?>
    </div>