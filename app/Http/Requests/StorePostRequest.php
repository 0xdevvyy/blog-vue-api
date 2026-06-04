<?php

namespace App\Http\Requests;

use App\Status;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StorePostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:8', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:posts,slug'],
            'content' => ['required', 'string'],
            'description' => ['required', 'string'],
            'blog_image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            // 'status' => ['required', Rule::in(['published', 'draft', 'archive'])],
            'status' => ['nullable', new Enum(Status::class)],
            'tags' => ['required','array'],
            'tags.*' => ['exists:tags,id'],
        ];
    }
}
