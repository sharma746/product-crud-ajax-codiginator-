<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Machine Test (CodeIgniter,PHP, MYSQL, Jquery, Ajax)</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Machine Test (CodeIgniter,PHP, MYSQL, Jquery, Ajax)</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<button class="btn btn-primary" id="add"><span class="glyphicon glyphicon-plus"></span> Add New</button>
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<tr>
						<th>ID</th>
						<th>Product Name</th>
						<th>Product Price</th>
						<th>Product Description</th>
						<th>Product Image</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="tbody">
				</tbody>
			</table>
		</div>
	</div>
	<?php include('modal.php'); ?>

<script type="text/javascript">
$(document).ready(function(){
	var url = '<?php echo base_url(); ?>';
	showTable();
	$('#add').click(function(){
		$('#addnew').modal('show');
		$('#addForm')[0].reset();
	});
	$('#addForm').submit(function(e){
		e.preventDefault();
		var product = new FormData($("#addForm")[0]);
		console.log(product);
			$.ajax({
				type: 'POST',
				url: url + 'product/insert',
				data: product,
                async: false, 
                cache: false, 
                contentType: false, 
                processData: false,
				success:function(success){
					console.log(success);
					$('#addnew').modal('hide');
					showTable();
				}
			});
	});
	$(document).on('click', '.edit', function(){
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: url + 'product/getproduct',
			dataType: 'json',
			data: {id: id},
			success:function(response){
				console.log(response);
				$('#product_name').val(response.product_name);
				$('#product_price').val(response.product_price);
				$('#product_description').val(response.product_description);
				$('#previousimages').val(response.product_image);
				$('#productid').val(response.id);
				$('#editmodal').modal('show');
			}
		});
	});
	$('#editForm').submit(function(e){
		e.preventDefault();
		var product = new FormData($("#editForm")[0]);
		$.ajax({
			type: 'POST',
			url: url + 'product/update',
			data: product,
			async: false, 
            cache: false, 
            contentType: false, 
            processData: false,
			success:function(success){
				console.log(success);
				$('#editmodal').modal('hide');
				showTable();
			}
		});
	});
	$(document).on('click', '.delete', function(){
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: url + 'product/getproduct',
			dataType: 'json',
			data: {id: id},
			success:function(response){
				console.log(response);
				$('#delfname').html(response.product_name);
				$('#delid').val(response.id);
				$('#delmodal').modal('show');
			}
		});
	});

	$('#delid').click(function(){
		var id = $(this).val();
		$.ajax({
			type: 'POST',
			url: url + 'product/delete',
			data: {id: id},
			success:function(){
				$('#delmodal').modal('hide');
				showTable();
			}
		});
	});

});

function showTable(){
	var url = '<?php echo base_url(); ?>';
	$.ajax({
		type: 'POST',
		url: url + 'product/show',
		success:function(response){
			$('#tbody').html(response);
		}
	});
}
</script>
</div>
</body>
</html>