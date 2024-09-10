<?php

namespace App\Jobs;

use App\Models\Upload;
use App\Notifications\UserUploadNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UploadApiJob implements ShouldQueue
{
    use Queueable;

    public int $tries = 5;

    protected Upload $upload;

    /**
     * Create a new job instance.
     */
    public function __construct(Upload $upload)
    {
       $this->upload = $upload;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //servie kkk
        try {
            //$file = Storage::disk('public')->get($this->upload->uri);
          $teste = [];
        } catch (\Exception $e) {
           // $this->upload->user()->notify(new UserUploadNotification($e->getMessage()));
        }
    }
}
