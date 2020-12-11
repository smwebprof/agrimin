<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editinvoicepaymentregister extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		

		if (!isset($_SESSION['userId'])) {
			$login = BASE_PATH."login/";
			redirect($login);
		}
		
		#print_r($_POST);exit;
		$this->load->library('form_validation');
		$this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->model('Invoice_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        if (empty($id)) {
        	echo '<script>javascript:alert("No Payment Information Added!!!.");</script>';exit;
        	$dashboard = BASE_PATH."Viewfileinvoicepayment/";
	        redirect($dashboard);
        }
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $result = $this->Invoice_master->getPaymentInvoiceById($id);
        //print_r($result);exit;
        if ($_POST) {
        	//print_r($_POST);exit;
        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];
        	//print_r($_POST);exit;
        	$resultdata = $this->Invoice_master->updatePaymentInvoiceData($this->input->post());
        	#$resultdata = 1;
        	if ($resultdata) {

        		if ($_POST['invoice_amt']==$_POST['invoice_rec_amt']) { 
        			$UpdateInvoiceData = $this->Invoice_master->UpdateInvoiceStatus($this->input->post());
        		}

        		$invoice_status = $this->Invoice_master->getInvoiceStatusById($_POST['invoice_file_no']);
        		if ($invoice_status==1) {
        			$UpdateFileData = $this->Invoice_master->UpdateInvoicePaymentDataByFile($_POST['invoice_file_no']);
        		}

        		$viewinvoice = BASE_PATH."Viewfileinvoicepayment?msg=1";
            	redirect($viewinvoice);

	        	/*$this->data['success'] = "Data updated successfully!!!";

	        	$this->data['title'] = 'ACI - PaymentInvoicefileregister';
				$this->data['invoice_data'] = @$result;
				$this->data['layout_body']='editinvoicepaymentregister';
		 	

		 		$this->load->view('admin/layout/main_app', $this->data);*/

	 		}
        	
        } else {

			$this->data['title'] = 'ACI - PaymentInvoicefileregister';
			$this->data['invoice_data'] = @$result;
			$this->data['layout_body']='editinvoicepaymentregister';
	 	

	 		$this->load->view('admin/layout/main_app', $this->data);

			#$this->load->view('file_register_new');
	  }		
	
	}

	public function fetch_branch()
	{
		$this->load->model('branch_master'); 
		
		echo $this ->branch_master->fetch_branch($this->input->post('branch_id'));

	}

	public function fetch_invoicedata()
    {
        $this->load->model('invoice_master'); 
        
        $result = $this ->invoice_master->getInvPaymentDetailsById($this->input->post('id'));
        echo $result['file_no']."|".$result['client_id']."|".$result['invoice_amt']."|".$result['invoice_basic_amt']."|".$result['invoice_ex_rate']."|".$result['invoice_basic_ex_amt']."|".$result['client_name'];
        #echo $result['file_creation_date']."|".$result['client_name']."|".$result['address']."|".$result['country']."|".$result['state']."|".$result['city']."|".$result['countryid']."|".$result['stateid']."|".$result['cityid']."|".$result['client_id'];
    }
}
