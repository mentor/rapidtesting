<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

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

    /*public const SYMPTOMS_SELECT = [
        'GRJCO' => 'Yes',
        'OVYNP' => 'No',
    ];*/

    public const RESULT_STATUS_SELECT = [
        'positive' => 'Positive',
        'negative' => 'Negative',
    ];

    public const RESULT_TEST_MANUFACTURER_SELECT = [
        'biosensor-1' => 'SD BioSensor, Inc.',
        'roche-1' => 'ROCHE s.r.o.',
        'siemens-1' => 'Siemens Healthcare, s.r.o.',
        'abbott-1' => 'ABBOTT Laboratories, s.r.o.',
        'rapigen-1' => 'RapiGEN Inc.',
        'athena-1' => 'Athena nova a.s.',
        'pcr-1' => 'PCR',
    ];

    public const RESULT_TEST_NAME_SELECT = [
        'biosensor-1-ag-1' => 'Antigénový rýchlotest výterový STANDARD Q COVID-19 Ag SD BIOSENSOR',
        'roche-1-ag-1' => 'Test SARS-CoV-2 Rapid Antigen',
        'siemens-1-ag-1' => 'CLINITEST® Rapid COVID-19 Antigen Test',
        'abbott-1-ag-1' => 'PANBIO™ COVID-19 Ag RAPID TEST DEVICE',
        'rapigen-1-ag-1' => 'BIOCREDIT COVID-19 Ag kit (Cat.No. G61RHA20)',
        'athena-1-ag-1' => 'NOVA Test® SARS-CoV-2 Antigen Rapid Test Kit',
        'pcr-1-pcr-1' => 'PCR',
    ];

    public const STATUS_SELECT = [
        'created'    => 'Vytvorené',
        'ended'      => 'Ukončené',
        'finished'   => 'Uzavreté',
        'confirmed'  => 'Potvrdené',
        'started'    => 'Započaté',
        'registered' => 'Registrovaný',
        'unpaid'     => 'Nezaplatené',
        'paid'       => 'Zaplatené',
        'withdrawn'  => 'Vrátené',
        'cancelled'  => 'Zrušené',
        'noshow'     => 'Nedostavil sa',
        'notarrived' => 'Neprišiel',
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
//        'symptoms',
        'result_date',
        'result_status',
        'result_test_name',
        'result_test_manufacturer',
        'result_diagnosis',
        'centre_id',
        'note',
        'reservation_id_ref',
        'code_ref',
        'insurance_company',
        'presence',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function isTested()
    {
        foreach ([
            $this->result_status,
            $this->result_date,
            $this->result_test_name,
            $this->result_test_manufacturer,
            $this->result_diagnosis
        ] as $value) {
            if (empty($value)) {
                return false;
            }
        }

        return true;
    }
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
        $this->attributes['start'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getEndAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEndAttribute($value)
    {
        $this->attributes['end'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
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

    public function getNameAttribute() {
        return $this->firstname . ' ' . $this->lastname;
    }
}
