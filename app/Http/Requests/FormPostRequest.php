<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Stringable;

class FormPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titre'=>['required','min:8'],
            'titre'=>['required','min:8','regex:/^[0-9a-z]+$/',Rule::unique('posts')->ignore($this->route()->parameter('post'))],
            'titre'=>['required'],
        ];
    }
    protected function prepareForValidation()
    {
      $this->merge([
         'slug'=>$this->input('slug')?:$this->input('titre')
      ]);
    }
   
}
