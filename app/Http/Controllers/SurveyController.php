<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $surveys = Survey::orderBy('id', 'desc')->get();

        return view('surveys.index', [
            'surveys' => $surveys,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('surveys.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $validated = $request->validate([
            'indicator' => 'required|string|max:255',
            'question' => 'required|string|max:255',
            
        ]);
 
        try {
            Survey::create($validated);
            return redirect(route('surveys.index'))->with('success', 'Pertanyaan survei berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect(route('surveys.create'))->with('error', 'Terjadi kesalahan saat menambahkan pertanyaan survei.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survey $survey): View
    {
        //
        Gate::authorize('update', $survey);
 
        return view('surveys.edit', [
            'survey' => $survey,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Survey $survey): RedirectResponse
    {
        //
        Gate::authorize('update', $survey);
 
        $validated = $request->validate([
            'indicator' => 'required|string|max:255',
            'question' => 'required|string|max:255',
        ]);
 
        $survey->update($validated);
 
        return redirect(route('surveys.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey): RedirectResponse
    {
        //
        Gate::authorize('delete', $survey);
 
        $survey->delete();
 
        return redirect(route('surveys.index'));
    }
}
