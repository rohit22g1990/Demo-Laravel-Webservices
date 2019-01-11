<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndividualContact extends Model
{
    use Uuids;
    use SoftDeletes;

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = [
        'value',
        'contact_type_id',
        'individual_id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'updated_at' => 'timestamp',
        'created_at' => 'timestamp',
    ];
}
