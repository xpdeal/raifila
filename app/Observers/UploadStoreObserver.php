<?php

namespace App\Observers;

use App\Jobs\UploadApiJob;
use App\Models\Upload;

class UploadStoreObserver
{
    public function creating(Upload $upload)
    {

    }
    public function saving(Upload $upload)
    {

    }
    /**
     * Handle the Upload "created" event.
     */
    public function created(Upload $upload): void
    {
      event(new UploadApiJob($upload));
    }

    /**
     * Handle the Upload "updated" event.
     */
    public function updated(Upload $upload): void
    {
        //
    }

    /**
     * Handle the Upload "deleted" event.
     */
    public function deleted(Upload $upload): void
    {
        //
    }

    /**
     * Handle the Upload "restored" event.
     */
    public function restored(Upload $upload): void
    {
        //
    }

    /**
     * Handle the Upload "force deleted" event.
     */
    public function forceDeleted(Upload $upload): void
    {
        //
    }
}
