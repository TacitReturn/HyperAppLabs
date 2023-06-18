<?php

namespace App\Http\Requests\Comments;

    use Illuminate\Foundation\Http\FormRequest;

    class UpdateCommentRequest extends FormRequest
    {
        /**
         * Get the validation rules that apply to the request.
         */
        public function rules(): array
        {
            return [
                'name' => 'required|string',
                'email' => 'required|string|email',
                'content' => 'required|string|min:10',
            ];
        }
    }
