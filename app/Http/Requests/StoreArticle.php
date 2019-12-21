<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:140',
            'body' => 'required|max:5000',
            'description' => 'required',
            'tags'=>'required',
            'preview'=>'required|file',
        ];
    }


    public function messages()
    {
        return [
            'tags.required' => 'At least one tag is required',
            'preview.required' => 'You should add preview image',
            'preview.file' =>'You should add preview image',
        ];
    }
}
