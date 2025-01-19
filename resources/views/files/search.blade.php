@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Search Files</h2>

    <form method="GET" action="{{ route('files.search') }}">
        <div class="input-group mb-3">
            <input type="text" name="keyword" class="form-control" placeholder="Search by keyword, tag, or unique ID" aria-label="Search" aria-describedby="search-button">
            <button class="btn btn-outline-secondary" type="submit" id="search-button"><i class="fas fa-search"></i></button>
        </div>
    </form>

    @if(isset($files))
        <h3 class="mt-4">Search Results</h3>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>File Name</th>
                    <th>Unique ID</th>
                    <th>Tags</th>
                    <th>Time Stamp</th>
                    <th>Assigned To</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                <tr>
                    <td>{{ $file->file_name }}</td>
                    <td>{{ $file->unique_id }}</td>
                    <td>{{ $file->tags }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $file->file_path) }}" class="btn btn-info btn-sm">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

