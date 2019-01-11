<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salutation extends Model
{
    use Uuids;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'salutation';

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
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
        'title'
    ];

    /**
     * default search column
     *
     * @var string  $defaultSortColumn
     */
    public $defaultSortColumn = 'title';
}
