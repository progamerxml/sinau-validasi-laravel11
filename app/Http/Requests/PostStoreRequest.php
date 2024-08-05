<?php

namespace App\Http\Requests;

use App\Validation\ValidasiJudulPost;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

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
            new ValidasiJudulPost,
            function(Validator $validator) {
                $this->validasiNamaAuthor($validator);
                $this->validasiEmailAuthor($validator);
            }
        ];
    }

    protected function validasiNamaAuthor(Validator $validator)
    {
        if($this->input('author.name') !== 'Irfan M')
        {
            $validator->errors()->add(
                'author.name', 
                'Nama author tidak valid !'
            );
        }
    }

    protected function validasiEmailAuthor(Validator $validator)
    {
        if($this->input('author.email') !== 'irfan@email.com')
        {
            $validator->errors()->add(
                'author.email',
                'Email author tidak valid !'
            );
        }
    }
    // public function after(): array
    // {
    //     return [
    //         function (Validator $validator) {
    //             if($this->somethingElseIsInvalid()) {
    //                 $validator->errors()->add(
    //                     'field',
    //                     'Ada sesuatu yang salah dengan bidang ini !'
    //                 );
    //             }
    //         }
    //     ];
    // }

    /**
     * Get the "after" validation callables for the request.
     */
    // public function after(): array
    // {
    //     return [
    //         function (Validator $validator) {
    //             if ($this->somethingElseIsInvalid()) {
    //                 $validator->errors()->add(
    //                     'field',
    //                     'Something is wrong with this field!'
    //                 );
    //             }
    //         }
    //     ];
    // }

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

    // protected $stopOnFirstFailure = true;

    // protected $redirect = '/';

    // protected $redirectRoute = 'index';

    // public function attributes(): array
    // {
    //     return [
    //         'title' => 'judul',
    //     ];
    // }

    // protected function prepareForValidation()
    // {
    //     $this->merge([
    //         'slug' => Str::slug($this->slug)
    //     ]);
    // }
}
