<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use OwenIt\Auditing\Contracts\Auditable;

class FrontendUser extends Model implements Auditable {

				use HasFactory;
				use \OwenIt\Auditing\Auditable;

				protected $table = 'frontend_users';

				protected $fillable = [];

				protected $guarded = [];

				protected $hidden = [
								'password',
								'remember_token',
				];

				protected $with = [];

				protected $appends = [
								'photo_url',
								'thumbnail_url',
				];

				public function language(): BelongsTo
				{
								return $this->belongsTo(Language::class);
				}

				public function getFullNameAttribute(): string
				{
								return $this->name . ' ' . $this->last_name;
				}

				public function getPhotoUrlAttribute(): string
				{
								if ($this->photo) {
												return config('app.url') . Storage::url($this->photo);
								}

								return asset('frontend/images/default-user-photo.png');
				}

				public function getThumbnailUrlAttribute(): string
				{
								$pathExploded = explode('.', $this->photo);

								if ($pathExploded[0] && $pathExploded[1]) {
												$thumbnailPath = $pathExploded[0] . '_thumbnail.' . $pathExploded[1];

												return config('app.url') . Storage::url($thumbnailPath);
								}

								return asset('backend/images/default-user-photo.png');
				}

}
