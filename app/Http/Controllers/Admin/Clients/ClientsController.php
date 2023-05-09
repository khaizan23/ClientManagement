<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Clients\StoreClientRequest;
use App\Http\Requests\Clients\UpdateClientRequest;
use App\Http\Requests\Clients\UpdateProfileImageRequest;

class ClientsController extends Controller
{
    //show table data

    public function index()
    {
        return view('admin.clients.index', ['clients' => Client::latest()-> paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $client = Client::create($request ->only('name', 'email'));

        if ($request->hasFile('profile_image')) {
            $path = $request->profile_image->store('public/clients/profiles/images');
            $client->update(['profile_image' => $path]);
        }
        return redirect()->route('admin.clients.contacts.create', $client->id)->with('success', 'Successfully Created a new Client!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return $client->load('contact');
    }
    
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->validated());

        return back()->with('success', 'Successfully updated client details');
    }

    

    public function updateProfileImage(UpdateProfileImageRequest $request, Client $client)
    {
        if ($client->profile_image) {
        Storage::delete($client->profile_image);
    }
        $path = $request->image->store('public/clients/profiles/images');

        $client->update(['profile_image' => $path]);
        return back()->with('success', 'Successfully updated profile image');
    }



    
    public function destroyProfileImage(Client $client)
    {
        if ($client->profile_image) {
            Storage::delete($client->profile_image);

            $client->update(['profile_image' => null]);
        }
        return back()->with('success', 'Successfully deleted profile image!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        if ($client->profile_image) {
            Storage::delete($client->profile_image);
        }

        $client->delete();

        return redirect()->route('admin.clients.dashboard')->with('success', 'Successfully deleted client and all assets related to them.');
    }
}
