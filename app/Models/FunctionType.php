<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class FunctionType extends Model
{
    use Notifiable;
    use Uuids;
    use SoftDeletes;

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'created_by',
    ];

    /**
     * @var array $searchableColumns
     */
    public $searchableColumns = [
        'type',
    ];

    /**
     * @var string $defaultSortColumn
     */
    public $defaultSortColumn = 'type';
}
