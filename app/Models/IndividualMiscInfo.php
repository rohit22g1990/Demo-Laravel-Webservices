<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndividualMiscInfo extends Model
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
        'individual_id',
        'dob',
        'birth_place',
        'birth_name',
        'marital_status',
        'nationality',
        'id_type',
        'id_number',
        'id_expiry_date',
        'id_scan_copy',
        'national_insurance',
        'job_description',
        'bic_code',
        'v_number',
        'website',
        'department',
        'relation_code',
        'entry_date',
        'inactive',
        'no_mailing',
        'salutation_id',
        'function_type_id',
        'first_names',
        'home_page',
        'iban',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'updated_at' => 'timestamp',
        'created_at' => 'timestamp',
    ];
}
