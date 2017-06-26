 <div class="container">
   <div class="row">
 
  <div class="col-lg-12">   <h3><?php echo $this->lang->line('generate_report');?> </h3> 
    <form method="post" action="<?php echo site_url('payment_gateway/generate_report/');?>">
	<div class="input-group">
 <input type="text" name="date1" value="" placeholder="<?php echo $this->lang->line('date_from');?>">
 
 <input type="text" name="date2" value="" placeholder="<?php echo $this->lang->line('date_to');?>">

 <button class="btn btn-info" type="submit"><?php echo $this->lang->line('generate_report');?></button>	

 
 </div>
 </form>
 </div>
 </div>
 
 
   
 <h3><?php echo $title;?></h3>
    <div class="row">
 
  <div class="col-lg-6">
    <form method="post" action="<?php echo site_url('payment_gateway/index/');?>">
	<div class="input-group">
    <input type="text" class="form-control" name="search" placeholder="<?php echo $this->lang->line('search');?>...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('search');?></button>
      </span>
	 
	  
    </div><!-- /input-group -->
	 </form>
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->


  <div class="row">
 
<div class="col-md-12">
<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		
 
<table class="table table-bordered">
<tr>
 <th><?php echo $this->lang->line('email');?></th>
 <th><?php echo $this->lang->line('payment_gateway');?></th>
<th><?php echo $this->lang->line('paid_date');?> </th>
<th><?php echo $this->lang->line('amount');?></th>
<th><?php echo $this->lang->line('transaction_id');?> </th>
<th><?php echo $this->lang->line('status');?> </th>
</tr>
<?php 
if(count($payment_history)==0){
	?>
<tr>
 <td colspan="6"><?php echo $this->lang->line('no_record_found');?></td>
</tr>	
	
	
	<?php
}
foreach($payment_history as $key => $val){
?>
<tr>
 <td><?php echo $val['email'];?></td>
 <td><?php echo $val['payment_gateway'];?></td>
 <td><?php echo date('Y-m-d H:i:s',$val['paid_date']);?></td>
 <td><?php echo $val['amount'];?></td>
 <td><?php echo $val['transaction_id'];?></td>
 <td><?php echo $val['payment_status'];?></td>
 
</tr>

<?php 
}
?>
</table>
 </div>

</div>


<?php
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="<?php echo site_url('payment_gateway/index/'.$back);?>"  class="btn btn-primary"><?php echo $this->lang->line('back');?></a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('payment_gateway/index/'.$next);?>"  class="btn btn-primary"><?php echo $this->lang->line('next');?></a>





</div>