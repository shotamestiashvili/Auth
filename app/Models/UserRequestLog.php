<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $id
 * @property int $user_id
 * @property int $token_id
 * @property string $request_method
 * @property string $request_params
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read User $user
 * @property-read UserToken $accessToken
 */
class UserRequestLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'token_id',
        'request_method',
        'request_params',
    ];

    protected $casts = [
      'request_params' => 'json'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $model->user()->increment('requests_count');
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function accessToken(): BelongsTo
    {
        return $this->belongsTo(UserToken::class, 'id', 'token_id');
    }
}
