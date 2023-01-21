<?php

namespace App\Http\Controllers;

use App\Http\Requests\Researcher\StoreResearcherRequest;
use App\Http\Requests\Researcher\UpdateResearcherRequest;
use App\Http\Requests\Search\SearchRequest;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Position;
use App\Models\Researcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResearcherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researchers = Researcher::orderBy('firstname')->paginate(8);
        return view('researcher.index', compact('researchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::orderBy('name')->get();
        $departments = Department::orderBy('name')->get();
        $positions = Position::orderBy('name')->get();
        return view('researcher.create', compact('faculties', 'departments', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResearcherRequest $request)
    {
        $file = $request->file('pdf_file');
        $pdf = '';
        if (!empty($file)) {
            $pdf = time() . "-" . $request->firstname . "-" . $request->lastname . "." . $file->getClientOriginalExtension();
            $file->move('file', $pdf);
        }
        Researcher::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'faculty_id' => $request->faculty_id,
            'department_id' => $request->department_id,
            'research_title' => $request->research_title,
            'pdf_file' => $pdf,
            'old_position_id' => $request->old_position_id,
            'new_position_id' => $request->new_position_id,
            'agreement' => $request->agreement,
            'protocol' => $request->protocol,
            'scientific_research_works' => $request->scientific_research_works,
            'proposal_determine_topic' => $request->proposal_determine_topic
        ]);
        return redirect()->route('researcher.index')->with('swal-success', 'تحقیق کننده جدید با موفقیت اضافه شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $researcher = Researcher::FindOrFail($id);
        $faculties = Faculty::orderBy('name')->get();
        $departments = Department::orderBy('name')->get();
        $positions = Position::orderBy('name')->get();
        return view('researcher.edit', compact('researcher', 'faculties', 'departments', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResearcherRequest $request, $id)
    {
        $researcher = Researcher::FindOrFail($id);
        $file = $request->file('pdf_file');
        $pdf = '';

        if (!empty($file)) {
            if (file_exists('file/' . $researcher->pdf_file)) {
                unlink('file/' . $researcher->pdf_file);
            }
            $pdf = time() . "-" . $request->firstname . "-" . $request->lastname . "." . $file->getClientOriginalExtension();
            $file->move('file', $pdf);
        } else {
            $pdf = $researcher->pdf_file;
        }

        $researcher->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'faculty_id' => $request->faculty_id,
            'department_id' => $request->department_id,
            'research_title' => $request->research_title,
            'pdf_file' => $pdf,
            'old_position_id' => $request->old_position_id,
            'new_position_id' => $request->new_position_id,
            'agreement' => $request->agreement,
            'protocol' => $request->protocol,
            'scientific_research_works' => $request->scientific_research_works,
            'proposal_determine_topic' => $request->proposal_determine_topic
        ]);
        return redirect()->route('researcher.index')->with('swal-success', 'تحقیق کننده جدید با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $researcher = Researcher::FindOrFail($id);
        $researcher->delete($id);
        return redirect()->route('researcher.index')->with('swal-success', 'تحقیق کننده با موفقیت حذف شد');
    }


    public function getDepartment(Faculty $faculty)
    {
        $departments = $faculty->departments;
        if ($departments != null) {
            return response()->json(['status' => true, 'departments' => $departments]);
        } else {
            return response()->json(['status' => false, 'departments' => null]);
        }
    }


    public function search(SearchRequest $request)
    {
        $search = $request->research_title;
        $researchers = Researcher::where('research_title', $search)->paginate(8);
        return view('researcher.index', compact('researchers'));
    }
}
