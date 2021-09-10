<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @internal
 * @coversNothing
 */
class Test extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const SYMPTOMS_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const RESULT_DIAGNOSIS_SELECT = [
        'diagnosis-1' => 'U07.2',
    ];

    public const RESULT_TYPE_SELECT = [
        'pcr'     => 'RT-PCR',
        'antigen' => 'Antigen',
    ];

    public const RESULT_STATUS_SELECT = [
        'positive' => 'Positive',
        'negative' => 'Negative',
    ];

    public const RESULT_TEST_MANUFACTURER_SELECT = [
        'biosensor-1' => 'SD BIONSESOR, Inc.; ROCHE',
    ];

    public const RESULT_TEST_NAME_SELECT = [
        'antigen01' => 'SARS-COV-2 Rapid Antigen Test ref. 9901-NCOV-01G',
        'pcr01'     => 'PCR test name 01',
    ];

    public $table = 'tests';

    protected $dates = [
        'dob',
        'result_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'pinid',
        'pinrc',
        'firstname',
        'lastname',
        'email',
        'phone',
        'dob',
        'street',
        'city',
        'postal',
        'country',
        'symptoms',
        'result_type',
        'result_date',
        'result_status',
        'result_test_name',
        'result_test_manufacturer',
        'result_diagnosis',
        'centre_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDobAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getResultDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setResultDateAttribute($value)
    {
        $this->attributes['result_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function centre()
    {
        return $this->belongsTo(Centre::class, 'centre_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
