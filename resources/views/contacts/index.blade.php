@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contacts</h1>
    <form action="{{ route('contacts.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search by name or email">
        <button type="submit">Search</button>
    </form>
    <a href="{{ route('contacts.create') }}">Create New Contact</a>
    <table class="table">
        <thead>
            <tr>
                <th><a href="{{ route('contacts.index', ['sort' => 'name']) }}">Name</a></th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th><a href="{{ route('contacts.index', ['sort' => 'created_at']) }}">Created At</a></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->address }}</td>
                    <td>{{ $contact->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('contacts.show', $contact->id) }}">View</a>
                        <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $contacts->links() }}
</div>
@endsection
