<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Mdl_product');
	}
	public function index(){
		$this->load->view('show');
	}

	public function show(){
		$data = $this->Mdl_product->show();
		$output = array();
		foreach($data as $row){
			?>
			<tr>
				<td><?php echo $row->id; ?></td>
				<td><?php echo $row->product_name; ?></td>
				<td><?php echo $row->product_price; ?></td>
				<td><?php echo $row->product_description; ?></td>
				<td> <?php foreach(json_decode($row->product_image) as $key=>$value){ ?> <img style="max-width:100px; max-height:100px" src="<?php echo base_url(); ?>assets/uploads/<?= $value ?>" > <?php } ?> </td>
				<td>
					<button class="btn btn-warning edit" data-id="<?php echo $row->id; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</button>  
					<button class="btn btn-danger delete" data-id="<?php echo $row->id; ?>"><span class="glyphicon glyphicon-trash"></span> Delete</button>
				</td>
			</tr>
			<?php
		}
	}

	public function insert(){
		$product['product_name'] = $_POST['product_name'];
		$product['product_price'] = $_POST['product_price'];
		$product['product_description'] = $_POST['product_description'];
		$count_images = count($_FILES['images']['name']);
		$product['product_image']=[];
		for($i=0;$i<$count_images;$i++){
			if(!empty($_FILES['images']['name'][$i])){
				$ext = pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION);
			    $name = 'image' . rand(100000, 999999) . date("Y-m-d") . '.' . $ext;	
				$_FILES['file']['name'] = $name;
				$_FILES['file']['type'] = $_FILES['images']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['images']['error'][$i];
				$_FILES['file']['size'] = $_FILES['images']['size'][$i];
				$config['upload_path'] = './assets/uploads/'; 
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['max_size'] = '5000';
				$config['file_name'] = $name;
				$this->load->library('upload',$config); 
				if($this->upload->do_upload('file')){
				  $uploadData = $this->upload->data();
				  $filename = $uploadData['file_name'];
				  array_push($product['product_image'],$filename);
				}
			  }
		  }
		$product['product_image'] = json_encode($product['product_image']);
		$query = $this->Mdl_product->insert($product);
		
	}

	public function getproduct(){
		$id = $_POST['id'];
		$data = $this->Mdl_product->getproduct($id);
		echo json_encode($data);
	}

	public function update(){
		$id = $_POST['id'];
		$product['product_name'] = $_POST['product_name'];
		$product['product_price'] = $_POST['product_price'];
		$product['product_description'] = $_POST['product_description'];
		$count_images = count($_FILES['images']['name']);
		if($_FILES['images']['name'][0]!=''){
		$product['product_image']=[];
		for($i=0;$i<$count_images;$i++){
			if(!empty($_FILES['images']['name'][$i])){
				$ext = pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION);
			    $name = 'image' . rand(100000, 999999) . date("Y-m-d") . '.' . $ext;	
				$_FILES['file']['name'] = $name;
				$_FILES['file']['type'] = $_FILES['images']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['images']['error'][$i];
				$_FILES['file']['size'] = $_FILES['images']['size'][$i];
				$config['upload_path'] = './assets/uploads/'; 
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['max_size'] = '5000';
				$config['file_name'] = $name;
				$this->load->library('upload',$config); 
				if($this->upload->do_upload('file')){
				  $uploadData = $this->upload->data();
				  $filename = $uploadData['file_name'];
				  array_push($product['product_image'],$filename);
				}
			  }
		  }
		$product['product_image'] = json_encode($product['product_image']);
		}else{
			$product['product_image']=$_POST['previousimages'];
		}
		$query = $this->Mdl_product->updateproduct($product,$id);
	}

	public function delete(){
		$id = $_POST['id'];
		$query = $this->Mdl_product->delete($id);
	}

}
