@extends('layouts.app')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Pengaturan</h2>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <!-- account setting page start -->
    <section id="page-account-settings">
        <div class="row">
            <!-- left menu section -->
            <div class="col-md-3 mb-2 mb-md-0">
                <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                            <i class="feather icon-globe mr-50 font-medium-3"></i>
                            Umum
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                            <i class="feather icon-lock mr-50 font-medium-3"></i>
                            Keamanan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                            <i class="fa fa-shopping-bag mr-50 font-medium-3"></i>
                            Bisnis
                        </a>
                    </li>
                </ul>
            </div>
            <!-- right content section -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                    {!! Form::open(['url' => route('settings.store'), 'method' => 'post']) !!}
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        {!! Form::label('name', 'Nama') !!}
                                                        {!! Form::text('name', $user->name, ['class' => 'form-control', 'required']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        {!! Form::label('email', 'Email') !!}
                                                        {!! Form::text('email', $user->email, ['class' => 'form-control', 'required']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan</button>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                                <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                    {!! Form::open(['url' => route('settings.updatePassword'), 'method' => 'post']) !!}
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-old-password">Old Password</label>
                                                        <input type="password" name="old_password" class="form-control" id="account-old-password" required placeholder="Old Password" data-validation-required-message="This old password field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-new-password">New Password</label>
                                                        <input type="password" name="password" id="account-new-password" class="form-control" placeholder="New Password" required data-validation-required-message="The password field is required" minlength="6">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-retype-new-password">Retype New
                                                            Password</label>
                                                        <input type="password" name="con_password" class="form-control" required id="account-retype-new-password" data-validation-match-match="password" placeholder="New Password" data-validation-required-message="The Confirm password field is required" minlength="6">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                                <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                    <div class="media">
                                        <a href="javascript: void(0);">
                                            <img src="{{ asset('uploads/images/'.$business->image) }}" class="rounded mr-75" alt="profile image" height="64" width="64">
                                        </a>
                                        <div class="media-body mt-75">
                                            <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload new photo</label>
                                            </div>
                                            <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG.</small></p>
                                        </div>
                                    </div>
                                    <hr>
                                    {!! Form::open(['url' => route('settings.update', [$business->id]), 'method' => 'post', 'files' => true]) !!}
                                    @method('PUT')    
                                    <input type="file" name="image" id="account-upload" hidden>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    {!! Form::label('name', 'Nama Bisnis') !!}
                                                    {!! Form::text('name', $business->name, ['class' => 'form-control', 'required']) !!}
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    {!! Form::label('phone', 'Nomor HP') !!}
                                                    {!! Form::number('phone', $business->phone, ['class' => 'form-control', 'required']) !!}
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    {!! Form::label('address', 'Alamat') !!}
                                                    {!! Form::text('address', $business->address, ['class' => 'form-control', 'required']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="divider">
                                            <div class="divider-text">Prefix</div>
                                        </div>
                                        <div class="row">
                                            @foreach ($business->prefixes as $key => $item)
                                            @php
                                                if(strpos($key, '_'))
                                                    $label = str_replace('_', ' ', $key);

                                                $label = strtoupper($key);
                                            @endphp
                                                <div class="form-group col">
                                                    {!! Form::label('prefixes', $label) !!}
                                                    {!! Form::text('prefixes['.$key.']', $item, ['id' => 'prefixes', 'class' => 'form-control']) !!}
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- account setting page end -->

</div>
@endsection
