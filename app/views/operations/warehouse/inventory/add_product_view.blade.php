@extends('layout.in_app')
@section('content')

		
                <!-- Page Content -->
                <div class="content content-boxed">
                    <!-- Header Tiles -->
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to="{{$product_count}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">All Products</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to="{{$instock_count}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Total Available Stock</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <a class="block block-link-hover3 text-center" href="{{URL::to('warehouse/'.$company->id.'/product_list')}}">
                                <div class="block-content block-content-full">
                                    <div class="h4 font-w50 text-info"><i class="glyphicon glyphicon-list fa-2x"></i></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Back to Product list</div>
                            </a>
                        </div>
                    </div>
                    <!-- END Header Tiles -->

                    <!-- Info -->
                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Info</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                                    <form class="form-horizontal push-30-t push-30" action="{{URL::to('warehouse/'.$company->id.'/add_product')}}" method="post">
                                        <div class="form-group">
                                         @if(Session::get('add_error'))
                                            <div class="alert alert-error alert-danger">
                                            @foreach(Session::get('add_error')->all() as $m)
                                                {{$m}}<br>    
                                            @endforeach
                                            </div>
                                        @endif
                                        @if(Session::get('message_add'))
                                            <div class="alert alert-success">
                                            {{Session::get('message_add')["message"]}}
                                            </div>
                                        @endif
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="add-product" name="add-product" value="">
                                                    <label for="product-id">Product Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="add-product" name="product-code" value="">
                                                    <label for="product-id">Product Code</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="add-product" name="model-code" value="">
                                                    <label for="product-id">Model Code</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="add-product" name="supplier-code" value="">
                                                    <label for="product-id">Supplier Code</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="number" id="add-product" name="warranty" placeholder="Days">
                                                    <label for="product-id">Product Warranty</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <!-- Select2 (.js-select2 class is initialized in App() -> uiHelperSelect2()) -->
                                                <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                                                <div class="form-material">
                                                    <select class="js-select2 form-control" id="category-product" name="category-product" style="width: 100%;" data-placeholder="Choose one..">
                                                        <option selected disabled>Select Category</option>
                                                        @foreach($categories as $c)
                                                            <option value="{{$c->category_name}}">{{$c->category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="example2-select2">Category</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <!-- Select2 (.js-select2 class is initialized in App() -> uiHelperSelect2()) -->
                                                <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                                                <div class="form-material">
                                                    <select class="js-select2 form-control" id="brand-product" name="brand-product" style="width: 100%;" data-placeholder="Choose one..">
                                                        <option selected disabled>Select Brand</option>
                                                        @foreach($brand as $b)
                                                            <option value="{{$b->brand_name}}">{{$b->brand_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="example2-select2">Brands</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="number" id="stock-product" name="stock-product">
                                                    <label for="product-name">Stock</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="number" step="0.05" id="price-product" name="price-product">
                                                    <label for="product-price">Price in Ph</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <!-- Select2 (.js-select2 class is initialized in App() -> uiHelperSelect2()) -->
                                                <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                                                <div class="form-material">
                                                    <select class="js-select2 form-control" id="warehouse-product" name="warehouse-product" style="width: 100%;" data-placeholder="Choose one..">
                                                        <option selected disabled>Select Warehouse</option>
                                                        @foreach($warehouse as $w)
                                                            <option value="{{$w->warehouse_name}}">{{$w->warehouse_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="example2-select2">Warehouse</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 push-10">
                                                <div class="form-material form-material-primary">
                                                    <label>Description</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 push-10">
                                                <textarea id="js-ckeditor" name="description-product"></textarea>
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
                    <!-- Images -->
                    <!-- END Images -->
                </div>
           

            <script type="text/javascript">
                // uiHelperCkeditor();
                CKEDITOR.disableAutoInline = true;

                if (jQuery('#js-ckeditor-inline').length) {
                    CKEDITOR.inline('js-ckeditor-inline');
                }

                // Init full text editor
                if (jQuery('#js-ckeditor').length) {
                    CKEDITOR.replace('js-ckeditor');
                }

                $('.js-select2').select2();
            </script>

            <script>
            jQuery(function () {
                // Init page helpers (Appear + CountTo plugins)
                App.initHelpers(['appear', 'appear-countTo']);
            });
        </script>        
@stop