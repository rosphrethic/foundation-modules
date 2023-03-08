<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreFrontendUserRequest;
use App\Http\Requests\Backend\UpdateFrontendUserRequest;
use App\Http\Traits\Foundation;
use App\Models\FrontendUser;
use App\Models\Language;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FrontendUserController extends Controller {

				use Foundation;

				public function index()
				{
								return view('backend.frontend-users.index');
				}

				public function create()
				{
								$languages = Language::all();

								return view('backend.frontend-users.create', compact('languages'));
				}

				public function store(StoreFrontendUserRequest $request)
				{
								$frontendUser = new FrontendUser();
								$frontendUser->language_id = $request->language_id;
								$frontendUser->name = $request->name;
								$frontendUser->last_name = $request->last_name;
								$frontendUser->email = $request->email;
								$frontendUser->password = Hash::make($request->password);
								$frontendUser->is_active = $request->is_active;
								$frontendUser->save();

								$this->updatePhoto($frontendUser, $request);

								Session::flash('success', __('general.record_saved_successfully'));

								return to_route('backend.frontend-users.show', ['frontendUser' => $frontendUser->id]);
				}

				public function show(FrontendUser $frontendUser)
				{
								return view('backend.frontend-users.show', compact('frontendUser'));
				}

				public function edit(FrontendUser $frontendUser)
				{
								$languages = Language::all();

								return view('backend.frontend-users.edit', compact('frontendUser', 'languages'));
				}

				public function update(UpdateFrontendUserRequest $request, FrontendUser $frontendUser)
				{
								$frontendUser->name = $request->name;
								$frontendUser->last_name = $request->last_name;
								$frontendUser->email = $request->email;
								$frontendUser->is_active = $request->is_active;
								$frontendUser->save();

								$this->updatePhoto($frontendUser, $request);

								Session::flash('success', __('general.record_updated_successfully'));

								return to_route('backend.frontend-users.show', ['frontendUser' => $frontendUser->id]);
				}

				public function delete(FrontendUser $frontendUser)
				{
								try {
												$frontendUser->delete();

												Session::flash('success', __('general.record_deleted_successfully'));

								} catch (QueryException $e) {
												Session::flash('error', __('general.record_could_not_be_deleted'));
								}

								return back();
				}


				public function updatePhoto($frontendUser, $request)
				{
								if ($request->photo) {
												$validator = Validator::make($request->all(), [
																'photo' => 'max:2000|mimes:jpg,jpeg',
												])->validate();

												$file = $this->storeFileToPublicDisk('frontend-users', $request->photo, $request->photo->getClientOriginalExtension(), 1000, 1000);

												$user->photo = $file['path'];
												$user->save();
								}
				}

}
