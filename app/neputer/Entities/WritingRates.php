<?php

namespace Neputer\Entities;

use App\Helper\ConfigHelper;
use Neputer\Entities\BaseModel as Model;
use Neputer\Traits\HistoryTrait;

class WritingRates extends BaseModel
{
    use HistoryTrait;

    protected $table = 'writing_rates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by', 'updated_by', 'category_id' ,'category_name_overwrite' ,
        'word_count_type', 'min_word_count', 'max_word_count' ,'standard_rate', 'description',
        'status', 'id'
    ];

    public function setMinWordCountAttribute($value)
    {
        return $this->attributes['min_word_count'] =
            request()->get('word_count_type') == 'min-words'?$value:$this->getCount('min');
    }

    public function setMaxWordCountAttribute($value)
    {
        return $this->attributes['max_word_count'] =
            $this->word_count_type == 'min-words'?request()->get('min_word_count') + 100:$this->getCount('max');
    }

    protected function getCount($type)
    {
        if (ConfigHelper::getConfigByKey('evemoo.writing_rates.use_range_selector') == 'true') {
            $range = explode(';', request()->get('word_count_range'));
            return $type == 'min'?$range[0]:$range[1];
        } else {
            return $type == 'min'?request()->get('min_word_count'):request()->get('max_word_count');
        }
    }

    public function writer_rates()
    {
        return $this->hasMany('App\Model\WriterRates', 'writing_rates_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }
}
