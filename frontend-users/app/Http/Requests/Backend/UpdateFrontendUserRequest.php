<?php

namespace App\Http\Requests\Backend;

use App\Http\Traits\Foundation;
use App\Models\FrontendUser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFrontendUserRequest extends FormRequest {

				use Foundation;

				/**
					* Determine if the user is authorized to make this request.
					*
					* @return bool
					*/
				public function authorize()
				{
								return $this->hasPermissionTo('edit_frontend_users');
				}

				/**
					* Get the validation rules that apply to the request.
					*
					* @return array<string, mixed>
					*/
				public function rules(): array
				{
								return [
												'name'      => 'required|max:255',
												'last_name' => 'required|max:255',
												'email'     => 'required|max:255|email|' . Rule::unique('frontend_users')->ignore($this->route('frontendUser')),
												'password'  => 'sometimes|max:255|confirmed',
												'is_active' => 'required',
								];
				}

}
