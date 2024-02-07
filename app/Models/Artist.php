<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Artist Eloquent model
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property boolean $active
 * @property Carbon $create_at
 * @property Carbon $update_at
 */
class Artist extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'active' => 'boolean',
    ];

}
