<?php

namespace Neputer\Requests\Topic;

use Illuminate\Http\Request;

class UpdateRequest extends StoreRequest
{

    /**
     * Get the validation rules that apply to the request.
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        return array_merge(parent::rules($request), [
            //
        ]);
    }
}

