<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Visitor;
use App\Models\Feedback;
use App\Models\Response;
use Illuminate\Http\Request;

class SurveyResponseController extends Controller
{

    public function index()
    {
    // Ambil data responses yang berisi jawaban survei dan relasinya dengan survei dan visitor
    $responses = Response::with('survey', 'visitor')
        ->orderBy('visitor_id')
        ->orderBy('created_at') // Jika ada field created_at untuk mengurutkan berdasarkan waktu
        ->get();

    // Ambil semua indikator pertanyaan
    $indicators = Survey::orderBy('id')->pluck('indicator');

    // Grupkan respons berdasarkan visitor_id
    $groupedResponses = $responses->groupBy('visitor_id');

    return view('reports.index', compact('groupedResponses', 'indicators'));
    }

    public function viewPDF()
    {
        $mpdf = new \Mpdf\Mpdf();
        // Ambil data responses yang berisi jawaban survei dan relasinya dengan survei dan visitor
        $responses = Response::with('survey', 'visitor')
        ->orderBy('visitor_id')
        ->orderBy('created_at') // Jika ada field created_at untuk mengurutkan berdasarkan waktu
        ->get();

        // Ambil semua indikator pertanyaan
        $indicators = Survey::orderBy('id')->pluck('indicator');

        // Grupkan respons berdasarkan visitor_id
        $groupedResponses = $responses->groupBy('visitor_id');

        $mpdf->WriteHTML(view('reports.pdf', compact('groupedResponses', 'indicators')));
        $mpdf->Output();
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'education' => 'required|in:SD,SMP,SMA,D1,D2,D3,S1,S2,S3',
            'occupation' => 'required|in:PNS,TNI,POLRI,SWASTA,WIRAUSAHA,LAINNYA',
            'answers.*' => 'required|in:1,2,3,4',
        ]);

        // Simpan data pengunjung
        $visitor = Visitor::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'education' => $request->education,
            'occupation' => $request->occupation === 'LAINNYA' ? $request->other_occupation : $request->occupation,
        ]);

        // Simpan jawaban survei
        foreach ($request->answers as $survey_id => $answer) {
            Response::create([
                'visitor_id' => $visitor->id,
                'survey_id' => $survey_id,
                'answer' => $answer,
            ]);
        }

        // Simpan feedback
        if ($request->feedback) {
            Feedback::create([
                'visitor_id' => $visitor->id,
                'comment' => $request->feedback,
            ]);
        }

        // Redirect atau berikan response sesuai kebutuhan
        return redirect()->back()->with('success', 'Survey berhasil disimpan!');
    }
}
