@extends('backend.layouts.app')
@section('title', __('general.view_frontend_user'))
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="language_id" class="form-label">{{ __('general.language_id') }}</label>
                    <input type="text" class="form-control" id="language_id" name="language_id" value="{{ $frontendUser->language->name }}" disabled>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="name" class="form-label">{{ __('general.name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $frontendUser->name }}" disabled>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="last_name" class="form-label">{{ __('general.last_name') }}</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $frontendUser->last_name }}" disabled>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="email" class="form-label">{{ __('general.email') }}</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $frontendUser->email }}" disabled>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="photo" class="form-label">
                        {{ __('general.photo') }}
                        <span class="text-primary">({{ __('general.click_to_enlarge') }})</span>
                    </label>
                    <br>
                    <a href="{{ $frontendUser->photo_url }}" data-lightbox="photo" data-title="{{ __('general.photo') }}">
                        <img src="{{ $frontendUser->thumbnail_url }}" alt="photo" class="img-fluid rounded show-img">
                    </a>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="is_active" class="form-label">{{ __('general.status') }}</label>
                    <input type="text" class="form-control" id="is_active" name="is_active" value="{{ ($frontendUser->is_active) ? __('general.active') : __('general.inactive') }}"
                           disabled>
                </div>

                <div class="col-md-12">
                    <a href="{{ route('backend.frontend-users.index') }}" class="btn btn-outline-primary w-md">{{ __('general.cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
