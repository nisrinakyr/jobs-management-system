<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display jobs on the home page with optional search/sort + pagination.
     *
     * Accepts query params:
     *  - q:     string search across title, location, employment_type, experience_level
     *  - sort:  one of [recent, title, location] (default: recent)
     */
    public function index(Request $request)
    {
        $search = trim((string) $request->get('q', ''));
        $sort   = (string) $request->get('sort', '');

        $query = Job::query();

        // Search filter
        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('employment_type', 'like', "%{$search}%")
                  ->orWhere('experience_level', 'like', "%{$search}%");
                // add more fields (e.g., description) if you want:
                // ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Sort allow-list
        $sort = in_array($sort, ['recent', 'title', 'location'], true) ? $sort : 'recent';

        switch ($sort) {
            case 'title':
                $query->orderBy('title', 'asc');
                break;
            case 'location':
                $query->orderBy('location', 'asc')->orderBy('title', 'asc');
                break;
            case 'recent':
            default:
                // newest first (created_at desc)
                $query->latest();
                break;
        }

        // Paginate (12 per page) and keep current query string for links
        $jobs = $query->paginate(9)->appends($request->query());

        return view('home', compact('jobs'));
    }

    /**
     * Show the form to create a new job.
     */
    public function create()
    {
        return view('add_job');
    }

    /**
     * Store a new job in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'nullable|string',
            'location'         => 'required|string|max:255',
            'work_mode'        => 'required|in:on-site,hybrid,remote',
            'currency'         => 'required|in:IDR,USD,SGD,EUR',
            'salary'           => 'nullable|numeric',
            'employment_type'  => 'required|in:full-time,part-time,contract,freelance',
            'experience_level' => 'nullable|string|max:100',
        ]);

        Job::create($validated);

        return redirect()
            ->route('jobs.create')
            ->with('success', 'Job added successfully!');
    }

    /**
     * Show the form for editing an existing job.
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('edit_job', compact('job'));
    }

    /**
     * Update an existing job in the database.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'nullable|string',
            'location'         => 'required|string|max:255',
            'salary'           => 'nullable|numeric',
            'employment_type'  => 'required|in:full-time,part-time,contract,freelance',
            'experience_level' => 'nullable|string|max:100',
        ]);

        $job = Job::findOrFail($id);
        $job->update($validated);

        return redirect()
            ->route('home')
            ->with('success', 'Job updated successfully!');
    }

    /**
     * Delete a job from the database.
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()
            ->route('home')
            ->with('success', 'Job deleted successfully!');
    }

    /**
     * Show a single job.
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('job_show', compact('job'));
    }

    public function toggleBookmark($id)
    {
        $job = \App\Models\Job::findOrFail($id);

        // Fungsi toggle ini otomatis nambahin data kalau belum dibookmark,
        // dan otomatis ngehapus kalau sebelumnya udah dibookmark
        auth()->user()->bookmarkedJobs()->toggle($job->id);

        return back();
    }
}
