<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    use HasFactory;

    protected $primaryKey = 'place_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'address',
        'latitude',
        'longitude',
        'description',
        'visited_at',
        'shared',
        'thumbnail',
        'user_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'visited_at' => 'datetime',
    ];

    // protected $appends = [];

    protected $with = ['users', 'photos', 'rating'];

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function photos()
    {
        return $this->hasMany('App\Models\Photos', 'place_id');
    }

    public function rating()
    {
        return $this->hasMany('App\Models\Rating', 'place_id');
    }
}
