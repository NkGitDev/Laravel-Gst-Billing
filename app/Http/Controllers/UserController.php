<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view('user-profile/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id); // Find the user by ID
        dd($user);
        return view('home', compact('user')); // Pass the user data to the view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        // Find the user by ID
        $user = User::findOrFail($id); // Use findOrFail to handle cases where the user is not found
        //dd($user);

        // Optionally, you can check if the authenticated user is trying to edit their own profile
        if (Auth::id() !== (int)$id) {
            return redirect()->route('user-profile.index')->with('error', 'Unauthorized access.');
        }

        return view('user-profile.edit', compact('user')); // Return the edit view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'mobile_number' => 'nullable|string|max:15',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
            'state' => 'nullable|string',
            'country' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload if a photo is provided
        if ($request->hasFile('photo')) {
            $filePath = $request->file('photo')->store('profile_photos', 'public');
            $validatedData['photo'] = $filePath; // Store the file path in the validated data
        }

        // Update the user with the validated data
        $user->update($validatedData);

        return redirect()->route('home')->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
