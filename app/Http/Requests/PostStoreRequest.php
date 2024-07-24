<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class PostStoreRequest extends FormRequest
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
            'title' => 'bail|required|unique:posts|max:255',
            'post' => 'required',
            'author.name' => 'required',
            'author.email' => 'required',
            'v1\.0' => 'nullable',
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                if($this->somethingElseIsInvalid()) {
                    $validator->errors()->add(
                        'field',
                        'Ada sesuatu yang salah dengan bidang ini !'
                    );
                }
            }
        ];
    }

    // contoh method after yang mengandung invocable class 
    // public function after(): array
    // {
    //     return [
    //         new ValidateUserStatus, 
    //         new ValidateShippingTime,
    //         function (Validator $validator) {
    //             //
    //         }
    //     ];
    // }

    protected $stopOnFirstFailure = true;

    protected $redirect = '/';

    protected $redirectRoute = 'index';
}
