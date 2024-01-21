<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $uniqueEmail = 'unique:users';
        if (session('id')) {
            $id = session('id');
            $uniqueEmail = 'unique:users,email,' . $id;
        }
        return [
            'fullname' => 'required|min:5',
            'email' => 'required|email|' . $uniqueEmail,
            'group_id' => ['required', 'integer', function ($attribute, $value, $fails) {
                if ($value == 0) {
                    $fails(':attribute bắt buộc phải chọn');
                }
            }],
        ];
    }

    public function messages(): array
    {
        return [
            'fullname.required' => ':attribute bắt buộc phải nhập',
            'email.required' => ':attribute bắt buộc phải nhập',
            'fullname.min' => ':attribute phải có ít nhất :min kí tự',
            'email.email' => ':attribute không đúng định dạng',
            'email.unique' => ':attribute đã tồn tại',
            'group_id.required' => ':attribute không được để trống',
            'group_id.integer' => ':attribute không hợp lệ',
        ];
    }

    public function attributes(): array
    {
        return [
            'fullname' => 'Tên người dùng',
            'email' => 'Email',
            'group_id' => 'Nhóm',
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
    // protected function prepareForValidation(): void
    // {
    //     $this->merge([
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ]);
    // }
}
