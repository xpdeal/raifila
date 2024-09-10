<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delivery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'document',
        'key',
        'emitter_document',
        'emitter_name',
        'emitter_city',
        'emitter_state',
        'receiver_document',
        'receiver_name',
        'receiver_city',
        'receiver_state',
        'carrier_document',
        'carrier_name',
        'carrier_city',
        'carrier_state',
        'issue_date',
        'internal_number',
        'status',
        'hash',
        'instituicao_financeira',
        'timestamp_event',
        'is_running_job',
        'running_job_name',
        'error_message',
        'filepath_uri'
    ];

    // The attributes that should be cast to native types
    protected $casts = [

    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
