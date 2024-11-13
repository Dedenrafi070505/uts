<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return response()->json(News::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'author' => 'required|string|max:100',
        ]);

        $news = News::create($validated);
        return response()->json($news, 201);
    }

    public function show($id)
    {
        $news = News::find($id);
        if (!$news) return response()->json(['message' => 'Berita tidak ditemukan'], 404);
        return response()->json($news, 200);
    }

    public function update(Request $request, $id)
    {
        $news = News::find($id);
        if (!$news) return response()->json(['message' => 'Berita tidak ditemukan'], 404);

        $validated = $request->validate([
            'title' => 'string|max:255',
            'content' => 'string',
            'author' => 'string|max:100',
        ]);

        $news->update($validated);
        return response()->json($news, 200);
    }

    public function destroy($id)
    {
        $news = News::find($id);
        if (!$news) return response()->json(['message' => 'Berita tidak ditemukan'], 404);

        $news->delete();
        return response()->json(['message' => 'Berita berhasil dihapus'], 200);
    }
}


