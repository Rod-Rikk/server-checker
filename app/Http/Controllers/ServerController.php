<?php

namespace App\Http\Controllers;

use App\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $servers = Server::all();
        return view('servers.index', compact('servers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validatedData = $request->validate([
            'name' => ['required', 'min:3'],
            'ip_address' => ['required', 'min:8'],

        ]);
        // dd($validatedData);
        $server = new Server();
        $server->name = $validatedData['name'];
        $server->url = $request->url;
        $server->ip_address = $validatedData['ip_address'];
        $server->save();

        return redirect('/servers')->with('success', 'Server created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $server = Server::findOrFail($id);
        return view('servers.show', compact('server'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $server = Server::findOrFail($id);
        return view('servers.edit', compact('server'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Server $server)
    {
        //
        $validatedData = $request->validate([
            'name' => ['required', 'min:3'],
            'ip_address' => ['required', 'min:8'],
        ]);

        $server->name = $validatedData['name'];
        $server->url = $request->url;
        $server->ip_address = $validatedData['ip_address'];

        $server->update();

        return redirect('/servers')->with('success', 'Server updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function destroy(Server $server)
    {
        //
        $server->delete();

        return redirect('/servers')->with('success', 'Server deleted successfully');
    }
}
