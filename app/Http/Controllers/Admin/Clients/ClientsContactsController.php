<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\ClientContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\Contacts\StoreContactRequest;
use App\Http\Requests\Clients\Contacts\UpdateContactRequest;

class ClientsContactsController extends Controller
{
    public function create(Client $client)
    {
        return view('admin.clients.contacts.create', compact('client'));
    }

    public function store(StoreContactRequest $request, Client $client)
    {
        $contact = ClientContact::updateOrCreate(['client_id' => $client->id], $request->validated());

        return redirect()->route('admin.clients.show', $client->id)->with('success','Successfully created a new client!');
    }

    public function update(UpdateContactRequest $request, Client $client)
    {
        $client->contact->update($request->validated());

        return redirect()->route('admin.clients.edit', $client->id)->with('success', 'Successfully updated client contact details');
    }

}
