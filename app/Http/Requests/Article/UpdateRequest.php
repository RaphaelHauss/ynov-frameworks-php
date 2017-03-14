<?php

namespace App\Http\Requests\Article;

use Auth;

class UpdateRequest extends StoreRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::id() == $this->route()->parameter('article')->author_id;
    }
}
