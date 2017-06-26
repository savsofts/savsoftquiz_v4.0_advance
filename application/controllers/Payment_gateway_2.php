<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_gateway_2 extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->database();
	   $this->load->helper('url');
	   $this->load->model("user_model");
	   $this->load->model("payment_model");
	   $this->load->model("payment_model_2");
	   
	   $this->lang->load('basic', $this->config->item('language'));

	 }

	public function subscribe($gid='0',$uid='0')
	{
		
		
	if($this->config->item('paytm')){
	
define('PAYTM_ENVIRONMENT', $this->config->item('paytm_environment')); // PROD
define('PAYTM_MERCHANT_KEY', $this->config->item('paytm_merchant_key')); //Change this constant's value with Merchant key downloaded from portal
define('PAYTM_MERCHANT_MID', $this->config->item('paytm_merchant_id')); //Change this constant's value with MID (Merchant ID) received from Paytm
define('PAYTM_MERCHANT_WEBSITE', $this->config->item('paytm_merchant_website')); //Change this constant's value with Website name received from Paytm

$PAYTM_DOMAIN = "pguat.paytm.com";
if (PAYTM_ENVIRONMENT == 'PROD') {
	$PAYTM_DOMAIN = 'secure.paytm.in';
}

define('PAYTM_REFUND_URL', 'https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/REFUND');
define('PAYTM_STATUS_QUERY_URL', 'https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/TXNSTATUS');
define('PAYTM_TXN_URL', 'https://'.$PAYTM_DOMAIN.'/oltp-web/processTransaction');


	
		$this->load->helper('encdec_paytm');	
	}
			
		$data['uid']=$uid;
		$data['title']=$this->lang->line('buy_subscription');
		// fetching payment_history
		$data['user']=$this->user_model->get_user($uid);
$data['group']=$this->user_model->get_group($gid);

		$this->load->view('header',$data);
		$this->load->view('select_gateway',$data);
		$this->load->view('footer',$data);
	}
	
	
	
	
	
		public function cancel()
	{
		
		$data['title']=$this->lang->line('payment_cancel');
		 
		$this->load->view('header',$data);
		$this->load->view('cancel',$data);
		$this->load->view('footer',$data);
	}
	
	
	
	 public function success_message(){
		$data['title']=$this->lang->line('payment_completed');
	   $this->load->view('header',$data);
	   $this->load->view('payment_completed',$data);
		$this->load->view('footer',$data);
	}
 	
	 public function failed(){
		$data['title']=$this->lang->line('payment_failed');
	   $this->load->view('header',$data);
	   $this->load->view('failed',$data);
		$this->load->view('footer',$data);
	}
 
 
	function success($pg='')
	 {
	 if($pg=="payu"){
		 if($_POST['status']=="success" && $_POST['key']==$this->config->item('payu_merchant_key')){
		 
		 $ud=explode('-',$_POST['udf1']);
		 $uid=$ud[0];
		 $gid=$ud[1];
		 $amount=$_POST['amount'];
		 $transaction_id=$_POST['txnid'];
		 


$this->payment_model_2->activate_group($uid,$gid,$amount,$transaction_id,'Payumoney'.$_POST);
	redirect('payment_gateway_2/success_message');
		}
	 }else if($pg=="paytm"){
$this->load->helper('encdec_paytm');	
		
define('PAYTM_ENVIRONMENT', $this->config->item('paytm_environment')); // PROD
define('PAYTM_MERCHANT_KEY', $this->config->item('paytm_merchant_key')); //Change this constant's value with Merchant key downloaded from portal
define('PAYTM_MERCHANT_MID', $this->config->item('paytm_merchant_id')); //Change this constant's value with MID (Merchant ID) received from Paytm
define('PAYTM_MERCHANT_WEBSITE', $this->config->item('paytm_merchant_website')); //Change this constant's value with Website name received from Paytm

$PAYTM_DOMAIN = "pguat.paytm.com";
if (PAYTM_ENVIRONMENT == 'PROD') {
	$PAYTM_DOMAIN = 'secure.paytm.in';
}

define('PAYTM_REFUND_URL', 'https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/REFUND');
define('PAYTM_STATUS_QUERY_URL', 'https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/TXNSTATUS');
define('PAYTM_TXN_URL', 'https://'.$PAYTM_DOMAIN.'/oltp-web/processTransaction');
		
		
$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg


$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		
		 $ud=explode('-',$_POST['ORDERID']);
		 $uid=$ud[0];
		 $gid=$ud[1];
		 $amount=$_POST['TXNAMOUNT'];
		 $transaction_id=$_POST['TXNID'];
		 


$this->payment_model_2->activate_group($uid,$gid,$amount,$transaction_id,'Paytm',$_POST);
	  redirect('payment_gateway_2/success_message');
	  
		
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}



	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				// echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	exit;
}



		
}else{
		 
			redirect('payment_gateway_2/success_message'); 
		 
	 }

	 }
	 
	 
	 
	 
	 
	 
	 
	 
	 function checkout_ipn(){
	 
	 if ($_POST['message_type'] == 'FRAUD_STATUS_CHANGED') {

        $insMessage = array();
        foreach ($_POST as $k => $v) {
        $insMessage[$k] = $v;
        }
 $ud=explode('-',$_POST['custom']);
		 $uid=$ud[0];
		 $gid=$ud[1];
		 $amount=$_POST['invoice_usd_amount'];
		 $transaction_id=$_POST['sale_id'];
		 
        # Validate the Hash
        // To get secretword, go to dashboard-> account tab->site management
        $hashSecretWord = $this->config->item('checkout_SecretWord'); # Input your secret word
        $hashSid = $this->config->item('checkout_sid'); #Input your seller ID (2Checkout account number)
        $hashOrder = $insMessage['sale_id'];
        $hashInvoice = $insMessage['invoice_id'];
        $StringToHash = strtoupper(md5($hashOrder . $hashSid . $hashInvoice . $hashSecretWord));

        if ($StringToHash != $insMessage['md5_hash']) {
          
          redirect('payment_gateway_2/failed'); 
          
        }

        switch ($insMessage['fraud_status']) {
            case 'pass':
            
$this->payment_model_2->activate_group($uid,$gid,$amount,$transaction_id,'2Checkout',$_POST);
               redirect('payment_gateway_2/success_message'); 
                break;
            case 'fail':
              redirect('payment_gateway_2/failed'); 
                break;
            case 'wait':
               redirect('payment_gateway_2/failed'); 
                break;
        }
    }

	 
	 }
	 
	 
	 function paypal_ipn(){
		 $paypalmode = '';  
		  if($_POST)
		{
				$paypalmode=$this->config->item('paypal_environment');
				$req = 'cmd=' . urlencode('_notify-validate');
				foreach ($_POST as $key => $value) {
					$value = urlencode(stripslashes($value));
					$req .= "&$key=$value";
				}
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, 'https://ipnpb.'.$paypalmode.'paypal.com/cgi-bin/webscr');
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
				
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
				$res = curl_exec($ch);
				curl_close($ch);

				if (strcmp ($res, "VERIFIED") == 0)
				{
					$transaction_id = $_POST['txn_id'];
					$payerid = $_POST['payer_id'];
					$firstname = $_POST['first_name'];
					$lastname = $_POST['last_name'];
					$payeremail = $_POST['payer_email'];
					$paymentdate = $_POST['payment_date'];
					$paymentstatus = $_POST['payment_status'];
					$amount   = $_POST['mc_gross'];
					$mdate= date('Y-m-d h:i:s',strtotime($paymentdate));
					$otherstuff = json_encode($_POST);
					$cd=$_POST['custom'];
					$uid=$cd[0];
					$gid=$cd[1];
					$fullname=$firstname.' '.$lastname;
		   $result = $this->payment_model_2->validate_transaction_id($transaction_id);
			
		if($result >= "1"){
		// it is duplicate id
		exit;
		}
				$this->payment_model_2->activate_group($uid,$gid,$amount,$transaction_id,'Paypal',$res);

				}
		}



		 }

 
 
	
}
