<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::paginate(15);
        return view('faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('faqs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create($data);
        return Redirect::route('faqs.index')->with('success', 'FAQ created');
    }

    public function edit(Faq $faq)
    {
        return view('faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq->update($data);
        return Redirect::route('faqs.index')->with('success', 'FAQ updated');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return Redirect::back()->with('success', 'FAQ deleted');
    }
}
