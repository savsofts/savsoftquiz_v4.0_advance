 
 <div class="container">
  
   
 <h3><?php echo $title;?></h3>
   
     
   <div class="row">
     
    <?php 
    $cc=0;
$colorcode=array(
'success',
'warning',
'info',
'danger'
);
    foreach($group_list as $k => $val){
    
   ?>
	                <!-- item -->
                <div class="col-md-4 text-center">
                    <div class="panel panel-<?php echo $colorcode[$cc];?> panel-pricing">
                        <div class="panel-heading">
                            <i class="fa fa-desktop"></i>
                            <h3><?php echo $val['group_name'];?></h3>
                        </div>
                        <div class="panel-body text-center">
                          
                          <?php 
                          echo $val['description'];?>
                          <hr>
                           
<?php 
 
if($val['price']==0){
echo "0";
}else{
echo $this->config->item('base_currency_prefix').' '.$val['price'].' '.$this->config->item('base_currency_sufix'); 
}
?>
                           
                        </div>
                        
                        <div class="panel-footer">
                         
						 
<a href="<?php echo site_url('user/upgid/'.$val['gid']);?>" class="btn btn-success"  ><?php echo $this->lang->line('subscribe');?> </a>
 

                        </div>
                    </div>
                </div>
                <!-- /item --> 
	  
	  
	  <?php 
	  if($cc >= 4){
	  $cc=0;
	  }else{
	  $cc+=1;
	  }
	  
    }
    ?>
  
</div>

 



</div>
<script>
 
</script>
