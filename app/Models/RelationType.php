<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelationType extends Model
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
        'type',
        'created_by',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'updated_at' => 'timestamp',
        'created_at' => 'timestamp',
    ];

    /**
     * @var array
     */
    public $searchableColumns = [
        'type'
    ];

    /**
     * default search column
     *
     * @var string  $defaultSortColumn
     */
    public $defaultSortColumn = 'type';
}
