<?php

namespace Neputer\Entities;

use App\Helper\AppHelper;
use Neputer\Entities\BaseModel as Model;
use Neputer\Traits\HistoryTrait;

class WriterRates extends Model
{

    use HistoryTrait;

    protected $table = 'writer_rates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by', 'updated_by', 'users_id' ,'writing_rates_id' ,'rate_overwrite' ,'effective_from_date', 'status', 'id'
    ];

    public function setEffectiveFromDateAttribute($value)
    {
        $this->attributes['effective_from_date'] = AppHelper::formatDate('Y/m/d', $value);
    }

    public function getEffectiveFromDateAttribute($value)
    {
        return AppHelper::formatDate('m/d/Y', $value);
    }
}
