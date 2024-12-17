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
                    <div class="mb-4 {{ $errors->has('name') ? ' has-error' : ''}}">
                        {!! Form::label('name', 'Name: ', ['class' => 'col-lg-8 col-form-label required fs-8'])
                        !!}
                        <div class="col-lg-12 fv-row">
                            {!! Form::text
                            ('name', null, ['class' => 'form-control form-control-lg form-control-solid',
                            'required' =>
                            'required', 'placeholder' => 'Name Input, Ex: Admin']) !!}
                        </div>
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="mb-4 {{ $errors->has('permission') ? 'has-error' : ''}}">
                        {!! Form::label('permission', 'Permission', ['class' => 'col-lg-4 col-form-label required
                        fw-bold fs-6']) !!}
                        <div class="col-lg-8 fv-row">
                            @if(count($permissions) > 0)
                            @foreach($permissions as $key => $value)
                            <div class="d-flex align-items-center mt-3">
                                <label class="form-check form-check-inline form-check-solid me-5">
                                    {!! Form::checkbox ('permission[]', $key, isset($role->id) ? in_array($key,
                                    $rolePermissions) ? true : null
                                    : null,array('class' => 'form-check-input')) !!} <span
                                        class="fw-bold ps-2 fs-6"></span>
                                    {{ $value
                                    }}</label>
                            </div>
                            @endforeach
                            {!! $errors->first('permission', '<p class="help-block">:message</p>') !!}
                            @else
                            <p>Tidak ada opsi izin, buat dulu...!</p>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-white btn-active-light-primary me-2"
                            href="{{ route('roles.index') }}">Cancel</a>
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