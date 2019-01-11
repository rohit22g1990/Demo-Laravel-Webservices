<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndividualAddress extends Model
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
        'address_type_id',
        'address_field1',
        'address_field2',
        'house_number',
        'post_code',
        'country',
        'city',
        'company_name',
        'copy_company_id',
        'effective_by',
        'automatic_transfer',
        'phone',
        'fax',
        'individual_id'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'updated_at' => 'timestamp',
        'created_at' => 'timestamp',
    ];
}
