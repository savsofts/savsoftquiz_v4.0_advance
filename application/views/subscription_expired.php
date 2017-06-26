 <div class="container">

  <div class="row">
    
<div class="col-md-8">
<br> 
 <div class="login-panel panel panel-default">
		<div class="panel-body"> 
	  	<img src="<?php echo base_url('images/logo.png');?>">
	
 <h3><?php echo $this->lang->line('subscription_expired_message');?></h3>
   
 <br>
 <a href="<?php echo site_url('payment_gateway_2/subscribe/'.$user['gid'].'/'.$user['uid']);?>"><?php echo $this->lang->line('click_here');?></a> 
 <?php echo $this->lang->line('to_buy');?>
 
 <br><br>
 
  <a href="<?php echo site_url('login');?>"><?php echo $this->lang->line('back');?></a> 
 
 
 
</div> 

</div> 

</div> 

</div> 
 


</div> 
