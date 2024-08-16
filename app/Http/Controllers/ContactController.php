<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function index(Request $request)
    {
        $contacts = Contact::query()
            ->when($request->input('search'), function($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy($request->input('sort', 'name'), 'asc')
            ->paginate(10);

        return view('contacts.index', compact('contacts'));
    }

    
    public function create()
    {
        return view('contacts.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}

