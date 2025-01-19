@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            All New Files
            <a href="{{ route('files.create') }}" class="btn btn-primary float-end">Add File</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Unique ID</th>
                        <th>File Name</th>
                        <th>Department</th>
                        <th>Priority</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Download</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Unique ID</th>
                        <th>File Name</th>
                        <th>Department</th>
                        <th>Priority</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Download</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($files as $file)
                    <tr>
                        <td><i><b>#{{ $file->unique_id }}</b></i></td>
                        <td>{{ $file->file_name }}</td>
                        <td>{{ $file->department }}</td>
                        <td>{{ $file->priority }}</td>
                        <td>{{ $file->type }}</td>
                        <td>{{ ucfirst($file->status) }}</td>
                        <td>
                            @if ($file->file_path)
                                <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank">Download</a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <form method="POST" action="{{ route('files.changeStatus', $file->id) }}" style="display: inline-block;">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select" onchange="this.form.submit()">
                                    <option value="pending" @if ($file->status == 'pending') selected @endif>Pending</option>
                                    <option value="in_review" @if ($file->status == 'in_review') selected @endif>In Review</option>
                                    <option value="approved" @if ($file->status == 'approved') selected @endif>Approved</option>
                                </select>
                            </form>
                        
                            <form method="POST" action="{{ route('files.destroy', $file->id) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this file?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

