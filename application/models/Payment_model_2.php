<?php
Class Payment_model_2 extends CI_Model
{
  
   
 
  
 function activate_group($uid,$gid,$amount,$transaction_id,$payment_gateway,$da){
	 
	 
	 $this->db->where('gid',$gid);
	 $query=$this->db->get('savsoft_group');
	 $group=$query->row_array();
	 
	 $vd=($group['valid_for_days']*24*60*60);
	 $expiry_date=time()+$vd;
	 
	 $userdata=array(
	 'gid'=>$gid,
	 'subscription_expired'=>$expiry_date
	 );
	  $this->db->where('uid',$uid);
	$this->db->update('savsoft_users',$userdata);



	 $userdata=array(
	 'uid'=>$uid,
	 'gid'=>$gid,
	 'amount'=>$amount,
	 'transaction_id'=>$transaction_id,
	 'paid_date'=>time(),
	 'payment_gateway'=>$payment_gateway,
	 'other_data'=>json_encode($da),
	 'payment_status'=>$this->lang->line('success')
	 );
	  
	$this->db->insert('savsoft_payment',$userdata);
	
 }
 
 
 function validate_transaction_id($transaction_id){
	 
	 	 $this->db->where('gid',$gid);
	 $query=$this->db->get('savsoft_group');
	 return  $query->num_rows();
 }
 
 

}












?>
