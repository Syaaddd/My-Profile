<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::ordered()->get();
        return view('admin.educations.index', compact('educations'));
    }

    public function create()
    {
        return view('admin.educations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_year' => 'required|integer|min:1950|max:' . (date('Y') + 1),
            'end_year' => 'nullable|integer|min:1950|max:' . (date('Y') + 10),
            'is_graduated' => 'boolean',
        ]);

        $data = $request->all();
        $data['order'] = Education::max('order') + 1;
        $data['is_active'] = $request->boolean('is_active', true);
        $data['is_graduated'] = $request->boolean('is_graduated', true);

        Education::create($data);

        return redirect()->route('admin.educations.index')
            ->with('success', 'Pendidikan berhasil ditambahkan!');
    }

    public function edit(Education $education)
    {
        return view('admin.educations.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_year' => 'required|integer|min:1950|max:' . (date('Y') + 1),
            'end_year' => 'nullable|integer|min:1950|max:' . (date('Y') + 10),
            'is_graduated' => 'boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->boolean('is_active', true);
        $data['is_graduated'] = $request->boolean('is_graduated', true);

        $education->update($data);

        return redirect()->route('admin.educations.index')
            ->with('success', 'Pendidikan berhasil diperbarui!');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('admin.educations.index')
            ->with('success', 'Pendidikan berhasil dihapus!');
    }
}