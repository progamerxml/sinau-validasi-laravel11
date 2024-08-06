<?php

namespace App\Validation;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class ValidasiJudulPost
{
    public function __invoke(Validator $validator)
    {
        $judul = request()->input("title") ?? '';

        if($this->getValidJudul($judul) === false) {
            $validator->errors()->add(
                'title',
                'Judul tidak boleh lebih panjang dari 21 karakter.'
            );
        }
    }

    protected function getValidJudul(string $judul)
    {
        if($judul === null){
            return false;
        }
        return strlen($judul) > 21;
    }

}
