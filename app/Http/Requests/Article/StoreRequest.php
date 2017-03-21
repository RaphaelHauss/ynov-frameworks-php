<?php

namespace App\Http\Requests\Article;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:10'],
            'content' => ['required', 'min:25'],
            'published_at' => ['date_format:d/m/Y'],
            'cover' => [
                'image',
                Rule::dimensions()
                    ->minWidth(400)
                    ->minHeight(100),
            ],
        ];
    }
}
