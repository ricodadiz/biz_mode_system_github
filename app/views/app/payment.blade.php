@extends('layout.in_app')
@section('content')
    <div class="row">
        <div class="col-md-4">
             <!-- Material Login -->
            <div class="block block-themed">
                <div class="block-header bg-success">
                    <ul class="block-options">
                       
                    </ul>
                    <h3 class="block-title">Payment</h3>
                </div>
                <div class="block-content">
                    <p>You will now subscribe to a secure payment portal.</p>
                    <form action="{{URL::to('test')}}" method="POST">
                      <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_K8bknJGaPeqn7PgMDNoYDnep"
                        data-amount="500000"
                        data-name="BeezMode Solutions"
                        data-description="Secure Payment Widget - Stripe"
                        data-currency="PHP"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto">
                      </script>
                    </form>
                    <br>
                </div>
            </div>
            <!-- END Material Login -->
        </div>
        <div class="col-md-4">
            <!-- Material Login -->
            <div class="block block-themed">
                <div class="block-header bg-primary">
                    <ul class="block-options">
                       
                    </ul>
                    <h3 class="block-title">Payment</h3>
                </div>
                <div class="block-content">
                    <p>You will now subscribe to a secure payment portal.</p>
                    <form action="{{URL::to('test')}}" method="POST">
                      <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_K8bknJGaPeqn7PgMDNoYDnep"
                        data-amount="500000"
                        data-name="BeezMode Solutions"
                        data-description="Secure Payment Widget - Stripe"
                        data-currency="PHP"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto">
                      </script>
                    </form>
                    <br>
                </div>
            </div>
            <!-- END Material Login -->
        </div>
        <div class="col-md-4">
             <!-- Material Login -->
            <div class="block block-themed">
                <div class="block-header bg-warning">
                    <ul class="block-options">
                       
                    </ul>
                    <h3 class="block-title">Payment</h3>
                </div>
                <div class="block-content">
                    <p>You will now subscribe to a secure payment portal.</p>
                    <form action="{{URL::to('test')}}" method="POST">
                      <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_K8bknJGaPeqn7PgMDNoYDnep"
                        data-amount="500000"
                        data-name="BeezMode Solutions"
                        data-description="Secure Payment Widget - Stripe"
                        data-currency="PHP"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto">
                      </script>
                    </form>
                    <br>
                </div>
            </div>
            <!-- END Material Login -->
        </div>
    </div>
    <!-- <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
      Stripe.setPublishableKey('pk_test_K8bknJGaPeqn7PgMDNoYDnep');
    </script> -->
@stop