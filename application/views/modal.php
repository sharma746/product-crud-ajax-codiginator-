<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
		<div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form id="addForm" enctype="multipart/form-data">
				<div class="row">
				 <div class="col-md-12">
					<div  class="form-group">
                            <label class="control-label" for="product_name">Product Name:</label>
							<input type="text" class="form-control" name="product_name" required>
					</div>
					<div  class="form-group">
                            <label class="control-label" for="product_price">Product Price:</label>
							<input type="number" class="form-control" name="product_price" required>
					</div>
					
					<div  class="form-group">
                            <label class="control-label" for="product_description">Product Description:</label>
							<textarea  class="form-control" name="product_description" rows="4" cols="50" required> </textarea> 
					</div>
					<div  class="form-group">
                            <label class="control-label" for="product_description">Product Image:</label>
							<input class="form-control" type="file" name="images[]" multiple required>
					</div>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
			</form>
            </div>
			
        </div>
    </div>
</div>
<!-- Edit -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
		<div class="modal-header">
                <h5 class="modal-title">Edit  Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form id="editForm">

			<div class="row">
				 <div class="col-md-12">
					<div  class="form-group">
                            <label class="control-label" for="product_name">Product Name:</label>
							<input type="text" class="form-control" id="product_name" name="product_name" required>
					</div>
					<div  class="form-group">
                            <label class="control-label" for="product_price">Product Price:</label>
							<input type="number" class="form-control" id="product_price" name="product_price" required>
					</div>
					
					<div  class="form-group">
                            <label class="control-label" for="product_description">Product Description:</label>
							<textarea  class="form-control" id="product_description" name="product_description"  rows="4" cols="50" required> </textarea> 
					</div>
					<div  class="form-group">
                            <label class="control-label" for="product_description">Product Image:</label>
							<input class="form-control" id="images" type="file" name="images[]" multiple>
					</div>
					<input class="form-control" id="previousimages" type="hidden" name="previousimages">
					</div>
				</div>
				<input type="hidden" name="id" id="productid">
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>
			
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
		<div class="modal-header">
                <h5 class="modal-title">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<h4 class="text-center">Are you sure you want to delete</h4>
				<h2 id="delfname" class="text-center"></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="button" id="delid" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</button>
            </div>
			
        </div>
    </div>
</div>
