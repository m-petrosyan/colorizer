<?php

namespace App\Observers\Palette;

use App\Models\Palette;

class PaletteObserver
{
    /**
     * @param  Palette  $palette
     * @return void
     */
    public function creating(Palette $palette): void
    {
        if (!isset($palette->title)) {
            $palette->title = 'my colors';
        }
    }

    /**
     * Handle the Palette "created" event.
     */
    public function created(Palette $palette): void
    {
    }

    /**
     * Handle the Palette "updated" event.
     */
    public function updated(Palette $palette): void
    {
        //
    }

    /**
     * Handle the Palette "deleted" event.
     */
    public function deleted(Palette $palette): void
    {
        //
    }

    /**
     * Handle the Palette "restored" event.
     */
    public function restored(Palette $palette): void
    {
        //
    }

    /**
     * Handle the Palette "force deleted" event.
     */
    public function forceDeleted(Palette $palette): void
    {
        //
    }
}
