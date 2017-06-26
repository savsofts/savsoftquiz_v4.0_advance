 <div class="container">

   
 <?php 
 $sq_url="http://".$_SERVER['HTTP_HOST'] . str_replace('index.php/install','',$_SERVER['REQUEST_URI']);
 $last_sl=substr($sq_url,(strlen($sq_url)-1),strlen($sq_url));
 if($last_sl=='/'){
	$sq_url=$sq_url; 
 }else{
	$sq_url=$sq_url."/";  
 }
 
 ?>
 
 



<div class="col-md-4">
</div>
<div class="col-md-4">

	<div class="login-panel panel panel-default">
		<div class="panel-body"> 
		<img src="<?php echo base_url('images/logo.png');?>">
		

			<form class="form-signin" method="post" action="<?php echo $sq_url.'index.php/Install/config_sq';?>" onSubmit="return agreetos();">
					<h2 class="form-signin-heading"><?php echo $this->lang->line('installation_process');?></h2>
		<?php 
		if($this->session->flashdata('message')){
			?>
			<div class="alert alert-danger">
			<?php echo $this->session->flashdata('message');?>
			</div>
		<?php	
		}
		?>	<br><hr><br>
		
			<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('base_url');?></label> 
					<input type="text"   name="sq_base_url" class="form-control" value="<?php echo $sq_url;?>" placeholder="<?php echo $this->lang->line('hostname');?>" required autofocus >
			</div>
			<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('hostname');?></label> 
					<input type="text"   name="sq_hostname" class="form-control" value="localhost" placeholder="<?php echo $this->lang->line('hostname');?>" required autofocus >
			</div>
			<div class="form-group">	 
					<label for="inputEmail" class="sr-only"><?php echo $this->lang->line('db_name');?></label> 
					<input type="text"   name="sq_dbname" class="form-control" placeholder="<?php echo $this->lang->line('db_name');?>" required   >
			</div>
			<div class="form-group">	 
					<label for="inputEmail" class="sr-only"><?php echo $this->lang->line('db_username');?></label> 
					<input type="text"   name="sq_dbusername" class="form-control" placeholder="<?php echo $this->lang->line('db_username');?>" required   >
			</div>
			<div class="form-group">	 
					<label for="inputEmail" class="sr-only"><?php echo $this->lang->line('db_password');?></label> 
					<input type="password"   name="sq_dbpassword" class="form-control" placeholder="<?php echo $this->lang->line('db_password');?>"     >
			</div>
 			<div class="form-group">	  
					<input type="checkbox" name="tos" id="tos"> <span style="font-size:11px;">You must agree to our <a href="http://savsoftquiz.com/tos.php" target="savsoftquiz" >Terms & Conditions</a> before installation</span><br>
					<button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo $this->lang->line('install_now');?></button>
			</div>
 <input type="checkbox" name="force_write"  > <span style="font-size:11px;"> Tick if server required 777 permission to write file </span>
			</form>
		</div>
	</div>

</div>
<div class="col-md-4">


</div>



</div>
<script>
function agreetos(){
	if(document.getElementById('tos').checked == true){
		return true;
	}else{
		alert('Please tick checkbox to agree with terms and conditions');
		return false;
	}
	
}


</script>