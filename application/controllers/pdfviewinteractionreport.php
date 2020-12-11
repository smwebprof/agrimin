<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pdfviewinteractionreport extends CI_Controller {

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
	 * Author : Shivaji M Dalvi | Date : 15/10/2019
	 */



    public function index()
    {
        $this -> load -> model('Interaction_master');
        $this -> load -> model('User_master');
        $this->load->library('pdf');

        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $result = $this->Interaction_master->getInteractiondatabyid($id);
        
        $getUser = $this->User_master->getUserbyId($result[0]['entry_user_id']);
        #print_r($getUser);exit;
        
        $this->data['title']='ACI - Client Interaction Report';    
        $this->data['layout_body']='fullviewinteractionreport';
        $this->data['report_date'] = $result[0]['entry_date'];
        $this->data['report_user'] = $getUser[0]['first_name']." ".$getUser[0]['last_name'];
        $this->data['interaction_data'] = $result;

        $this->load->view('admin/layout/main_app', $this->data);

        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    
    }

}
