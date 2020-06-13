<?php

declare(strict_types=1);

namespace App\Comment\Http;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'body' => ['required'],
        ];

        if ($this->input('parent_id') !== null) {
            $rules['parent_id'] = 'exists:comments,id';
        }

        return $rules;
    }

    public function getData(): array
    {
        return [
            'parent_id' => $this->input('parent_id'),
            'body' => $this->input('body'),
        ];
    }
}
