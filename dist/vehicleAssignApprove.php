<?php
require 'base/header.php';
?>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >
        <div class="card">
            <h5 class="card-header">Product List</h5>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-4">
                        <input id="item-code-search" type="text" placeholder="Search Item Code Here...." class="form-control ">
                    </div>            
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" id="product-list-tbl">
                        <thead>
                            <tr>
                                <th>Item Code</th>
                                <th>Name</th>
                                <th>Vendor</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="product-list">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Item Code</th>
                                <th>Name</th>
                                <th>Vendor</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>    

</div>

<?php
require 'base/footer.php';
?>                    