<?php

namespace App\Http\Livewire\Backend;

use App\Models\FrontendUser;
use Livewire\Component;

class FrontendUsersIndex extends Component {

				public $frontendUsers;
				public $showFilters;
				public $searchTerm;
				public $is_active;

				public function mount()
				{
								$this->showFilters = false;
				}

				public function render()
				{
								$frontendUsersQuery = FrontendUser::query();

								if ($this->searchTerm) {
												$frontendUsersQuery->where('name', 'like', '%' . $this->searchTerm . '%');
												$frontendUsersQuery->orWhere('last_name', 'like', '%' . $this->searchTerm . '%');
												$frontendUsersQuery->orWhere('email', 'like', '%' . $this->searchTerm . '%');
								}

								if ($this->is_active) $frontendUsersQuery->where('is_active', $this->is_active);

								$this->frontendUsers = $frontendUsersQuery->get();

								$this->dispatchBrowserEvent('reloadDatatables');

								return view('backend.livewire.frontend-users-index');
				}

				public function toggleFilters()
				{
								$this->showFilters = ($this->showFilters) ? false : true;
				}

}
