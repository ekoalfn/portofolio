<div class="block block-rounded">
    <div class="block-content">
        <form action="be_forms_elements.html" method="POST" onsubmit="return false;">
            <div class="row">
                <div class="col-lg-4">
                    <p class="text-muted">
                        You can create or edit a name to set the role
                    </p>
                </div>
                <div class="col-lg-8 col-xl-5">
                    <div class="mb-4 {{ $errors->has('name') ? ' has-error': '' }}">
                        {!! Form::label('name', 'Name: ', ['class' => 'col-lg-8 col-form-label required fs-8']) !!}
                        <div class="col-lg-12 fv-row">
                            {!! Form::text('name', null, ['class' => 'form-control form-control-lg
                            form-control-solid', 'required' =>
                            'required', 'placeholder'=>'Ex. Alex']) !!}
                        </div>
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="mb-4 {{ $errors->has('email') ? ' has-error': '' }}">
                        {!! Form::label('email', 'Email: ', ['class' => 'col-lg-8 col-form-label required fs-8']) !!}
                        <div class="col-lg-12 fv-row">
                            {!! Form::email('email', null, ['class' => 'form-control form-control-lg
                            form-control-solid', 'required' =>
                            'required', 'placeholder'=>'alex@gmail.com' ]) !!}
                        </div>
                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                    </div>

                    @if ($formMode === 'create')
                    <div class="mb-4 {{ $errors->has('password') ? ' has-error' : ''}}">
                        {!! Form::label('password', 'Password: ', ['class' => 'col-lg-8 col-form-label required fs-8'])
                        !!}
                        <div class="col-lg-12 fv-row">
                            {{ Form::password('password', array('id' => 'password', 'class' => 'form-control
                            form-control-lg
                            form-control-solid', 'autocomplete' => 'off', 'required' => 'required',
                            'placeholder'=>'****')) }}
                        </div>
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>
                    @endif

                    <div class="mb-4 {{ $errors->has('phone_number') ? ' has-error': '' }}">
                        {!! Form::label('phone_number', 'Phone Number: ', ['class' => 'col-lg-8 col-form-label required fs-8']) !!}
                        <div class="col-lg-12 fv-row">
                            {!! Form::number('phone_number', null, ['class' => 'form-control form-control-lg
                            form-control-solid', 'required' =>
                            'required', 'placeholder'=>'Ex. 081234567890']) !!}
                        </div>
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="mb-4 {{ $errors->has('role') ? ' has-error' : ''}}">
                        {!! Form::label('role', 'Role: ', ['class' => 'col-lg-8 col-form-label required fs-8']) !!}
                        <div class="col-lg-12 fv-row">
                            {!! Form::select('roles[]', $list_role, isset($user_roles) ? $user_roles : [], ['class' =>
                            'form-control
                            form-control-lg form-control-solid', 'required' => 'required', 'id'=>'roles',
                            'placeholder'=>'Select a
                            Role...']) !!}
                        </div>
                        {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="d-flex justify-content-end">
                        <a class="btn btn-white btn-active-light-primary me-2"
                            href="{{ route('users.index') }}">Cancel</a>
                        {!! Form::submit($formMode === 'edit' ? 'Update' : 'Save Changes', ['class' => 'btn
                        btn-primary', 'id' =>
                        'kt_account_profile_details_submit']) !!}
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END Floating Labels -->