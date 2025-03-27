<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
     // Get all contacts
     public function index()
     {
         return response()->json(Contact::all(), 200);
     }
 
     // Store a new contact
     public function store(Request $request)
     {
         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'phone' => 'required|string|unique:contacts,phone',
             'email' => 'nullable|email',
         ]);
 
         $contact = Contact::create($validated);
 
         return response()->json($contact, 201);
     }
 
     // Get a single contact
     public function show($id)
     {
         $contact = Contact::find($id);
 
         if (!$contact) {
             return response()->json(['message' => 'Contact not found'], 404);
         }
 
         return response()->json($contact, 200);
     }
 
     // Update a contact
     public function update(Request $request, $id)
     {
         $contact = Contact::find($id);
 
         if (!$contact) {
             return response()->json(['message' => 'Contact not found'], 404);
         }
 
         $validated = $request->validate([
             'name' => 'sometimes|required|string|max:255',
             'phone' => 'sometimes|required|string|unique:contacts,phone,' . $id,
             'email' => 'nullable|email',
         ]);
 
         $contact->update($validated);
 
         return response()->json($contact, 200);
     }
 
     // Delete a contact
     public function destroy($id)
     {
         $contact = Contact::find($id);
 
         if (!$contact) {
             return response()->json(['message' => 'Contact not found'], 404);
         }
 
         $contact->delete();
 
         return response()->json(['message' => 'Contact deleted'], 200);
     }
}
