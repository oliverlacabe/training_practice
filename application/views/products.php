<div class="container" style="margin-top: 20px;">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Product Management</h3>
    </div>
    <div class="panel-body">
        <div class="col-md-12" id="prodMessage"></div>
        <form class="form" id="frmProducts" method="post">
          <input type="hidden" name="prodID" id="prodID" value="">
          <div class="form-group col-md-2">
            <label class="control-label">Product Code</label>
            <input class="form-control" type="text" name="prodCode" id="prodCode" value="">
          </div>

          <div class="form-group col-md-4">
            <label class="control-label">Product Name</label>
            <input class="form-control" type="text" name="prodName" id="prodName" value="">
          </div>

          <div class="form-group col-md-2">
            <label class="control-label">Product Price</label>
            <input class="form-control" type="number" min="0.01" step="0.01" name="prodPrice" id="prodPrice" value="">
          </div>

          <div class="form-group col-md-2">
            <label class="control-label">Stock</label>
            <input class="form-control" type="number" min="1" name="prodStock" id="prodStock" value="">
          </div>

          <div class="form-group col-md-1">
            <label class="control-label">&nbsp;</label>
            <button class="btn btn-primary btn-block" type="submit" id="btnSubmit">Save</button>
          </div>

          <div class="form-group col-md-1">
            <label class="control-label">&nbsp;</label>
            <button class="btn btn-default btn-block" type="button" id="reset">Clear</button>
          </div>

        </form>
    </div>
  </div>

  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Product List</h3>
    </div>
    <div class="panel-body" id="tblContainer"></div>
  </div>

</div>
