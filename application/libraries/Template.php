<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Template{

 	protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
    }

	function _backend($content, $tipe, $data = array()){
    	$data['header'] = $this->_ci->load->view('template/backend/header', $data, TRUE);
        $data['menu'] = $this->_ci->load->view('template/backend/menu', $data, TRUE);
        if ($tipe == 'table') {
            $data['tipe'] = $this->_ci->load->view('template/backend/table', $data, TRUE);
            $data['content'] = $this->_ci->load->view($content, $data, TRUE);
            $data['endtipe'] = $this->_ci->load->view('template/backend/endtable', $data, TRUE);
        }else{
            $data['tipe'] = $this->_ci->load->view('template/backend/form', $data, TRUE);
            $data['content'] = $this->_ci->load->view($content, $data, TRUE);
            $data['endtipe'] = $this->_ci->load->view('template/backend/endform', $data, TRUE);
        }
        $data['footer'] = $this->_ci->load->view('template/backend/footer', $data, TRUE);
        
        $this->_ci->load->view('template/backend/index', $data);
	}
    function _login(){
        $this->_ci->load->view('template/backend/header');
        $this->_ci->load->view('template/backend/login');
    }
    function _back()
    {
        if(isset($_SERVER['HTTP_REFERER']))
        {
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
        else
        {
            header('Location: http://'.$_SERVER['SERVER_NAME']);
        }
        exit;
    }

    function _upload(){
        $config['upload_path'] = './assets/images/produk/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
      
        $this->_ci->load->library('upload', $config);
        if($this->_ci->upload->do_upload('gambar')){
          $return = array('result' => 'success', 'file' => $this->_ci->upload->data(), 'error' => '');
          return $return;
        }else{
          $return = array('result' => 'failed', 'file' => '', 'error' => $this->_ci->upload->display_errors());
          return $return;
        }
      }
}