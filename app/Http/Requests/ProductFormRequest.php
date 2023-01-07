<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'integer'
            ],

            'nom' => [
                'required',
                'string'
            ],

            'slug' => [
                'required',
                'string',
                'max:225'
            ],

            'marque' => [
                'required',
                'string',
                'max:225'
            ],

            'small_description' => [
                'required',
                'string'
                
            ],

            'description' => [
                'required',
                'string'
                
            ],

            'prix_original' => [
                'required',
                'integer'
                
            ],

            'prix_de_vente' => [
                'required',
                'integer'
                
            ],

            'quantite' => [
                'required',
                'integer'
                
            ],

            'tendance' => [
                'nullable',
                
                
            ],

            'status' => [
                'nullable',
                
                
            ],

            'meta_title' => [
                'required',
                'string',
                'max:225'
            ],


            'meta_keyword' => [
                'required',
                'string'
            ],

            'meta_description' => [
                'required',
                'string'
            ],

            'image' => [
                'nullable'
            ],
        ];
    }
}
