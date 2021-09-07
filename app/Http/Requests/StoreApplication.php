<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplication extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|alpha_spaces|max:191',
            'last_name' => 'required|alpha_spaces|max:191',
            'email' => 'required|email|max:191',
            'mobile_number' => 'required|digits:10',
            'designation' => 'required|string|max:191',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:30',
            'marital_staus' => 'required|string|max:30',
            'address1' => 'required|string',
            'city' => 'required|string|max:30',
            'state' => 'required|string|max:30',
            'pincode' => 'required|string|max:6',
            
            'ssc_percentage' => 'nullable|numeric|between:0,100',
            'hsc_percentage' => 'nullable|numeric|between:0,100',
            'bachelor_percentage' => 'nullable|numeric|between:0,100',
            'master_percentage' => 'nullable|numeric|between:0,100',
            
            'work_experiences___form.*.company_name' => 'required|string|max:191',
            'work_experiences___form.*.designation' => 'required|string|max:191',
            'work_experiences___form.*.experience_from' => 'required|date',
            'work_experiences___form.*.experience_to' => 'required|date',

            'languages' => 'required',
            'technologies' => 'required',

            'reference_contact___form.*.name' => 'nullable|string|max:191',
            'reference_contact___form.*.mobile_number' => 'nullable|digits:10',
            'reference_contact___form.*.ralation' => 'nullable|string|max:191',

            'preferred_location' => 'required',
            'department' => 'required|string|max:191',
            'notice_period' => 'required|numeric|between:0,3',
            'expected_ctc' => 'required|numeric',
            'current_ctc' => 'required|numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'First Name is required.',
            'first_name.alpha_spaces' => 'First Name may only contain letters and spaces.',
            'first_name.max' => 'First Name may not be greater than 191 characters.',

            'last_name.required' => 'Last Name is required.',
            'last_name.alpha_spaces' => 'Last Name may only contain letters and spaces.',
            'last_name.max' => 'Last Name may not be greater than 191 characters.',

            'email.required' => 'Email Address is required.',
            'email.email' => 'Email Address must be a valid email address.',
            'email.max' => 'Email Address may not be greater than 191 characters.',

            'mobile_number.required' => 'Mobile No is required.',
            'mobile_number.digits' => 'Mobile No must be 10 digits.',

            'designation.required' => 'Designation is required.',
            'designation.max' => 'Designation may not be greater than 191 characters.',

            'date_of_birth.required' => 'Date of Birth is required.',
            'date_of_birth.date' => 'Date of Birth is not a valid date.',

            'gender.required' => 'Gender is required.',
            'gender.max' => 'Gender may not be greater than 30 characters.',

            'marital_staus.required' => 'Marital Staus is required.',
            'marital_staus.max' => 'Marital Staus may not be greater than 30 characters.',

            'address1.required' => 'Address1 is required.',

            'city.required' => 'City is required.',
            'city.max' => 'City may not be greater than 30 characters.',

            'state.required' => 'State is required.',
            'state.max' => 'State may not be greater than 30 characters.',

            'pincode.required' => 'Pincode is required.',
            'pincode.max' => 'Pincode may not be greater than 6 characters.',

            'ssc_percentage.numeric' => 'Percentage must be a number.',
            'ssc_percentage.between' => 'Percentage must be a valid.',
            'hsc_percentage.numeric' => 'Percentage must be a number.',
            'hsc_percentage.between' => 'Percentage must be a valid.',
            'bachelor_percentage.numeric' => 'Percentage must be a number.',
            'bachelor_percentage.between' => 'Percentage must be a valid.',
            'master_percentage.numeric' => 'Percentage must be a number.',
            'master_percentage.between' => 'Percentage must be a valid.',

            'work_experiences___form.*.company_name.required' => 'Company Name is required.',
            'work_experiences___form.*.company_name.max' => 'Company Name may not be greater than 191 characters.',

            'work_experiences___form.*.designation.required' => 'Designation is required.',
            'work_experiences___form.*.designation.max' => 'Designation may not be greater than 191 characters.',

            'work_experiences___form.*.experience_from.required' => 'Experience From Date is required.',
            'work_experiences___form.*.experience_from.date' => 'Experience From Date is not a valid date.',

            'work_experiences___form.*.experience_to.required' => 'Experience To Date is required.',
            'work_experiences___form.*.experience_to.date' => 'Experience To Date is not a valid date.',

            'languages.required' => 'Languages is required.',
            'technologies.required' => 'Technologies is required.',
            
            'reference_contact___form.*.name.max' => 'Name may not be greater than 191 characters.',
            'reference_contact___form.*.mobile_number.digits' => 'Mobile No must be 10 digits.',
            'reference_contact___form.*.name.ralation' => 'Ralation may not be greater than 191 characters.',

            'preferred_location.required' => 'Preferred Location is required.',

            'department.required' => 'Department is required.',
            'department.max' => 'Department may not be greater than 191 characters.',

            'notice_period.required' => 'Notice Period is required.',
            'notice_period.numeric' => 'Notice Period must be a number.',
            'notice_period.between' => 'Notice Period may not be more than 3 Months.',

            'expected_ctc.required' => 'Expected CTC is required.',
            'expected_ctc.numeric' => 'Expected CTC must be a number.',

            'current_ctc.required' => 'Current CTC is required.',
            'current_ctc.numeric' => 'Current CTC must be a number.',
        ];
    }
}
