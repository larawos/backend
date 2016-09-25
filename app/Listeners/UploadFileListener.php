<?php

namespace App\Listeners;

use Storage;
use Log;
use App\Events\UploadFile;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UploadFileListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UploadFile  $event
     * @return void
     */
    public function handle(UploadFile $event)
    {
        if (!Storage::exists($event->file->get('name'))) {
            $result = Storage::put($event->file->get('name'), base64_decode($event->file->get('content')));
            if ($result) {
                Log::info('upload [file:'.$event->file->get('name').'] success.');
            } else {
                Log::notice('upload [file:'.$event->file->get('name').'] failed.');
            }
        }
    }
}
