<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\UploadStageEnum;
use App\Observers\UploadStoreObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy(UploadStoreObserver::class)]
class Upload extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'uri',
        'stage'
    ];

    protected $casts = [
        'stage' => UploadStageEnum::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
