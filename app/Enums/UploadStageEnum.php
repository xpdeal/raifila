<?php

namespace App\Enums;

enum UploadStageEnum: string
{
    case WAITING = 'waiting';
    case PENDING = 'pending';
    case FINISHED = 'finished';
    case REJECTED = 'rejected';

    public function getLabel(): string
    {
        return match ($this) {
            self::WAITING => __('Waiting'),
            self::PENDING => __('Pending'),
            self::FINISHED => __('Finished'),
            self::REJECTED => __('Rejected')
        };
    }
}
