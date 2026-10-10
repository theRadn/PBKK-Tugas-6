<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $welcomeUser = $request->query('user');

        return view('home', compact('welcomeUser'));
    }

    public function agent()
    {
        return view('fp_idea');
    }

    public function mahasiswaDetail()
    {
        $nrp = '5025241104';
        return view('mahasiswa', compact('nrp'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'nrp'     => 'required|string|max:50',
            'fp-idea' => 'required|string|max:1000',
        ]);

        return redirect()->back()->with('success_data', [
            'name' => $validated['name'],
            'nrp'  => $validated['nrp'],
            'idea' => $validated['fp-idea'],
        ]);
    }
}
