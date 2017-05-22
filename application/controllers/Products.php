<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function index()
	{
		#LOADING OF PAGE
		$this->load->view('header');
		$this->load->view('products');
		$this->load->view('footer');
	}

	public function saveProduct(){

		#INITIALIZE POSTED DATA
		$prodName  = $this->input->post("prodName");
		$prodCode  = $this->input->post("prodCode");
		$prodPrice = $this->input->post("prodPrice");
		$prodStock = $this->input->post("prodStock");
		$prodID 	 = $this->input->post("prodID");

		#DEFAULT MESSAGE
		$return['message'] = "Oops something went wrong!";
		$return['type']		 = "danger";
		$return['status']	 = 0;

		#CHECKING OF POSTED DATA
		if ($prodName == "") {
			$return['message'] = "Product name is required!";
		}
		elseif ($prodCode  == "") {
			$return['message'] = "Product code is required!";
		}
		elseif ($prodPrice == "" || $prodPrice == 0) {
			$return['message'] = "Product price is required!";
		}
		elseif ($prodStock == "" || $prodStock == 0) {
			$return['message'] = "Product stock is required!";
		}
		else{
			$this->load->model('productModel');

			#CHECK IF PRODUCT ALREADY EXIST
			$result = $this->productModel->checkProduct($prodCode, $prodID);
			if ($result->num_rows() > 0) {
				$return['message'] = "Product already exist!";
			}
			else{

				$data = [$prodName, $prodCode, $prodPrice, $prodStock];

				#UPDATE DATA IF PRODID IS NUMERIC
				if (is_numeric($prodID)) {
					$data[] = $prodID;
					$this->productModel->updateProduct($data);
					$return['message'] = "Product successfully updated!";
				} else{
					$this->productModel->saveProduct($data);
					$return['message'] = "Product successfully added!";
				}
				$return['status']	 = 1;
				$return['type'] = "success";
			}
		}

		echo json_encode($return);
	}

	public function getProducts(){
		$data = null;
		$this->load->model('productModel');
		$result = $this->productModel->getProducts();
		if ($result->num_rows() > 0) {
			$data = $result->result_array();
		}
		echo json_encode($data);
	}

	public function getProduct(){
		$data = null;
		$prodID = $this->input->post('prodID');
		$this->load->model('productModel');
		$result = $this->productModel->getProduct($prodID);
		if ($result->num_rows() > 0) {
			$data = $result->row_array();
		}
		echo json_encode($data);
	}

	public function deleteProduct(){
		$prodID = $this->input->post("prodID");
		$this->load->model('productModel');

		$return['message'] = "Oops something went wrong!";
		$return['type']		 = "danger";

		$this->productModel->deleteProduct($prodID);
		if ($this->db->affected_rows() > 0) {
			$return['message'] = "Product successfully deleted!";
			$return['type']		 = "success";
		}
		echo json_encode($return);
	}
}
