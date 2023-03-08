<div>
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="d-flex">
                <button type="button" class="btn btn-primary fw-bold me-4" wire:click="toggleFilters">
                    <i class="bi bi-funnel-fill"></i>
                </button>
                <input type="text" class="form-control search-bar" id="searchTerm" name="searchTerm" wire:model="searchTerm" placeholder="{{ __('general.search') }}">
            </div>
        </div>

        @hasPermissionTo('create_frontend_users')
        <div class="col-lg-8 mb-4">
            <a href="{{ route('backend.frontend-users.create') }}" class="btn btn-primary btn-create float-end fw-bold">{{ __('general.create_frontend_user') }}</a>
        </div>
        @endhasPermissionTo
    </div>

    @if($showFilters)
        <div class="row">
            <div class="col-lg-3">
                <select class="form-select filter mb-4" id="is_active" name="is_active" wire:model="is_active">
                    <option value="">{{ __('general.view_all_statuses') }}</option>
                    <option value="1">{{ __('general.active') }}</option>
                    <option value="0">{{ __('general.inactive') }}</option>
                </select>
            </div>
        </div>
    @endif

    <div class="section">
        <div class="card">
            <div class="card-body">
                @if($frontendUsers->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover datatable">
                            <thead>
                            <tr>
                                <th>{{ __('general.name') }}</th>
                                <th>{{ __('general.last_name') }}</th>
                                <th>{{ __('general.email') }}</th>
                                <th>{{ __('general.status') }}</th>
                                <th>{{ __('general.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($frontendUsers as $frontendUser)
                                <tr>
                                    <td>{{ $frontendUser->name }}</td>
                                    <td>{{ $frontendUser->last_name }}</td>
                                    <td>{{ $frontendUser->email }}</td>
                                    <td class="status">
                                        @if($frontendUser->is_active)
                                            <span class="badge bg-primary">{{ __('general.active') }}</span>
                                        @endif
                                        @if(!$frontendUser->is_active)
                                            <span class="badge bg-secondary">{{ __('general.inactive') }}</span>
                                        @endif
                                    </td>
                                    <td class="actions">
                                        @hasPermissionTo('view_frontend_users')
                                        <a href="{{ route('backend.frontend-users.show', ['frontendUser' => $frontendUser->id]) }}" class="fs-5 ms-2">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        @endhasPermissionTo

                                        @hasPermissionTo('edit_frontend_users')
                                        <a href="{{ route('backend.frontend-users.edit', ['frontendUser' => $frontendUser->id]) }}" class="fs-5 ms-2">
                                            <i class="bi bi-pen-fill"></i>
                                        </a>
                                        @endhasPermissionTo

                                        @hasPermissionTo('delete_frontend_users')
                                        <form action="{{ route('backend.frontend-users.delete', ['frontendUser' => $frontendUser->id]) }}" method="POST" class="d-inline"
                                              onsubmit="return confirm('{{ __('general.delete_confirmation') }}');">
                                            @csrf
                                            @method('DELETE')

                                            <a href="javascript:void(0);" class="fs-5 ms-2" onclick="$(this).parent().submit();">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </form>
                                        @endhasPermissionTo
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-center mt-3">{{ __('general.no_results_found') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
