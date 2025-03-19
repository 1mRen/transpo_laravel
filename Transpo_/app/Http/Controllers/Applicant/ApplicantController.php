<?php

namespace App\Http\Controllers\Applicant;

use App\Models\Applicant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the applicants.
     */
    public function index()
    {
        $applicants = Applicant::all();

        return Inertia::render('Applicants/Index', [
            'applicants' => $applicants
        ]);
    }

    /**
     * Show the form for creating a new applicant.
     */
    public function create()
{
    return Inertia::render('Applicants/Create');
}


    /**
     * Store a newly created applicant in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'organization_department' => 'required|string|max:255',
            'position' => 'required|string|max:100',
            'contact_no' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:applicant,email',
            'user_id' => 'nullable|exists:users,id',
        ]);

        // Include created_at and updated_at manually
        $validated['created_at'] = now();
        $validated['user_id'] = Auth::id();

        Applicant::create($validated);

        return redirect()->route('applicants.index')->with('success', 'Applicant created successfully');
    }

    /**
     * Display the specified applicant.
     */
    public function show(Applicant $applicant)
    {
        return Inertia::render('Applicants/Show', [
            'applicant' => $applicant
        ]);
    }

    /**
     * Show the form for editing the applicant.
     */
    public function edit(Applicant $applicant)
    {
        return Inertia::render('Applicants/Edit', [
            'applicant' => $applicant
        ]);
    }

    /**
     * Update the specified applicant in storage.
     */
    /**
 * Update the specified applicant in storage.
 */
    public function update(Request $request, Applicant $applicant)
    {
        
        $validated = $request->validate([
            'full_name' => 'string|max:255',
            'organization_department' => 'string|max:255',
            'position' => 'string|max:100',
            'contact_no' => 'string|max:20',
            'email' => 'email|max:255|unique:applicant,email,' . $applicant->applicant_id . ',applicant_id',
        ]);

        // Update timestamp explicitly
        $validated['updated_at'] = now();
        
        $applicant->update($validated);

        return redirect()->route('applicants.index')->with('success', 'Applicant updated successfully');
    }


    /**
     * Remove the specified applicant from storage.
     */
    public function destroy(Applicant $applicant)
    {
        $applicant->delete();

        return redirect()->route('applicants.index')->with('success', 'Applicant deleted successfully');
    }
}
