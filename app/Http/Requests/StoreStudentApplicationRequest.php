<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentApplicationRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'first_name' => ['required','string','max:100'],
            'last_name'  => ['required','string','max:100'],
            'dob'        => ['nullable','date'],
            'gender'     => ['nullable','in:Male,Female,Other'],
            'previous_school' => ['nullable','string','max:150'],
            'class_applying_for' => ['required','string','max:50'],
            'guardian_name'  => ['required','string','max:150'],
            'guardian_phone' => ['required','string','max:50'],
            'guardian_email' => ['nullable','email','max:150'],
            'address'        => ['nullable','string','max:255'],
            // simple honeypot (present in controller too)
            'website'        => ['nullable','size:0'],
        ];
    }
}
