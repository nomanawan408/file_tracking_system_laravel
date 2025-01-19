@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Register a New File</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('files.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="file_name" class="form-label">File Name</label>
                            <input type="text" name="file_name" id="file_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <select name="department" id="department" class="form-select" required>
                                <option value="">-- Select Department --</option>
                                <option value="IT">IT</option>
                                <option value="HR">HR</option>
                                <option value="Finance">Finance</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="priority" class="form-label">Priority</label>
                            <select name="priority" id="priority" class="form-select" required>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">File Type</label>
                            <select name="type" id="type" class="form-select" required>
                                <option value="">-- Select File Type --</option>
                                <option value="doc">.doc</option>
                                <option value="docx">.docx</option>
                                <option value="pdf">.pdf</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="file">Upload File</label>
                            <input type="file" name="file" id="file" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Register File</button>
                    </form>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection

