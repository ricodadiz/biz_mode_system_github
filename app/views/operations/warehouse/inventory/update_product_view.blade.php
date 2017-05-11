@extends('layout.in_app')
@section('content')

                <!-- Page Content -->
                <div class="content content-boxed">
                    <!-- Header Tiles -->
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                            
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-success" data-toggle="countTo" data-to="{{$instock_count}}"> </div>
                                </div>                               
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Total Available Stock</div>
                                
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-danger" data-toggle="countTo" data-to="{{$out_of_stock_count}}"> </div>
                                </div>

                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-danger font-w600">Out of Stock</div>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-4">
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
                                    <form class="form-horizontal push-30-t push-30" action="{{URL::to('warehouse/'.$company->id.'/update_product/'.$product->id)}}" method="post">
                                        <div class="form-group">
                                         @if(Session::get('update_error'))
                                            <div class="alert alert-error alert-danger">
                                            @foreach(Session::get('update_error')->all() as $m)
                                                {{$m}}<br>    
                                            @endforeach
                                            </div>
                                        @endif
                                        @if(Session::get('message_update'))
                                            <div class="alert alert-success">
                                            {{Session::get('message_update')["message"]}}
                                            </div>
                                        @endif
                                           
                                        <div class="form-group"> 
                                             <div class="col-xs-12">     
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="add-product" name="add-product" value="{{$product->product_name}}">
                                                    <label for="product-id">Product Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="add-product" name="product-code" value="{{$product->product_code}}">
                                                    <label for="product-id">Product Code</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="add-product" name="model-code" value="{{$product->model_code}}">
                                                    <label for="product-id">Model Code</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="add-product" name="supplier-code" value="{{$product->supplier_code}}">
                                                    <label for="product-id">Supplier Code</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="add-product" name="warranty" value="{{$product->warranty}}">
                                                    <label for="product-id">Product Warranty(Days)</label>
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
                                                            @if($product->category == $c->category_name)
                                                                <option value="{{$c->category_name}}" selected>{{$c->category_name}}</option>
                                                            @else
                                                                <option value="{{$c->category_name}}">{{$c->category_name}}</option>
                                                            @endif
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
                                                            @if($product->brand == $b->brand_name)
                                                                <option value="{{$b->brand_name}}" selected>{{$b->brand_name}}</option>
                                                            @else
                                                                <option value="{{$b->brand_name}}">{{$b->brand_name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <label for="example2-select2">Brands</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" disabled type="number" id="stock-product" name="stock-product" value="{{$product->in_stock}}">
                                                    <label for="product-name">Stock</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="number" step="0.05" id="price-product" name="price-product" value="{{$product->product_price}}">
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
                                                            @if($product->warehouse == $w->warehouse_name)
                                                                <option value="{{$w->warehouse_name}}" selected>{{$w->warehouse_name}}</option>
                                                            @else
                                                                <option value="{{$w->warehouse_name}}">{{$w->warehouse_name}}</option>
                                                            @endif
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
                                                <textarea id="js-ckeditor" name="description-product">{{$product->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <button class="btn btn-sm btn-primary" type="submit">Save</button>
                                            </div>
                                        </div>
                                     </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Info -->
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
                                    <form class="dropzone push-30-t push-30 dz-clickable" action="{{URL::to('warehouse/'.$company->id.'/upload_image_product/'.$product->id)}}"><div class="dz-default dz-message"><span>Drop files here to upload</span></div></form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Images -->
                </div>
                <!-- END Page Content -->

            <script>
            jQuery(function () {
                // Init page helpers (Appear + CountTo plugins)
                App.initHelpers(['appear', 'appear-countTo']);
            });
            </script>
            
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
@stop