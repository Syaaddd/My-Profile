<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_projects' => Project::count(),
            'active_projects' => Project::where('is_active', true)->count(),
            'total_skills' => Skill::count(),
            'unread_messages' => Contact::where('is_read', false)->count(),
            'total_messages' => Contact::count(),
        ];

        $recent_messages = Contact::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_messages'));
    }
}