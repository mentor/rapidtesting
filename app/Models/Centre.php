<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Centre extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'centres';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'street',
        'city',
        'postal',
        'place_id_ref',
        'country',
        'result_test_manufacturer',
        'result_test_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function centreTests()
    {
        return $this->hasMany(Test::class, 'centre_id', 'id');
    }

    public function centreUsers()
    {
        return $this->hasMany(User::class, 'centre_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
