<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Lang;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('dashboard.page.manage-jobs', compact('jobs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar'     => 'required|min:5|max:100|string',
            'name_en'     => 'required|min:5|max:100|string',
            'desc_ar'     => 'required|min:5|string',
            'desc_en'     => 'required|min:5|string',
        ]);


        Job::create([
            'name' => [
                'ar' => $request->input('name_ar'),
                'en' => $request->input('name_en')
            ],
            'desc' => [
                'ar' => $request->input('desc_ar'),
                'en' => $request->input('desc_en')
            ]
        ]);

        return redirect()->back()->with('success', \Lang::get('messages.stored_message'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar'     => 'required|min:5|max:100|string',
            'name_en'     => 'required|min:5|max:100|string',
            'desc_ar'     => 'required|min:5|string',
            'desc_en'     => 'required|min:5|string',
        ]);

        $job = Job::find($id);

        if ($job)
        {
            $job->name = [
                'ar' => $request->input('name_ar'),
                'en' => $request->input('name_en')
            ];

            $job->desc = [
                'ar' => $request->input('desc_ar'),
                'en' => $request->input('desc_en')
            ];

            $job->update();
            return redirect()->back()->with('success', \Lang::get('messages.updated_message'));
        }
        return redirect()->back()->with('danger', \Lang::get('messages.not_found'));
    }

    public function destroy($id)
    {
        $job = Job::find($id);
        if ($job) {
            $job->delete();
            return redirect()->back()->with('success',  Lang::get('messages.deleted_message'));
        }
        return redirect()->back()->with('danger',  Lang::get('messages.not_found'));
    }

    public function activate($id)
    {
        $job = Job::find($id);

        if($job) {
            $job->update(['is_active' => !$job->is_active]);
            return redirect()->back()->with('success',  Lang::get('messages.updated_message'));
        }
        redirect()->back()->with('danger',  Lang::get('messages.not_found'));
    }
}
