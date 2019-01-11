<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use Uuids;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'cities';

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'country_id'
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
        'name'
    ];

    /**
     * default search column
     *
     * @var string  $defaultSortColumn
     */
    public $defaultSortColumn = 'name';

}
