<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('schools.index', compact('schools'));
    }

    public function create()
    {
        return view('schools.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'school_registration_number' => 'required|string|max:255|unique:schools',
            'email' => 'required|email|max:255',
            'representative_name' => 'required|string|max:255',
        ]);

        School::create($request->all());

        return redirect()->route('schools.index')->with('success', 'School added successfully.');
    }

    public function edit(School $school)
    {
        return view('schools.edit', compact('school'));
    }

    public function update(Request $request, School $school)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'school_registration_number' => 'required|string|max:255|unique:schools,school_registration_number,' . $school->id,
            'email' => 'required|email|max:255',
            'representative_name' => 'required|string|max:255',
        ]);

        $school->update($request->all());

        return redirect()->route('schools.index')->with('success', 'School updated successfully.');
    }

    public function destroy(School $school)
    {
        $school->delete();
        return redirect()->route('schools.index')->with('success', 'School deleted successfully.');
    }
}