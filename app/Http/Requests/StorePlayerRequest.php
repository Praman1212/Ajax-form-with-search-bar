<?php

namespace App\Http\Requests;

use App\Rules\UniqueNameInClub;
use Illuminate\Foundation\Http\FormRequest;

use function Laravel\Prompts\alert;
use function Laravel\Prompts\text;

class StorePlayerRequest extends FormRequest
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
        return  [
            'name' => ['required','max:255',new UniqueNameInClub($this->input('club'))],
            'club' => 'required|max:255',
            'country' => 'required',
            'is_retired' => 'required',
            'goal_number' => 'required'
        ];
    
    }
    public function messages()
    {
        return[
            'name.required' => 'Name is required',
            'name.max' => 'Name must not exceed 255 characters',
            'club.required' => 'Club is required',
            'club.max' => 'Club must not exceed 255 characters',
            'country.required' => 'Country is required',
            'is_retired.required' => 'Retirement status is required',
            'goal_number.required' => 'Goal number is required',
            'goal_number.integer' => 'Goal number must be an integer',
        ];
    }
}
