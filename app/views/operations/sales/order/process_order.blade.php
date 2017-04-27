@extends('layout.in_app')
@section('content')
   
                        <div class="block block-themed">
                                <div class="block-header bg-info">
                                    <ul class="block-options">
                                        <li>
                                            <button type="button" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                                        </li>
                                    </ul>
                                    <h3 class="block-title">Material (floating)</h3>
                                </div>
                                <div class="block-content">
                                    <form class="form-horizontal push-10-t push-10" action="base_forms_premade.html" method="post" onsubmit="return false;">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="contact3-lastname" name="contact3-lastname">
                                                    <label for="contact3-lastname">Recipient Name</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-material">
                                                    <input class="form-control" type="date" id="login2-username" name="login2-username" placeholder="Enter your username..">
                                                    <label for="login2-username">Order Date</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-4">
                                                <div class="form-material">
                                                    <select class="js-select2 form-control select2-hidden-accessible" id="example2-select2-multiple" name="example2-select2-multiple" style="width: 100%;" data-placeholder="Choose Product.." multiple="" tabindex="-1" aria-hidden="true">
                                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                        <option value="1">HTML</option>
                                                        <option value="2">CSS</option>
                                                        <option value="3">JavaScript</option>
                                                        <option value="4">PHP</option>
                                                        <option value="5">MySQL</option>
                                                        <option value="6">Ruby</option>
                                                        <option value="7">AngularJS</option>
                                                    </select>
                                                    <label for="example2-select2-multiple">Products</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="contact3-lastname" name="contact3-lastname">
                                                    <label for="contact3-lastname">Qty</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="contact3-lastname" name="contact3-lastname">
                                                    <label for="contact3-lastname">Total</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-3">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="contact3-lastname" name="contact3-lastname">
                                                    <label for="contact3-lastname">Sub Total</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="contact3-lastname" name="contact3-lastname">
                                                    <label for="contact3-lastname">Vat</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="contact3-lastname" name="contact3-lastname">
                                                    <label for="contact3-lastname">Discount</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="contact3-lastname" name="contact3-lastname">
                                                    <label for="contact3-lastname">Net Total</label>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="col-xs-3">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="contact3-lastname" name="contact3-lastname">
                                                    <label for="contact3-lastname">Paid</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="contact3-lastname" name="contact3-lastname">
                                                    <label for="contact3-lastname">Due</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-material floating open">
                                                    <select class="form-control" id="contact3-subject" name="contact3-subject" size="1">
                                                        <option value="1">Support</option>
                                                        <option value="2">Billing</option>
                                                        <option value="3">Management</option>
                                                        <option value="4">Feature Request</option>
                                                    </select>
                                                    <label for="contact3-subject">Payment Type</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i> Submit</button>
                                    </form>
                                                 <a href="{{URL::to('sales/'.$company->id.'/invoice_order')}}" class="btn btn-sm btn-info" >INVOICE</a>
                                            </div>
                                        </div>
                                </div>
                            </div>

                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <ul class="block-options">
                                <li class="dropdown">
                                    <button type="button" data-toggle="dropdown">Filter <span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">35</span>Pending</a>
                                        </li>
                                        <li>
                                            <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">15</span>Processing</a>
                                        </li>
                                        <li>
                                            <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">20</span>For delivery</a>
                                        </li>
                                        <li>
                                            <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">72</span>Canceled</a>
                                        </li>
                                        <li>
                                            <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">890</span>Delivered</a>
                                        </li>
                                        <li>
                                            <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">997</span>All</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <h3 class="block-title">All Orders</h3>
                        </div>
                        <div class="block-content">
                            <table class="table table-borderless table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 100px;">ID</th>
                                        <th class="hidden-xs text-center">Submitted</th>
                                        <th>Status</th>
                                        <th class="visible-lg">Customer</th>
                                        <th class="visible-lg text-center">Products</th>
                                        <th class="hidden-xs text-right">Value</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00965</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">17/05/2015</td>
                                        <td>
                                            <span class="label label-success">Delivered</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Emma Cooper</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">1</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$768,36</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="{{URL::to('sales/'.$company->id.'/view_order')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00964</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">12/10/2015</td>
                                        <td>
                                            <span class="label label-info">For delivery</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Sara Holland</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">6</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$2344,81</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="{{URL::to('sales/'.$company->id.'/view_order')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00963</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">18/03/2015</td>
                                        <td>
                                            <span class="label label-info">For delivery</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Roger Hart</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">6</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$31,21</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="{{URL::to('sales/'.$company->id.'/view_order')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00962</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">27/06/2015</td>
                                        <td>
                                            <span class="label label-danger">Canceled</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Evelyn Willis</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">8</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$640,14</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="{{URL::to('sales/'.$company->id.'/view_order')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00961</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">04/03/2015</td>
                                        <td>
                                            <span class="label label-warning">Processing</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Dennis Ross</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">8</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$1075,38</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="{{URL::to('sales/'.$company->id.'/view_order')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00960</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">27/03/2015</td>
                                        <td>
                                            <span class="label label-warning">Processing</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Bruce Edwards</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">5</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$716,69</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="{{URL::to('sales/'.$company->id.'/view_order')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00959</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">04/04/2015</td>
                                        <td>
                                            <span class="label label-info">For delivery</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Lisa Gordon</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">6</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$1422,85</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00958</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">12/02/2015</td>
                                        <td>
                                            <span class="label label-info">For delivery</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Susan Elliott</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">8</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$96,64</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00957</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">16/06/2015</td>
                                        <td>
                                            <span class="label label-info">For delivery</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Amanda Powell</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">9</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$1072,73</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00956</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">10/01/2015</td>
                                        <td>
                                            <span class="label label-success">Delivered</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Bruce Edwards</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">7</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$1255,90</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00955</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">14/09/2015</td>
                                        <td>
                                            <span class="label label-info">For delivery</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Bruce Edwards</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">9</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$27,92</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00954</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">21/02/2015</td>
                                        <td>
                                            <span class="label label-success">Delivered</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Adam Hall</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">3</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$1719,57</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00953</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">25/01/2015</td>
                                        <td>
                                            <span class="label label-danger">Canceled</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Amy Hunter</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">5</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$760,52</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00952</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">18/04/2015</td>
                                        <td>
                                            <span class="label label-success">Delivered</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Roger Hart</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">4</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$1485,55</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00951</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">21/06/2015</td>
                                        <td>
                                            <span class="label label-success">Delivered</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Rebecca Reid</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">7</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$798,43</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00950</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">27/07/2015</td>
                                        <td>
                                            <span class="label label-danger">Canceled</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Ethan Howard</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">1</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$555,84</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00949</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">02/01/2015</td>
                                        <td>
                                            <span class="label label-warning">Processing</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Evelyn Willis</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">4</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$139,65</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00948</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">22/11/2015</td>
                                        <td>
                                            <span class="label label-success">Delivered</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Jack Greene</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">4</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$1405,54</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00947</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">24/08/2015</td>
                                        <td>
                                            <span class="label label-warning">Processing</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Denise Watson</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">7</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$1260,28</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00946</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">02/04/2015</td>
                                        <td>
                                            <span class="label label-warning">Processing</span>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_customer.html">Helen Silva</a>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">3</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$1559,55</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <nav class="text-right">
                                <ul class="pagination pagination-sm">
                                    <li class="active">
                                        <a href="javascript:void(0)">1</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">2</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">3</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">4</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">5</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class="fa fa-angle-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    {{HTML::script("assets/js/plugins/select2/select2.full.min.js")}}
                    <script type="text/javascript">
                        $(".js-select2").select2();
                    </script>
@stop