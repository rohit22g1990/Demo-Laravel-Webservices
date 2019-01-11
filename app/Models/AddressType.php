<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddressType extends Model
{
    use Uuids;
    use SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = [
        'type',
        'created_by',
        'is_default',
        'type_of',
    ];

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * default search column
     *
     * @var string  $defaultSortColumn
     */
    public $defaultSortColumn = 'type';

    /**
     * @var array
     */
    public $searchableColumns = [
        'type'
    ];

}
