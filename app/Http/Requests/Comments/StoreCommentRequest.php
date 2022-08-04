<?php

    namespace App\Http\Requests\Comments;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreCommentRequest extends FormRequest
    {
        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        public function rules(): array
        {
            return [
                "name" => "required|string",
                "email" => "required|string|email:rfc,dns",
                "content" => "required|string|min:10",
            ];
        }
    }
