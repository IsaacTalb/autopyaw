<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class PolicyController extends Controller
{
    public function index()
    {
        $policies = Policy::paginate(15);
        return view('policies.index', compact('policies'));
    }

    public function create()
    {
        return view('policies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Policy::create($data);
        return Redirect::route('policies.index')->with('success', 'Policy created');
    }

    public function edit(Policy $policy)
    {
        return view('policies.edit', compact('policy'));
    }

    public function update(Request $request, Policy $policy)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $policy->update($data);
        return Redirect::route('policies.index')->with('success', 'Policy updated');
    }

    public function destroy(Policy $policy)
    {
        $policy->delete();
        return Redirect::back()->with('success', 'Policy deleted');
    }
}
