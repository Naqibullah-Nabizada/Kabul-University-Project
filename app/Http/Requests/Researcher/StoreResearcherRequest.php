<?php

namespace App\Http\Requests\Researcher;

use Illuminate\Foundation\Http\FormRequest;

class StoreResearcherRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => ['required', 'string', 'min:3'],
            'lastname' => ['required', 'string', 'min:3'],
            'faculty_id' => ['required', 'exists:faculties,id'],
            'department_id' => ['required', 'exists:departments,id'],
            'research_title' => ['required', 'string', 'min:3'],
            'pdf_file' => ['required'],
            'old_position_id' => ['required', 'exists:positions,id'],
            'new_position_id' => ['required', 'exists:positions,id'],
            'agreement' => ['required'],
            'protocol' => ['required'],
            'scientific_research_works' => ['required', 'string', 'min:3'],
            'proposal_determine_topic' => ['required', 'string', 'min:3'],
        ];
    }
}
