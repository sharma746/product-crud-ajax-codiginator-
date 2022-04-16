<?php
	class Mdl_product extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function show(){
			$query = $this->db->get('products');
			return $query->result(); 
		}

		public function insert($product){
			return $this->db->insert('products', $product);
		}

		public function getproduct($id){
			$query = $this->db->get_where('products',array('id'=>$id));
			return $query->row_array();
		}

		public function updateproduct($product, $id){
			$this->db->where('products.id', $id);
			return $this->db->update('products', $product);
		}

		public function delete($id){
			$this->db->where('products.id', $id);
			return $this->db->delete('products');
		}

	}
?>