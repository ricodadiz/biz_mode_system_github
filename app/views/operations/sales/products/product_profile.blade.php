@extends('layout.in_app')
@section('content')
        <div class="content content-boxed">
                    <!-- Header Tiles -->
                    <div class="row">
                        <div class="col-xs-6 col-sm-4">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to="250"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">In Orders</div>
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to="29"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Available</div>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-danger"><i class="fa fa-times"></i></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-danger font-w600">Delete Product</div>
                            </a>
                        </div>
                    </div>
                    <!-- END Header Tiles -->

                    <!-- Info -->
                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">General Info</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                                    <form class="form-horizontal push-30-t push-30" action="base_pages_ecom_product_edit.html" method="post" onsubmit="return false;">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="product-id" name="product-id">
                                                    <label for="product-id">Name</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12 push-10">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="product-name" name="product-name">
                                                    <label for="product-name">Description</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <!-- Select2 (.js-select2 class is initialized in App() -> uiHelperSelect2()) -->
                                                <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                                                <div class="form-material">
                                                    <select class="js-select2 form-control" id="product-category" name="product-category" style="width: 100%;" data-placeholder="Choose one..">
                                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                        <option value="1">Stockable</option>
                                                        <option value="2" selected>Non Stockable</option>
                                                    </select>
                                                    <label for="example2-select2">Type</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 push-10">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="product-name" name="product-name">
                                                    <label for="product-name">Status</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 push-10">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="product-name" name="product-name">
                                                    <label for="product-name">Product Code</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 push-10">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="product-name" name="product-name">
                                                    <label for="product-name">Bar Code</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 push-10">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="product-name" name="product-name">
                                                    <label for="product-name">Weight</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 push-10">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="product-name" name="product-name">
                                                    <label for="product-name">Avg order lead time</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="product-price" name="product-price" value="59,00">
                                                    <label for="product-price">Price in USD ($)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="product-price" name="product-price">
                                                    <label for="product-price">Product Group</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="product-price" name="product-price">
                                                    <label for="product-price">Unit</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="product-price" name="product-price">
                                                    <label for="product-price">Tax key on sales/label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="product-price" name="product-price">
                                                    <label for="product-price">Tax key on purchase</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-12">Condition</label>
                                            <div class="col-xs-12">
                                                <label class="css-input css-radio css-radio-primary push-10-r">
                                                    <input type="radio" id="product-condition-new" name="product-condition" value="new" checked><span></span> New
                                                </label>
                                                <label class="css-input css-radio css-radio-primary">
                                                    <input type="radio" id="product-condition-old" name="product-condition" value="old"><span></span> Old
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-12">Lot Tracking</label>
                                            <div class="col-xs-12">
                                                <label class="css-input css-radio css-radio-primary push-10-r">
                                                    <input type="radio" id="product-condition-new" name="product-condition" value="new" checked><span></span> Enabled
                                                </label>
                                                <label class="css-input css-radio css-radio-primary">
                                                    <input type="radio" id="product-condition-old" name="product-condition" value="old"><span></span>Disabled
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-12">Published?</label>
                                            <div class="col-xs-12">
                                                <label class="css-input switch switch-sm switch-primary">
                                                    <input type="checkbox" id="product-published" name="product-published" checked><span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <button class="btn btn-sm btn-primary" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Info -->

                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Price List</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                                  
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Images -->
                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Images</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                                    <!-- DropzoneJS  -->
                                    <!-- For more info and examples you can check out http://www.dropzonejs.com/#usage -->
                                    <form class="dropzone push-30-t push-30" action="base_pages_ecom_product_edit.html"></form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Images -->

                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Suppliers</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                                  
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Accounting</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Inventory</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Files</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
        </div>

        <script>
            jQuery(function () {
                // Init page helpers (BS Maxlength + Select2 + Tags Inputs + CKEditor + Appear + CountTo plugins)
                App.initHelpers(['maxlength', 'select2', 'tags-inputs', 'ckeditor', 'appear', 'appear-countTo']);
            });
        </script>
@stop
