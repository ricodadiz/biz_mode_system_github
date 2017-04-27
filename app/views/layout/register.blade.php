@if (Session::get('error'))
    <div class="alert alert-error alert-danger">
        @if (is_array(Session::get('error')))
            {{ head(Session::get('error')) }}
        @endif
    </div>
@endif

@if (Session::get('notice'))
    <div class="alert">{{ Session::get('notice') }}</div>
@endif

<form method="POST" action="{{{ URL::to('users') }}}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
    <fieldset>
        @if (Cache::remember('username_in_confide', 5, function() {
            return Schema::hasColumn(Config::get('auth.table'), 'username');
        }))
            <div class="form-group">
                <label for="username">{{{ Lang::get('confide::confide.username') }}}</label>
                <input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}">
            </div>
        @endif
        <div class="form-group">
            <label for="email">{{{ Lang::get('confide::confide.e_mail') }}} <small>{{ Lang::get('confide::confide.signup.confirmation_required') }}</small></label>
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
        </div>
        <div class="form-group">
            <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
        </div>
        <div class="form-group">
            <label for="user_type">{{{ 'User Type' }}}</label>
            <select class="form-control" id="user_type" name="user_type" size="1">
                <option value="member">Company Member</option>
                <option value="owner">Owner</option>
            </select>
        </div>
        <div class="form-group" id="to_hide">
            <label for="company_code">{{{ 'Company Code' }}}</label>
            <input class="form-control" placeholder="Company Code" type="text" name="company_code" id="company_code">
        </div>
        <div class="form-group">
            <div class="col-xs-7 col-sm-8">
                <label class="css-input switch switch-sm switch-success">
                    <input type="checkbox" id="register-terms" name="register-terms"><span></span> I agree with terms &amp; conditions
                </label>
            </div>
            <div class="col-xs-5 col-sm-4">
                <div class="font-s13 text-right push-5-t">
                    <a href="#" data-toggle="modal" data-target="#modal-terms">View Terms</a>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <button class="btn btn-sm btn-block btn-success" type="submit">Create Account</button>
            </div>
        </div>
        <!-- <div class="form-actions form-group">
          <button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
        </div> -->

    </fieldset>
</form>

<script type="text/javascript">
    $("#user_type").change(function() {
        user_type = $("#user_type").val();
        if( user_type == "owner" )
        {
            $("#to_hide").hide("slow");
            $("#company_code").val('owner');
        }
        else
        {
            $("#to_hide").show("slow");   
            $("#company_code").val(null);
        }
    });
</script>
