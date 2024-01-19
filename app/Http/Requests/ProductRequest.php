<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ProductRequest extends FormRequest
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
        return [
            'product_name' => 'required|min:6',
            'product_price' => 'required|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'product_name.required' => ':attribute bắt buộc phải nhập',
            'product_price.required' => ':attribute bắt buộc phải nhập',
            'product_name.min' => ':attribute phải có ít nhất :min kí tự',
            'product_price.integer' => ':attribute phải là 1 số nguyên'
        ];
    }

    public function attributes(): array
    {
        return [
            'product_name' => 'Tên sản phẩm',
            'product_price' => 'Giá sản phẩm'
        ];
    }
    /**
     * Get the "after" validation callables for the request.
     */
    public function after(): array
    {
        return [
            function (Validator $validator) {
                // dd($validator);
                if ($validator->errors()->count() > 0) {
                    $validator->errors()->add(
                        'msg',
                        'Đã có lỗi xảy ra, vui lòng kiểm tra lại'
                    );
                }
            }
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
