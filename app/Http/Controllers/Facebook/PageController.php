<?php

namespace App\Http\Controllers\Facebook;

use App\Http\Controllers\Controller;
use App\Models\FacebookPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    public function index()
    {
        $pages = FacebookPage::where('business_id', Auth::user()->business_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('facebook.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('facebook.pages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'page_id' => 'required|string|max:255|unique:facebook_pages,page_id',
            'name' => 'required|string|max:255',
            'access_token' => 'required|string',
            'subscribed' => 'nullable|boolean',
        ]);

        $data['business_id'] = Auth::user()->business_id;
        $data['subscribed'] = $request->boolean('subscribed');

        FacebookPage::create($data);

        return Redirect::route('pages.index')->with('success', 'Facebook page connected successfully.');
    }

    public function edit(FacebookPage $page)
    {
        abort_if($page->business_id !== Auth::user()->business_id, 403);

        return view('facebook.pages.edit', compact('page'));
    }

    public function update(Request $request, FacebookPage $page)
    {
        abort_if($page->business_id !== Auth::user()->business_id, 403);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'access_token' => 'nullable|string',
            'subscribed' => 'nullable|boolean',
        ]);

        if ($request->filled('access_token')) {
            $data['access_token'] = $request->input('access_token');
        }

        $data['subscribed'] = $request->boolean('subscribed');

        $page->update($data);

        return Redirect::route('pages.index')->with('success', 'Facebook page updated successfully.');
    }

    public function destroy(FacebookPage $page)
    {
        abort_if($page->business_id !== Auth::user()->business_id, 403);

        $page->delete();

        return Redirect::route('pages.index')->with('success', 'Facebook page removed.');
    }
}
