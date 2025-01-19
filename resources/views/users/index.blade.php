<h1>User Management</h1>
@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->getRoleNames()->first() }}</td>
                <td>
                    <form method="POST" action="{{ route('users.assignRole', $user->id) }}">
                        @csrf
                        <select name="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}" @if($user->hasRole($role->name)) selected @endif>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit">Assign</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
