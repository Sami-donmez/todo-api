<?php

namespace App\Http\Requests;

use App\Utils\TodoStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TodoUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            "content"=>"string|min:3|max:250",
            "status"=>['required','integer', Rule::in(TodoStatus::$status)]
        ];
    }
}
