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

    public const RESULT_DIAGNOSIS_SELECT = [
        'diagnosis-1' => 'U07.2',
    ];

    public const SYMPTOMS_SELECT = [
        'GRJCO' => 'Yes',
        'OVYNP' => 'No',
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

    public const STATUS_SELECT = [
        '0'  => 'Created',
        '1'  => 'Ended',
        '2'  => 'Finished',
        '3'  => 'Confirmed',
        '4'  => 'Started',
        '5'  => 'Registered',
        '6'  => 'Unpaid',
        '7'  => 'Paid',
        '8'  => 'Withdrawn',
        '9'  => 'Cancelled',
        '10' => 'No Show',
        '11' => 'Not Arrived',
    ];

    public $table = 'tests';

    protected $dates = [
        'start',
        'end',
        'dob',
        'result_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'status',
        'service_id',
        'start',
        'end',
        'pinrc',
        'pinid',
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
        'result_date',
        'result_status',
        'result_test_name',
        'result_test_manufacturer',
        'result_diagnosis',
        'centre_id',
        'note',
        'reservation_id_ref',
        'code_ref',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function getStartAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setStartAttribute($value)
    {
        //$this->attributes['start'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
        $this->attributes['start'] = $value ? Carbon::parse($value)->format('Y-m-d H:i:s') : null;
    }

    public function getEndAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEndAttribute($value)
    {
        //$this->attributes['end'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
        $this->attributes['end'] = $value ? Carbon::parse($value)->format('Y-m-d H:i:s') : null;
    }

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
