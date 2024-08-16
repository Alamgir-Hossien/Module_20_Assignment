@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Contact</h1>
    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Phone:</label>
            <input type="text" name="phone">
        </div>
        <div>
            <label>Address:</label>
            <input type="text" name="address">
        </div>
        <button type="submit">Save</button>
    </form>
</div>
@endsection
