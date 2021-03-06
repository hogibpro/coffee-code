<?php

namespace App\Http\Requests;

use App\Models\TemporaryMemberCareerHistory;
use App\Models\TemporaryMemberEducationHistory;
use App\Models\TemporaryMemberFieldType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class TemporaryMemberRequest extends BaseFormRequest
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
        $tmCareer = !empty($request->temporary_member_career) ? 'temporary_member_career.' : 'temporary_member_career.*.';
        $tmCareerHistories = 'temporary_member_career_histories.*.';
        $tmEducationHistories = 'temporary_member_education_histories.*.';
        $tmFieldTypes = 'temporary_member_field_types.*.';
        $tmQualifications = 'temporary_member_qualifications.*.';
        $tmOwnedQualification = 'temporary_member_owned_qualifications.*.';
        return [
            //temporary_member
            'name_kanji' => ['bail', 'required', 'string', 'max:100'],
            'name_furigana' => ['bail', 'required', 'string', 'max:255'],
            'email' => ['bail', 'required', 'email', 'max:255'],
            'password' => ['bail', 'string', 'max:255'],
            'interview_status' => ['bail', 'nullable', 'integer', 'between:1,5'],
            'temporary_member_career' => ['bail', 'nullable'],
            //temporary_member_career
            $tmCareer.'id' => ['bail', 'required', 'integer'],
            $tmCareer.'temporary_member_id' => ['bail', 'required', 'exists:temporary_members,id', 'integer'],
            $tmCareer.'birthdate' => ['bail', 'required', 'date'],
            $tmCareer.'gender' => ['bail', 'nullable', 'integer'],
            $tmCareer.'office_name' => ['bail', 'required','string', 'max:255'],
            $tmCareer.'postal_code' => ['bail', 'required','string', 'max:20'],
            $tmCareer.'prefecture' => ['bail', 'required','integer'],
            $tmCareer.'address1' => ['bail', 'required','string', 'max:255'],
            $tmCareer.'address2' => ['bail', 'required','string', 'max:255'],
            $tmCareer.'tel1' => ['bail', 'required','string', 'max:10'],
            $tmCareer.'tel2' => ['bail', 'required','string', 'max:10'],
            $tmCareer.'tel3' => ['bail', 'required','string', 'max:10'],
            $tmCareer.'owned_qualifications' => ['bail', 'nullable','string', 'max:255'],
            $tmCareer.'advisory_experience_years' => ['bail', 'required','integer'],
            $tmCareer.'other_specialized_field' => ['bail', 'nullable','string'],
            $tmCareer.'experience' => ['bail', 'required','string'],
            $tmCareer.'temporary_member_career_histories' => ['bail', 'required','array'],
            $tmCareer.'temporary_member_education_histories' => ['bail', 'required','array'],
            $tmCareer.'temporary_member_field_types' => ['bail', 'required', 'array'],
            $tmCareer.'temporary_member_owned_qualifications' => ['bail', 'nullable', 'array'],
            //temporary_member_career_histories
            $tmCareer.$tmCareerHistories.'temporary_member_career_id' => ['bail', 'nullable','integer'],
            $tmCareer.$tmCareerHistories.'find_work' => ['bail', 'required', 'date'],
            $tmCareer.$tmCareerHistories.'retirement' => ['bail', 'nullable', 'date'],
            $tmCareer.$tmCareerHistories.'office_name' => ['bail', 'required','string', 'max:255'],
            $tmCareer.$tmCareerHistories.'status' => ['bail', 'required', 'integer'],
            $tmCareer.$tmCareerHistories.'free_entry' => ['bail', 'nullable','string'],
            //temporary_member_education_histories
            $tmCareer.$tmEducationHistories.'temporary_member_career_id' => ['bail', 'nullable','integer'],
            $tmCareer.$tmEducationHistories.'admission' => ['bail', 'required', 'date'],
            $tmCareer.$tmEducationHistories.'graduation' => ['bail', 'required', 'date'],
            $tmCareer.$tmEducationHistories.'school_name' => ['bail', 'required','string', 'max:255'],
            $tmCareer.$tmFieldTypes.'field_id' => ['bail', 'required', 'integer'],
            $tmCareer.$tmFieldTypes.'type' => ['bail', 'required', 'integer'],
            $tmCareer.'temporary_member_owned_qualifications.*.other_qualification' => ['bail', 'nullable', 'string', 'max:255'],
            $tmCareer.'temporary_member_owned_qualifications.*.owned_qualification' => ['bail', 'required', 'integer'],
            $tmCareer.'certified_accountant_number' => ['bail', 'nullable','string', 'max:10'],
            $tmCareer.'us_certified_accountant_number' => ['bail','nullable' ,'string', 'max:10'],
            $tmCareer.'tax_accountant_number' => ['bail', 'nullable','integer'],
            'temporary_member_qualifications' => ['bail', 'required', 'array'],
            'temporary_member_qualifications.*' => ['bail', 'integer'],
        ];

    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        $tmCareer = 'temporary_member_career.';// : 'temporary_member_career*.';
        $tmCareerHistories = 'temporary_member_career_histories.*.';
        $tmEducationHistories = 'temporary_member_education_histories.*.';
        $tmFieldTypes = 'temporary_member_field_types.*.';
        $tmQualifications = 'temporary_member_qualifications.*.';
        return [
            //temporary_member
            'name_kanji' => '??????????????????',
            'name_furigana' => '????????????????????????',
            'email' => '?????????????????????',
            'password' => '???????????????',
            'interview_status' => '?????????????????????',
            //temporary_member_career
            $tmCareer.'temporary_member_id' => '?????????ID',
            $tmCareer.'birthdate' => '????????????',
            $tmCareer.'gender' => '??????',
            $tmCareer.'office_name' => '????????????',
            $tmCareer.'postal_code' => '????????????',
            $tmCareer.'prefecture' => '????????????',
            $tmCareer.'address1' => '????????????',
            $tmCareer.'address2' => '????????????',
            $tmCareer.'tel1' => '????????????',
            $tmCareer.'tel2' => '????????????',
            $tmCareer.'tel3' => '???????????????',
            $tmCareer.'owned_qualifications' => '????????????',
            $tmCareer.'certified_accountant_number' => '???????????????????????????',
            $tmCareer.'us_certified_accountant_number' => '?????????????????????????????????',
            $tmCareer.'tax_accountant_number' => '?????????????????????',
            $tmCareer.'advisory_experience_years' => '?????????????????????????????????',
            $tmCareer.'other_specialized_field' => '?????????????????????',
            $tmCareer.'experience' => '??????',
            $tmCareer.'temporary_member_career_histories' => '?????????????????????',
            $tmCareer.'temporary_member_education_histories' => '???????????????',
            //temporary_member_career_histories
            $tmCareer.$tmCareerHistories.'temporary_member_career_id' => '???????????????ID',
            $tmCareer.$tmCareerHistories.'find_work' => '????????????',
            $tmCareer.$tmCareerHistories.'retirement' => '????????????',
            $tmCareer.$tmCareerHistories.'office_name' => '?????????',
            $tmCareer.$tmCareerHistories.'status' => '???????????????',
            $tmCareer.$tmCareerHistories.'free_entry' => '????????????',
            //temporary_member_education_histories
            $tmCareer.$tmEducationHistories.'temporary_member_career_id' => '???????????????ID',
            $tmCareer.$tmEducationHistories.'admission' => '????????????',
            $tmCareer.$tmEducationHistories.'graduation' => '????????????',
            $tmCareer.$tmEducationHistories.'school_name' => '?????????',

            $tmCareer.$tmFieldTypes.'field_id' => '????????????ID',
            $tmCareer.$tmFieldTypes.'type' => '??????',
            //temporary_member_qualifications
            $tmQualifications.'temporary_member_id' => '?????????ID',
            $tmQualifications.'qualification' => $tmQualifications.'qualification' ? '????????????' : "",
            $tmCareer.'temporary_member_owned_qualifications.*.other_qualification' => "?????????????????????",
            $tmCareer.'temporary_member_field_types' => '????????????',
            'temporary_member_qualifications' => '????????????',
            'temporary_member_career' => '???????????????',
            'temporary_member_qualifications.*.' => '????????????????????????',
        ];
    }
}
