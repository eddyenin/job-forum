<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreJobRequest extends FormRequest
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
        $user = Auth::user()->employer;
        $userId = $user->id;
        return [
            'title'=>['required'],
            'salary'=>['required'],
            'location'=>['required'],
            'schedule'=>['required', Rule::in(['Part Time','Full Time'])],
            'url'=>['required'],
            'tags'=>['nullable']
        ];
    }
}
