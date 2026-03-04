<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'room_id' => 'required|exists:rooms,id',
            'hotel_id' => 'required|exists:hotels,id',
            'price_per_night' => 'required|numeric|min:0.01',
        ];
    }

    /**
     * Get custom error messages for validation.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'name.string' => 'Name must be a valid string.',
            'name.max' => 'Name may not be greater than 255 characters.',

            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',

            'phone.required' => 'Phone number is required.',
            'phone.string' => 'Phone number must be a string.',
            'phone.max' => 'Phone number may not be greater than 20 characters.',

            'check_in.required' => 'Check-in date is required.',
            'check_in.date' => 'Check-in date must be a valid date.',
            'check_in.after_or_equal' => 'Check-in date cannot be in the past.',

            'check_out.required' => 'Check-out date is required.',
            'check_out.date' => 'Check-out date must be a valid date.',
            'check_out.after' => 'Check-out date must be after the check-in date.',

            'room_id.required' => 'Room ID is required.',
            'room_id.exists' => 'The selected room does not exist.',

            'hotel_id.required' => 'Hotel ID is required.',
            'hotel_id.exists' => 'The selected hotel does not exist.',

            'price_per_night.required' => 'Price per night is required.',
            'price_per_night.numeric' => 'Price per night must be a valid number.',
            'price_per_night.min' => 'Price per night must be at least 0.01.',
        ];
    }
}
