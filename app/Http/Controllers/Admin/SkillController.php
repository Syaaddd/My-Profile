<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::ordered()->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'proficiency' => 'required|integer|min:1|max:100',
            'category' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $data['order'] = Skill::max('order') + 1;
        $data['is_active'] = $request->boolean('is_active', true);

        Skill::create($data);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill berhasil ditambahkan!');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'proficiency' => 'required|integer|min:1|max:100',
            'category' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->boolean('is_active', true);

        $skill->update($data);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill berhasil diperbarui!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill berhasil dihapus!');
    }

    public function reorder(Request $request)
    {
        $request->validate(['skills' => 'required|array']);
        
        foreach ($request->skills as $index => $skillId) {
            Skill::where('id', $skillId)->update(['order' => $index + 1]);
        }

        return response()->json(['success' => true]);
    }
}