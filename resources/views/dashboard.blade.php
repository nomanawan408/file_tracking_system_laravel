@extends('layouts.app')

@section('content')
    
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h5>Total Files</h5>
                    <h3>{{ \App\Models\File::all()->count() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h5>Files in Review</h5>
                    <h3>{{ \App\Models\File::where('status', 'In Review')->get()->count() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    <h5>Files Pending</h5>
                    <h3>{{ \App\Models\File::where('status', 'Pending')->get()->count() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h5>Files Approved</h5>
                    <h3>{{ \App\Models\File::where('status', 'Approved')->get()->count() }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Past 7 Days Files Summery
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Priority</th>
                        <th>Type</th>
                        <th>Created At</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Priority</th>
                        <th>Type</th>
                        <th>Created At</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($newFiles as $file)
                        <tr>
                            <td>{{ $file->file_name }}</td>
                            <td>{{ $file->department }}</td>
                            <td>{{ $file->priority }}</td>
                            <td>{{ $file->type }}</td>
                            <td>{{ $file->created_at }}</td>
                            <td>{{ $file->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection