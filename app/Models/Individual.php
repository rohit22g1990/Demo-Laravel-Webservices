<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    use Notifiable;
    use Uuids;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'gender',
        'initial',
        'first_name',
        'middle_name',
        'last_name',
        'created_by',
        'relation_type_id',
        'profile_pic',
        'account_manager_id'
    ];

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $casts = [
        'updated_at' => 'timestamp',
        'created_at' => 'timestamp',
    ];
}
