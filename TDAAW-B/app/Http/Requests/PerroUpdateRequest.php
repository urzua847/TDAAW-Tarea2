<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class PerroUpdateRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            "id" => "nullable|exists:perro,id",
            "nombre" => "required|string|min:6|max:16",
            'foto_url' => 'nullable|url',
            'descripcion' => 'nullable|string|min:0|max:30',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es requerido',
            'integer' => 'El campo :attribute debe ser un número entero',
            'numeric' => 'El campo :attribute debe ser un número',
            'exists' => 'El :attribute debe existir en nuestro sistema',
            'boolean' => 'El campo :attribute debe ser un valor tipo boolean',
            'required_unless' => 'El campo :attribute es requerido condicionalmente',
            'required_with_all' => 'El campo :attribute es requerido condicionalmente',
            'required_with' => 'El campo :attribute es requerido condicionalmente',
            'required_if' => 'El campo :attribute es requerido condicionalmente',
            'string' => 'El campo : attribute debe ser de tipo string',
            'unique' => 'El campo :attribute debe ser único en nuestro sistema',
            'max' => 'El campo :attribute supera el largo máximo permitido',
            'array' => 'El campo :attribute debe ser de tipo array'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json($validator->errors()->all(), Response::HTTP_BAD_REQUEST)
        );
    }

}
