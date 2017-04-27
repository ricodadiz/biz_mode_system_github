@extends('layout.in_app')
@section('content')
    <div class="row">
        <div class="col-lg-8">

<!-- Dynamic Table Full -->
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">List of Warehouse <small></small></h3>
                        </div>
                        <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Name</th>
                                        <th class="hidden-xs">Location</th>
                                        <th class="hidden-xs" style="width: 15%;">Status</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="font-w600">Pumps and Nozles</td>
                                        <td class="hidden-xs">Malolos, Bulacan</td>
                                        <td class="hidden-xs">
                                            <span class="label label-danger">Disabled</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td class="font-w600">POS Units</td>
                                        <td class="hidden-xs">Davao Centro, Davao</td>
                                        <td class="hidden-xs">
                                            <span class="label label-primary">Personal</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Dynamic Table Full -->
        </div>
        <div class="col-lg-4">
                            <!-- Validation Wizard (.js-wizard-validation class is initialized in js/pages/base_forms_wizard.js) -->
                            <!-- For more examples you can check out http://vadimg.com/twitter-bootstrap-wizard-example/ -->
                            <div class="js-wizard-validation block">
                                <!-- Step Tabs -->
                                <ul class="nav nav-tabs nav-tabs-alt nav-justified">
                                    <li class="active">
                                        <a class="inactive" href="#validation-step1" data-toggle="tab">1. Create Warehouse</a>
                                    </li>
                                    <li>
                                        <a class="inactive" href="#validation-step2" data-toggle="tab">2. Warehouse Details</a>
                                    </li>
                                    <li>
                                        <a class="inactive" href="#validation-step3" data-toggle="tab">3. Finalize Creation</a>
                                    </li>
                                </ul>
                                <!-- END Step Tabs -->

                                <!-- Form -->
                                <!-- jQuery Validation (.js-form2 class is initialized in js/pages/base_forms_wizard.js) -->
                                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="js-form2 form-horizontal" action="base_forms_wizard.html" method="post">
                                    <!-- Steps Content -->
                                    <div class="block-content tab-content">
                                        <!-- Step 1 -->
                                        <div class="tab-pane fade fade-right in push-30-t push-50 active" id="validation-step1">
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <input class="form-control" type="text" id="validation-firstname" name="validation-firstname" placeholder="Please enter the name of your warehouse">
                                                        <label for="validation-firstname">Warehouse Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <input class="form-control" type="text" id="validation-lastname" name="validation-lastname" placeholder="Please enter the address of your warehouse">
                                                        <label for="validation-lastname">Warehouse Location</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <input class="form-control" type="email" id="validation-email" name="validation-email" placeholder="Please enter the currency">
                                                        <label for="validation-email">Currency</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Step 1 -->
                                        <!-- Step 2 -->
                                        <div class="tab-pane fade fade-right push-30-t push-50" id="validation-step2">
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <textarea class="form-control" id="validation-details" name="validation-details" rows="9" placeholder="Include details here..."></textarea>
                                                        <label for="validation-details">Warehouse Details</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Step 2 -->
                                        <!-- Step 3 -->
                                        <div class="tab-pane fade fade-right push-30-t push-50" id="validation-step3">
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <input class="form-control" type="text" id="validation-city" name="validation-city" placeholder="Authorized Personel">
                                                        <label for="validation-city">Warehouse Deligation</label>
                                                    </div>
                                                </div>
                                            </div>
<!--                                             <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <select class="form-control" id="validation-skills" name="validation-skills" size="1">
                                                            <option value="">Please select your best skill</option>
                                                            <option value="1">Photoshop</option>
                                                            <option value="2">HTML</option>
                                                            <option value="3">CSS</option>
                                                            <option value="4">JavaScript</option>
                                                        </select>
                                                        <label for="validation-skills">Skills</label>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <label class="css-input switch switch-sm switch-primary" for="validation-terms">
                                                        <input type="checkbox" id="validation-terms" name="validation-terms"><span></span> Agree with the <a data-toggle="modal" data-target="#modal-terms" href="#">terms</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Step 3 -->
                                    </div>
                                    <!-- END Steps Content -->
                                    <!-- Steps Navigation -->
                                    <div class="block-content block-content-mini block-content-full border-t">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <button class="wizard-prev btn btn-warning" type="button"><i class="fa fa-arrow-circle-o-left"></i> Previous</button>
                                            </div>
                                            <div class="col-xs-6 text-right">
                                                <button class="wizard-next btn btn-success" type="button">Next <i class="fa fa-arrow-circle-o-right"></i></button>
                                                <button class="wizard-finish btn btn-primary" type="submit"><i class="fa fa-check-circle-o"></i> Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Steps Navigation -->
                                </form>
                                <!-- END Form -->
                            </div>
                            <!-- END Validation Wizard Wizard -->
                        </div>
                    </div>
                    <!-- END Wizards with Validation -->
                </div>
            </div>
            <!-- END Content Grid -->
        </div>
    </div>
@stop