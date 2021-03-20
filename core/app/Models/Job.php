<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'status', 'position',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */

    // relation with User
    public function user()
    {
        return $this->belongsTo('App\Models\User');
        // return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
