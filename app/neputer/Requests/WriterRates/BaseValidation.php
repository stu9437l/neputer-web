<?php

namespace Neputer\Requests\WriterRates;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Neputer\Entities\WriterRates;
use Neputer\Entities\WritingRates;
use Validator, ConfigHelper;

class BaseValidation extends FormRequest
{
    protected $standard_rate_min;
    protected $standard_rate_max;

    protected function customValidation()
    {
        $this->standard_rate_min = ConfigHelper::getConfigByKey('neputer.writing_rates.standard_rate.min');
        $this->standard_rate_max = ConfigHelper::getConfigByKey('neputer.writing_rates.standard_rate.max');

        Validator::extend('overwrite_std_rate_overwrite', function ($attribute, $value, $parameters, $validator) {

            if ($value >= $this->standard_rate_min && $value <= $this->standard_rate_max)
                return true;

            return false;

        });

        Validator::extend('check_duplicate_writer_rate', function ($attribute, $value, $parameters, $validator) {

            if ( $this->request->has('id') ) {

                if (WriterRates::where('users_id', $this->request->get('users_id'))
                        ->where('writing_rates_id', $value)
                        ->where('id', '!=', $this->request->get('id'))
                        ->count() > 0)
                    return false;

                return true;

            } else {

                if (WriterRates::where('users_id', $this->request->get('users_id'))
                        ->where('writing_rates_id', $value)->count() > 0)
                    return false;

                return true;
            }

        });
    }

    public function messages()
    {
        return [
            'rate_overwrite.overwrite_std_rate_overwrite'
            => 'Rate must be between '.$this->standard_rate_min. ' and '.$this->standard_rate_max,
            'writing_rates_id.check_duplicate_writer_rate'
            => 'This writing rate is already assigned to above writer.',
        ];
    }
}
