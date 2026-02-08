<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    protected $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }

    public function index()
    {
        $projects = Project::ordered()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'technologies' => 'nullable|string',
            'project_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $data = $request->except(['image', 'gallery', 'technologies']);
        $data['order'] = Project::max('order') + 1;
        $data['is_active'] = $request->boolean('is_active', true);
        $data['is_featured'] = $request->boolean('is_featured', false);
        $data['technologies'] = $request->technologies ? array_map('trim', explode(',', $request->technologies)) : [];

        // Handle main image
        if ($request->hasFile('image')) {
            $imageResults = $this->imageUploadService->uploadImage(
                $request->file('image'),
                'projects',
                ['thumbnail' => [300, 200], 'medium' => [600, 400]]
            );
            $data['image'] = $imageResults['original'];
        }

        // Handle gallery images
        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $image) {
                $imageResults = $this->imageUploadService->uploadImage($image, 'projects/gallery');
                $gallery[] = $imageResults['original'];
            }
            $data['gallery'] = $gallery;
        }

        // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyek berhasil ditambahkan!');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug,' . $project->id,
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'technologies' => 'nullable|string',
            'project_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $data = $request->except(['image', 'gallery', 'technologies', 'remove_gallery']);
        $data['is_active'] = $request->boolean('is_active', true);
        $data['is_featured'] = $request->boolean('is_featured', false);
        $data['technologies'] = $request->technologies ? array_map('trim', explode(',', $request->technologies)) : [];

        // Handle main image
        if ($request->hasFile('image')) {
            if ($project->image) {
                $this->imageUploadService->deleteImageWithSizes($project->image, ['thumbnail', 'medium']);
            }
            $imageResults = $this->imageUploadService->uploadImage(
                $request->file('image'),
                'projects',
                ['thumbnail' => [300, 200], 'medium' => [600, 400]]
            );
            $data['image'] = $imageResults['original'];
        }

        // Handle gallery
        $gallery = $project->gallery ?? [];
        
        // Remove selected gallery images
        if ($request->remove_gallery) {
            foreach ($request->remove_gallery as $imagePath) {
                $this->imageUploadService->delete($imagePath);
                $gallery = array_diff($gallery, [$imagePath]);
            }
        }

        // Add new gallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $imageResults = $this->imageUploadService->uploadImage($image, 'projects/gallery');
                $gallery[] = $imageResults['original'];
            }
        }
        $data['gallery'] = array_values($gallery);

        // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        // Delete images
        if ($project->image) {
            $this->imageUploadService->deleteImageWithSizes($project->image, ['thumbnail', 'medium']);
        }
        
        if ($project->gallery) {
            foreach ($project->gallery as $image) {
                $this->imageUploadService->delete($image);
            }
        }

        $project->delete();
        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyek berhasil dihapus!');
    }
}