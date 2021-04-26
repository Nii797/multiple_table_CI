<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller{
	
	// fungsi construct
	function __construct(){
		parent::__construct();
		$this->load->model('Package_model','package_model');
	}

	// Untuk membaca data produk dan paket 
	function index(){
		$data['product'] = $this->package_model->get_products();
		$data['package'] = $this->package_model->get_packages();
		$this->load->view('package_view',$data);
	}

	// membuat sekaligus produk dan paket
	function create(){
		$package = $this->input->post('package',TRUE);
		$product = $this->input->post('product',TRUE);
		$this->package_model->create_package($package,$product);
		redirect('package');
	}

	// memanggil tabel produk dan paket
	function get_product_by_package(){
		$package_id=$this->input->post('package_id');
    	$data=$this->package_model->get_product_by_package($package_id)->result();
    	foreach ($data as $result) {
    		$value[] = (float) $result->product_id;
    	}
    	echo json_encode($value);
	}

	// mengubah data paket dan produk
	function update(){
		$id = $this->input->post('edit_id',TRUE);
		$package = $this->input->post('package_edit',TRUE);
		$product = $this->input->post('product_edit',TRUE);
		$this->package_model->update_package($id,$package,$product);
		redirect('package');
	}

	// data paket dan produk
	function delete(){
		$id = $this->input->post('delete_id',TRUE);
		$this->package_model->delete_package($id);
		redirect('package');
	}
}