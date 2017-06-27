 <div class="container">

   
 
<div id="update_notice"></div>  
<?php 
if(!file_get_contents('application/controllers/Payment_gateway_2.php')){
?>
<div class="alert alert-danger"><?php echo $this->lang->line('commercial_msg');?></div>
<?php
}
?>

<div class="alert alert-danger"><b>Like Savsoft Quiz?</b> <br>
Please <a href="https://savsoftquiz.com/commercial.php">buy installation service</a> which is like donating to this app and help  us to keep this app free & open source.

<a href="https://savsoftquiz.com/docs/edit_dashboard.php" target="docs" style="float:right;font-size:12px;color:#666666;">Remove it</a>
</div>
<div class="row">

<div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_users;?></div>
                                    <div><?php echo $this->lang->line('no_registered_user');?> </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('user');?>">
                            <div class="panel-footer">
                                <span class="pull-left"><?php echo $this->lang->line('users');?> <?php echo $this->lang->line('list');?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
</div>


<div class="col-md-4">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_quiz;?></div>
                                    <div><?php echo $this->lang->line('no_registered_quiz');?> </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('quiz');?>">
                            <div class="panel-footer">
                                <span class="pull-left"><?php echo $this->lang->line('quiz');?> <?php echo $this->lang->line('list');?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
</div>

<div class="col-md-4">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_qbank;?></div>
                                    <div><?php echo $this->lang->line('no_questions_qbank');?></div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('qbank');?>">
                            <div class="panel-footer"><?php echo $this->lang->line('question');?> <?php echo $this->lang->line('list');?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
 </div>
 
 
 
 

</div>
 
<div class="row"></div>






<div class="row">
      <div class="col-lg-7">


<div class="row">
                          
 <div class="col-lg-6 " >
 <div class="panel panel" >
                        <div class="panel-heading"  style="background-color:#72B159;text-align:center;">
                        
    <div class="font-size-34"> <strong style="color:#ffffff;"><?php echo $active_users;?></strong>
    <br>
    <small class="font-weight-light text-muted" style="font-size:18px;color:#eeeeee;"><?php echo $this->lang->line('active');?> <?php echo $this->lang->line('users');?></small>

</div>

                    
                        </div>
 </div>
</div>
 <div class="col-lg-6">
 <div class="panel panel" >
                        <div class="panel-heading"  style="background-color:#DB5949;text-align:center;">
                        
    <div class="font-size-34" > <strong style="color:#ffffff;"><?php echo $inactive_users;?></strong>
    <br>
    <small class="font-weight-light text-muted" style="font-size:18px;color:#eeeeee;"><?php echo $this->lang->line('inactive');?> <?php echo $this->lang->line('users');?></small>

</div>

                    
                        </div>
                        </div>
</div>
  

</div>


        <!-- recent users -->

        <div class="panel">
          <div class="panel-heading">
            <div class="panel-title"><?php echo $this->lang->line('recently_registered');?></div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped valign-middle">
              <thead>
                <tr><th><?php echo $this->lang->line('email');?></th>
                <th class="text-xs-right"><?php echo $this->lang->line('first_name');?> <?php echo $this->lang->line('last_name');?></th>
                <th class="text-xs-right"><?php echo $this->lang->line('group_name');?></th>
                <th class="text-xs-right"><?php echo $this->lang->line('contact_no');?></th>
                <th></th>
              </tr></thead>
              <tbody> 
              <?php 
if(count($result)==0){
	?>
<tr>
 <td colspan="3"><?php echo $this->lang->line('no_record_found');?></td>
</tr>	
	
	
	<?php
}
foreach($result as $key => $val){
?><tr>
<td>
<a href="<?php echo site_url('user/edit_user/'.$val['uid']);?>"><?php echo $val['email'];?> <?php echo $val['wp_user'];?></a></td>
<td  class="text-xs-right"><?php echo $val['first_name'];?> <?php echo $val['last_name'];?></td>
 <td  class="text-xs-right"><?php echo $val['group_name'];?></td>
<td  class="text-xs-right"><?php echo $val['contact_no'];?></td>

                
              </tr>
             
             <?php 
             }
             ?> 
     
            </tbody></table>
          </div>
        </div>

        <!-- recent users -->

      </div>
      <div class="col-lg-5">

