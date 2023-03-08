<?php

namespace App\Http\Requests\Backend;

use App\Http\Traits\Foundation;
use Illuminate\Foundation\Http\FormRequest;

class StoreFrontendUserRequest extends FormRequest {

				use Foundation;

				/**
					* Determine if the user is authorized to make this request.
					*
					* @return bool
					*/
				public function authorize()
				{
								return $this->hasPermissionTo('create_frontend_users');
				}

				/**
					* Get the validation rules that apply to the request.
					*
					* @return array<string, mixed>
					*/
				public function rules()
				{
								return [
												'name'      => 'required|max:255',
												'last_name' => 'required|max:255',
												'email'     => 'required|max:255|email|unique:frontend_users',
												'password'  => 'required|max:255|confirmed',
												'is_active' => 'required|',
								];
				}

}
