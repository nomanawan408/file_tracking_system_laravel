<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\FileHistory;

class FileController extends Controller
{
    
    public function index()
    {
        $newFiles = File::where('created_at', '>=', now()->subDays(7))
        ->orderBy('created_at', 'desc')
        ->get();
        // Pass the data to the view
        
        $files = File::all();

        return view('files.index', compact('files'));
        }

    
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function create()
    {
        return view('files.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'priority' => 'required|in:low,medium,high',
            'type' => 'required|string|max:255',
            'file' => 'nullable|file|max:2048', // Limit file size to 2MB
        ]);

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads/files', 'public');
        }

        // Create the file record
        $file  = File::create([
            'file_name' => $request->file_name,
            'unique_id' => strtoupper(Str::random(4)) . rand(10, 99),
            'department' => $request->department,
            'priority' => $request->priority,
            'type' => $request->type,
            'status' => 'pending',
            'file_path' => $filePath,
            'user_id' => auth()->id(),
        ]);

        FileHistory::create([
            'file_id' => $file->id,
            'user_id' => auth()->id(),
            'action' => 'created',
        ]);

        return redirect()->route('files.create')->with('success', 'File registered successfully!');
    }
    public function changeStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,in_review,approved',
        ]);

        $file = File::findOrFail($id);
        $file->update(['status' => $request->status]);

        FileHistory::create([
            'file_id' => $file->id,
            'user_id' => auth()->id(),
            'action' => "status changed to {$request->status}",
        ]);

        return redirect()->back()->with('success', 'File status updated successfully!');
    }

    public function search(Request $request)
    {
        $query = File::query();

        if ($request->filled('keyword')) {
            $query->where('file_name', 'like', "%{$request->keyword}%")
                ->orWhere('tags', 'like', "%{$request->keyword}%")
                ->orWhere('unique_id', 'like', "%{$request->keyword}%");
        }

        $files = $query->get();

        return view('files.search', compact('files'));
    }

    
    public function show($id)
    {
        $file = File::with('histories.user')->findOrFail($id);
    
        return view('files.show', compact('file'));
    }
    

    public function destroy($id)
    {
        $file = File::findOrFail($id);

        // Delete the file from storage, if exists
        if ($file->file_path && \Storage::exists('public/' . $file->file_path)) {
            \Storage::delete('public/' . $file->file_path);
        }

        // Delete the file record from the database
        $file->delete();

        return redirect()->back()->with('success', 'File deleted successfully!');
    }
        
        
}