<?php 
$revenue_months2=array();
foreach($revenue_months as $fk => $fv){
$revenue_months2[]=floatval($fv);
}
?>
 
<?php 
 
$months=array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
?>
<div class="revenuew">
<small class="font-weight-light text-muted" style="font-size:22px;color:#212121;">
<?php echo $this->lang->line('revenue');?>
</small>
<?php 
$todaymonth=date('M',time());
if(date('m',time()) != 1){
$mm=date('m',time())-1;

}else{

$mm=date('m',time());

}
$pastmonth=$months[$mm-1];
$cal=number_format(((($revenue_months[$todaymonth]-$revenue_months[$pastmonth])/$revenue_months[$pastmonth])*100),'2','.','');
 if($cal < 0){
?>
<small class="font-weight-light text-muted" style="font-size:16px;color:#ff0000;" title="<?php echo $this->lang->line('growth_lath_month');?>">
 <?php echo $cal;?>% <i class="fa fa-arrow-down"></i>
</small>
<?php 
}else{
?>
<small class="font-weight-light text-muted" style="font-size:16px;color:#72B159;" title="<?php echo $this->lang->line('growth_lath_month');?>">
 <?php echo $cal;?>% <i class="fa fa-arrow-up"></i>
</small>
<?php
}
?>

<p class="font-weight-light text-muted" style="font-size:18px;color:#666666;">
<?php echo $this->lang->line('past_days');?>
</p>
<div class="font-size-34"><small class="font-weight-light text-muted"><?php echo $this->config->item('base_currency_prefix');?></small> <strong><?php echo  number_format(array_sum($revenue_months2), 2, '.', ''); ?></strong>
<small class="font-weight-light text-muted"><?php echo $this->lang->line('this_year');?> </small>
</div>
<canvas id="myChart" width="340" height="340"></canvas>
</div>
<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($months);?>,
        datasets: [{
            label: '<?php echo $this->lang->line('rev_paid_quiz');?>',
            data: <?php echo json_encode($revenue_months2);?>,
            backgroundColor: 
                'rgba(255, 188, 188, 0.2)',
            borderColor: 
                'rgba(153, 0, 0, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>









        <!-- References -->

        <div class="panel">
          <div class="panel-heading">
            <div class="panel-title"><?php echo $this->lang->line('recent_sub');?></div>
          </div>


  <?php 
if(count($payments)==0){
	?>
 	
	<div class="box m-y-2">
            <div class="box-cell valign-middle text-xs-center" style="width: 60px">
              <i class="ion-social-twitter font-size-28 line-height-1 text-info"></i>
            </div>
            <div class="box-cell p-r-3">
              <?php echo $this->lang->line('no_record_found');?>
              <div class="progress m-b-0" style="height: 5px; margin-top: 5px;">
                <div class="progress-bar progress-bar-info" style="width: 40%"></div>
              </div>
            </div>
          </div>
	
	<?php
}
$i=0;
$colorcode=array(
'success',
'warning',
'info',
'danger'
);
foreach($payments as $key => $val){
?>
<div class="alert alert-<?php echo $colorcode[$i];?>" style="margin:5px;">
          
           <a href="<?php echo site_url('user/edit_user/'.$val['uid']);?>">   <?php echo $val['first_name'].' '.$val['last_name'];?></a>
                <?php echo $this->lang->line('subscribed');?> 
                 <?php echo $val['group_name'];?>
                  <button class="btn btn-<?php echo $colorcode[$i];?>">
  <?php echo $this->config->item(strtolower($val['payment_gateway']).'_currency_prefix');?> <?php echo $val['amount'];?> <?php echo $this->config->item(strtolower($val['payment_gateway']).'_currency_sufix');?>  
          </button>    
     </div>     

         

<?php 
 if($i >= 4){
	  $i=0;
	  }else{
	  $i+=1;
	  }
}
?>

        <!-- / payments -->

      </div>
    </div>















</div>
 
<div class="row text-center">
 
<?php 
echo "Page rendered in <strong>{elapsed_time}</strong> seconds. You may improve it by hosting on recommended hosting. <a href='http://savsoftquiz.com/affiliate.php' target='af'>Click here</a> ";
?>
</div>

<script>
update_check('4.0');
</script>
