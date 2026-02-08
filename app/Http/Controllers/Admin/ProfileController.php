<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    public function edit()
    {
        $profile = Profile::first() ?? new Profile();
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'github_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'website_url' => 'nullable|url|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv' => 'nullable|mimes:pdf|max:5120',
        ]);

        $profile = Profile::first();
        
        if (!$profile) {
            $profile = new Profile();
        }

        $data = $request->except(['avatar', 'cv']);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            if ($profile->avatar_path) {
                $this->fileUploadService->delete($profile->avatar_path);
            }
            $data['avatar_path'] = $this->fileUploadService->upload(
                $request->file('avatar'),
                'profiles'
            );
        }

        // Handle CV upload
        if ($request->hasFile('cv')) {
            if ($profile->cv_path) {
                $this->fileUploadService->delete($profile->cv_path);
            }
            $data['cv_path'] = $this->fileUploadService->upload(
                $request->file('cv'),
                'cv'
            );
        }

        $profile->fill($data);
        $profile->save();

        return redirect()->route('admin.profile.edit')
            ->with('success', 'Profil berhasil diperbarui!');
    }
}