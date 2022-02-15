<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
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
            'title' => 'required|min:8',
            'street_name' => 'required',
            'street_number' => 'required',
            'zip_code' => 'required|numeric',
            'city' => 'required',
            'country' => 'required|min:3',
            'description' => 'required|min:20',
            'price_day' => 'required|numeric',
            'n_rooms' => 'required|numeric',
            'n_baths' => 'required|numeric',
            'n_beds' => 'required|numeric',
            'square_meters' => 'required|numeric',
            'shared' => 'required',
            'visible' => 'required',
        ];
    }
}
