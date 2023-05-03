<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Palette extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'palettes',
        'public',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'palette_likes');
    }

    public function setPalettesAttribute($value)
    {
        $this->attributes['palettes'] = json_encode($value);
    }

    public function getPalettesAttribute($value)
    {
        return json_decode($value);
    }
}
