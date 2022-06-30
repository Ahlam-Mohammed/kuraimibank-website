<?php

namespace App\Http\Controllers\dashboard;

use App\Enum\SettingEnum;
use App\Http\Controllers\Controller;
use App\Models\FinancialReport;
use App\Traits\Uploads;
use Illuminate\Http\Request;
use Lang;

class ReportController extends Controller
{
    use Uploads;

    function __construct()
    {
        $this->middleware('Permissions:report-list', ['only' => ['index']]);
        $this->middleware('Permissions:report-create', ['only' => ['store']]);
        $this->middleware('Permissions:report-edit', ['only' => [ 'update']]);
        $this->middleware('Permissions:report-delete', ['only' => ['destroy', 'activate']]);
    }

    public function index()
    {
        $reports = FinancialReport::all();
        return view('dashboard.page.manage-financial-reports', compact('reports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar'     => 'required|min:5|max:100|string',
            'name_en'     => 'required|min:5|max:100|string',
            'file'        => 'required',
        ]);

        $fileName = $this->storeImage($request->file('file'), SettingEnum::PATH_REPORT_IMAGE);

        if ($fileName) {
            FinancialReport::create([
                'name' => [
                    'ar' => $request->input('name_ar'),
                    'en' => $request->input('name_en')
                ],
                'file' => $fileName,
            ]);
        }

        return redirect()->back()->with('success', \Lang::get('messages.stored_message'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar'     => 'required|min:5|max:100|string',
            'name_en'     => 'required|min:5|max:100|string',
        ]);

        $report = FinancialReport::find($id);

        if ($report)
        {
            $fileOldName = $report->file;

            if ($request->file('file')) {
                $fileName = $this->updateImage($request->file('file'),
                    SettingEnum::PATH_PARTNER_IMAGE, $fileOldName);
            } else {
                $fileName = $fileOldName;
            }

            $report->name = [
                'ar' => $request->input('name_ar'),
                'en' => $request->input('name_en')
            ];

            $report->file = $fileName;

            $report->update();
            return redirect()->back()->with('success', \Lang::get('messages.updated_message'));
        }
        return redirect()->back()->with('danger', \Lang::get('messages.not_found'));
    }

    public function destroy($id)
    {
        $report = FinancialReport::find($id);
        if ($report)
        {
            $file = $report->file;
            $this->deleteImage($file);
            $report->delete();

            return redirect()->back()->with('success',  Lang::get('messages.deleted_message'));
        }
        return redirect()->back()->with('danger',  Lang::get('messages.not_found'));
    }

    public function activate($id)
    {
        $report = FinancialReport::find($id);

        if($report) {
            $report->update(['is_active' => !$report->is_active]);
            return redirect()->back()->with('success',  Lang::get('messages.updated_message'));
        }
        redirect()->back()->with('danger',  Lang::get('messages.not_found'));
    }

}
