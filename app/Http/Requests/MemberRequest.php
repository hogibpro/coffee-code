<?php

namespace App\Http\Requests;

use App\Models\MemberCareerHistory;
use App\Models\MemberEducationHistory;
use App\Models\MemberFirldType;
use Illuminate\Http\Request;

class MemberRequest extends BaseFormRequest
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
    public function rules(Request $request)
    {
        $memberEducationHistories = 'member_education_histories.*.';
        $memberCareerHistories = 'member_career_histories.*.';
        $memberOwnedQualifications = 'member_owned_qualifications.*.';
        $fieldTypes = 'field_types.*.';

        return [
            'id' => ['bail', 'nullable'],
            'name_kanji' => ['bail', 'required', 'string', 'max:100'],
            'name_furigana' => ['bail', 'required', 'string', 'max:100'],
            'email' => ['bail', 'required', 'email', 'max:255'],
            'email_for_update' => ['bail', 'nullable', 'email', 'max:255'],
            'token_for_update_email' => ['bail', 'nullable', 'max:100'],
            'birthdate' => ['bail', 'required', 'date'],
            'gender' => ['bail', 'nullable', 'integer', 'min:0'],
            'office_name' => ['bail', 'required','string', 'max:255'],
            'postal_code' => ['bail', 'required','string', 'max:20'],
            'prefecture' => ['bail', 'required','integer', 'min:0'],
            'address1' => ['bail', 'required','string', 'max:255'],
            'address2' => ['bail', 'required','string', 'max:255'],
            'tel1' => ['bail', 'required','string', 'max:10'],
            'tel2' => ['bail', 'required','string', 'max:10'],
            'tel3' => ['bail', 'required','string', 'max:10'],
            'owned_qualifications' => ['bail', 'nullable', 'string'],
            'advisory_experience_years' => ['bail', 'required','integer', 'min:1', 'max:5'],
            'other_specialized_field' => ['bail', 'nullable','string', 'max:255'],
            'experience' => ['bail', 'required','string', 'max:255'],
            'note' => ['bail', 'nullable', 'string'],
            'is_partner' => ['bail', 'required', 'boolean'],
            'is_release_working_status' => ['bail', 'required', 'boolean'],
            'member_education_histories' => ['bail', 'required', 'array'],
            'member_career_histories' => ['bail', 'required', 'array'],
            'field_types' => ['bail', 'required', 'array'],
            $memberEducationHistories.'id' => ['bail', 'nullable', 'integer'],
            $memberEducationHistories.'member_id' => ['bail', 'nullable', 'exists:members,id', 'integer'],
            $memberEducationHistories.'admission' => ['bail', 'required', 'date'],
            $memberEducationHistories.'graduation' => ['bail', 'required', 'date'],
            $memberEducationHistories.'school_name' => ['bail', 'required','string', 'max:255'],
            $memberCareerHistories.'id' => ['bail', 'nullable', 'integer'],
            $memberCareerHistories.'member_id' => ['bail', 'nullable', 'exists:members,id', 'integer'],
            $memberCareerHistories.'find_work' => ['bail', 'required', 'date'],
            $memberCareerHistories.'retirement' => ['bail', 'nullable', 'date'],
            $memberCareerHistories.'office_name' => ['bail', 'required','string', 'max:255'],
            $memberCareerHistories.'status' => ['bail', 'required', 'integer'],
            $memberCareerHistories.'free_entry' => ['bail', 'nullable','string'],
            'member_owned_qualifications' => ['bail', 'nullable', 'array'],
            $memberOwnedQualifications.'owned_qualification' => ['bail', 'required','integer'],
            $fieldTypes.'field_id' => ['bail', 'required', 'integer'],
            $fieldTypes.'type' => ['bail', 'required', 'integer'],
            $memberOwnedQualifications.'other_qualification' => ['bail', 'nullable','string'],
            'certified_accountant_number' => ['bail', 'nullable' ,'string', 'max:10'],
            'us_certified_accountant_number' => ['bail', 'nullable', 'string', 'max:10'],
            'tax_accountant_number' => ['bail',  'nullable', 'string', 'max:10'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        $memberEducationHistories = 'member_education_histories.*.';
        $memberCareerHistories = 'member_career_histories.*.';
        $memberOwnedQualifications = 'member_owned_qualifications.*.';
        $fieldTypes = 'field_types.*.';

        return [
            'name_kanji' => '??????????????????',
            'name_furigana' => '????????????????????????',
            'email' => '?????????????????????',
            'email_for_update' => '??????????????????????????????',
            'token_for_update_email' => '??????????????????????????????????????????',
            'birthdate' => '????????????',
            'gender' => '??????',
            'office_name' => '????????????',
            'postal_code' => '????????????',
            'prefecture' => '????????????',
            'address1' => '????????????',
            'address2' => '????????????',
            'tel1' => '????????????',
            'tel2' => '????????????',
            'tel3' => '???????????????',
            'certified_accountant_number' => '???????????????????????????',
            'us_certified_accountant_number' => '?????????????????????????????????',
            'tax_accountant_number' => '?????????????????????',
            'advisory_experience_years' => '?????????????????????????????????',
            'other_specialized_field' => '?????????????????????',
            'experience' => '??????',
            'note' => '??????',
            'is_partner' => 'Partner?????????',
            'is_release_working_status' => '???????????????????????????',
            'member_education_histories' => '????????????',
            'member_career_histories' => '??????????????????',
            $memberEducationHistories.'member_id' => '?????????ID',
            $memberEducationHistories.'admission' => '????????????',
            $memberEducationHistories.'graduation' => '????????????',
            $memberEducationHistories.'school_name' => '?????????',
            $memberCareerHistories.'member_id' => '?????????ID',
            $memberCareerHistories.'find_work' => '????????????',
            $memberCareerHistories.'retirement' => '????????????',
            $memberCareerHistories.'office_name' => '?????????',
            $memberCareerHistories.'status' => '???????????????',
            $memberCareerHistories.'free_entry' => '????????????',
            $memberOwnedQualifications.'owned_qualification' => '????????????',
            $memberOwnedQualifications.'other_qualification' => '?????????????????????',
            $fieldTypes.'field_id' => '????????????ID',
            $fieldTypes.'type' => '??????',
        ];
    }
}
