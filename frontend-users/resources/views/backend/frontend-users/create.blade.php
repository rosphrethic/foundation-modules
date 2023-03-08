@extends('backend.layouts.app')
@section('title', __('general.create_frontend_user'))
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('backend.frontend-users.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="language_id" class="form-label">{{ __('general.language_id') }}</label>
                        <select name="language_id" id="language_id" class="form-select" required>
                            <option value="" selected disabled>{{ __('general.select_an_option') }}</option>
                            @foreach($languages as $language)
                                <option value="{{ $language->id }}" @selected(old('language_id') == $language->id)>
                                    {{ $language->name }}
                                </option>
                            @endforeach
                        </select>
                        @include('backend.partials.input-validation', ['name' => 'language_id'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="name" class="form-label">{{ __('general.name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('general.name') }}" value="{{ old('name') }}" required>
                        @include('backend.partials.input-validation', ['name' => 'name'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="last_name" class="form-label">{{ __('general.last_name') }}</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="{{ __('general.last_name') }}" value="{{ old('last_name') }}" required>
                        @include('backend.partials.input-validation', ['name' => 'last_name'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="email" class="form-label">{{ __('general.email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('general.email') }}" value="{{ old('email') }}" required>
                        @include('backend.partials.input-validation', ['name' => 'email'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="password" class="form-label">{{ __('general.password') }}</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('general.password') }}" required>
                        @include('backend.partials.input-validation', ['name' => 'password'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="password_confirmation" class="form-label">{{ __('general.password_confirmation') }}</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{ __('general.password_confirmation') }}" required>
                        @include('backend.partials.input-validation', ['name' => 'password_confirmation'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="photo" class="form-label">{{ __('general.photo') }}</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/jpeg">
                        @include('backend.partials.input-validation', ['name' => 'photo'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="is_active" class="form-label">{{ __('general.status') }}</label>
                        <select name="is_active" id="is_active" class="form-select" required>
                            <option value="1" @selected(old('is_active') == '1')>{{ __('general.active') }}</option>
                            <option value="0" @selected(old('is_active') == '0')>{{ __('general.inactive') }}</option>
                        </select>
                        @include('backend.partials.input-validation', ['name' => 'is_active'])
                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-primary w-md me-3">{{ __('general.create_user') }}</button>
                        <a href="{{ route('backend.frontend-users.index') }}" class="btn btn-outline-primary w-md">{{ __('general.cancel') }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
