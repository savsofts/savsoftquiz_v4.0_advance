<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Word_import extends CI_Controller {

 function __construct()
 {
   parent::__construct();
    $this->lang->load('basic', $this->config->item('language'));
		$this->load->helper('url');
   $this->load->helper('word_import_helper');
	$this->load->model('word_import_model','',TRUE);
   if(!$this->session->userdata('logged_in'))
   {
   redirect('login');
   }
 }

 function index($limit='0',$cid='0')
 {
$logged_in=$this->session->userdata('logged_in');
if($logged_in['su']!="1"){
exit('Permission denied');
return;
}		

$this->load->helper('word_import_helper');

$questions=word_file_import();
// echo "<pre>"; print_r($questions);exit;
$this->word_import_model->import_ques($questions);
 $this->session->set_flashdata('message', "<div class='alert alert-success'>".$this->lang->line('data_imported_successfully')." </div>");
 
 redirect('qbank');
 }



}
