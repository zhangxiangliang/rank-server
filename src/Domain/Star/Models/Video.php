<?php

namespace Domain\Star\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    /**
     * Get the star that owns the videos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function star()
    {
        return $this->belongsTo(Star::class);
    }
}
