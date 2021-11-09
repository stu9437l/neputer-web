<?php

namespace App\Model;

class Currencies extends BaseModel
{
    protected $fillable = ['status', 'is_default', 'currency_code', 'symbol', 'rate', 'rank'];


    public function isCurrencyDeletable(){

        if($this->currency_code == 'USD'){
            return false;
        }

        return true;
    }
}
