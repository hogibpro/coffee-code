<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class MatterRequest extends BaseFormRequest
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
            'subject' => ['bail', 'nullable', 'string', 'max:255'],
            'industry_type_id' => ['bail', 'nullable', 'exists:industry_types,id', 'integer'],
            'overview' => ['bail', 'nullable', 'string', 'max:21845'],
            'business_content' => ['bail', 'nullable', 'string', 'max:21845'],
            'reward' => ['bail','nullable', 'string', 'max:255'],
            'period' => ['bail','nullable', 'string', 'max:255'],
            'area' => ['bail','nullable', 'string', 'max:255'],
            'weekly_working_days' => ['bail','nullable', 'string', 'max:255'],
            'target_company' => ['bail','nullable', 'string', 'max:255'],
            'sales_scale' => ['bail','nullable', 'string', 'max:255'],
            'work_style' => ['bail','nullable', 'string', 'max:255'],
            'application_start_date' => ['bail','nullable','date'],
            'application_end_date' => ['bail','nullable','date', 'after_or_equal:application_start_date'],
            'qualifications' => ['bail', 'nullable', 'string', 'max:21845'],
            'publication_range' => ['bail','nullable','integer', Rule::in([1,2])],
            'introduction_company_name' => ['bail','nullable', 'string', 'max:255'],
            'client_id' => ['bail','nullable', 'integer', 'exists:clients,id'],
            'order_date' => ['bail','nullable', 'date'],
            'project_name' => ['bail','nullable', 'string', 'max:255'],
            'gross_fee' => ['bail','nullable', 'string', 'max:255'],
            'net_fee' => ['bail','nullable', 'string', 'max:255'],
            'matter_status' => ['bail', 'nullable', 'integer', 'max:255'],
            'contract_status' => ['bail', 'nullable', 'integer', 'max:255'],
            'press_release_url' => ['bail','nullable', 'string', 'max:1024'],
            'note' => ['bail', 'nullable', 'string', 'max:21845'],
            'matter_billing_code' => ['bail','nullable', 'string', 'max:100'],
            "published_date" => ['bail','nullable', 'date'],
            'assign_users.*' => ['bail','exists:users,id'],
            'field_types.*' => ['bail','exists:field_types,id']
        ];

    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'subject' => '??????',
            'industry_type_id' => '??????',
            'overview' => '??????',
            'business_content' => '????????????',
            'reward' => '??????',
            'period' => '??????',
            'area' => '??????',
            'weekly_working_days' => '??????????????????',
            'target_company' => '????????????',
            'sales_scale' => '????????????',
            'work_style' => '?????????',
            'application_start_date' => '???????????????',
            'application_end_date' => '???????????????',
            'qualifications' => '?????????????????????',
            'publication_range' => '????????????',
            'introduction_company_name' => '????????????????????????',
            'client_id' => '???????????? ',
            'order_date' => '???????????????',
            'project_name' => '?????????????????????',
            'gross_fee' => 'Gross?????????',
            'net_fee' => '??????????????????',
            'matter_status' => '?????????????????????',
            'contract_status' => '?????????????????????',
            'press_release_url' => '?????????????????????URL',
            'note' => '??????',
            'matter_billing_code' => '????????????????????????',
            "published_date" => '????????????',
            'assign_users.*' => '????????????????????????',
            'field_types.*' => '????????????'
        ];
    }

}
