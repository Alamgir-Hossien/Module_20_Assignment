@extends('layouts.app')

@section('content')
<div class="container">
    <h1>View Contact</h1>
    <div>
        <label>Name:</label>
        <p>{{ $contact->name }}</p>
    </div>
    <div>
        <label>Email:</label>
        <p>{{ $contact->email }}</p>
    </div>
    <div>
        <label>Phone:</label>
        <p>{{ $contact->phone }}</p>
    </div>
    <div>
        <label>Address:</label>
        <p>{{ $contact->address }}</p>
    </div>
    <div>
        <label>
