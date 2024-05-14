<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\category;
use App\Models\place;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = category::select('id', 'name')->get();
        $place = place::select('id', 'name')->get();
        $book = book::all();
        return view('book.index', compact('category', 'place', 'book'));
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
        $validated = $request->validate([
            'isbn' => 'required',
            'image' => 'image|mimes:png,jpg',
            'pdf' => 'mimes:pdf'
        ]);

        $data = $request->all();

        $image = $request->file('image');
        $image->storeAs('public/book', $image->hashName());

        $pdf = $request->file('pdf');
        $pdf->storeAs('public/book/pdf', $pdf->hashName());

        $data['image'] = $image->hashName();
        $data['pdf'] = $pdf->hashName();

        book::create($data);

        // dd($data);



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = book::find($id);
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = book::findOrFail($id);
        try {
            if($request->file('image') == ''){
                $book->update();
            } else {
                Storage::disk('local')->delete('public/book/' . basename($book->image));
            
                $image = $request->file('image');
    
                $image->storeAs('public/book', $image->hashName()); 
            }

            $book->update();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = book::findOrFail($id);

        $book->delete();
        return redirect()->route('book.index');
    }
}
