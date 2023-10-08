<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return auth()->check();
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return ['body' => 'required|min:100']
            +
            ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store()
    {
        return [
            'name' => 'required|unique:articles|max:255'
        ];
    }

    protected function update()
    {
        return [
            'name' => 'required|max:255|unique:articles,name,' . $this->route('id')
        ];
    }
}
