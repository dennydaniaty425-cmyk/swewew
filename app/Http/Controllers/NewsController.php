<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('order')->get();

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'media' => 'required|file',
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'description' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $file = $request->file('media');
        $mediaType = $this->resolveMediaType($file);
        $mediaPath = $this->storeMedia($file);
        $gallery = $this->storeGalleryFiles($request);

        News::create([
            'media_type' => $mediaType,
            'media_url' => $mediaPath,
            'gallery' => $gallery,
            'description' => $validated['description'],
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function show(News $news)
    {
        return view('apotek.news-detail', compact('news'));
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'media' => 'nullable|file',
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'description' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $mediaPath = $news->media_url;
        $mediaType = $news->media_type;
        $gallery = $news->gallery ?? [];

        if ($request->hasFile('media')) {
            if ($news->media_url && file_exists(storage_path($news->media_url))) {
                unlink(storage_path($news->media_url));
            }

            $file = $request->file('media');
            $mediaType = $this->resolveMediaType($file);
            $mediaPath = $this->storeMedia($file);
        }

        $newGallery = $this->storeGalleryFiles($request);
        if (! empty($newGallery)) {
            $gallery = $newGallery;
        }

        $news->update([
            'media_type' => $mediaType,
            'media_url' => $mediaPath,
            'gallery' => $gallery,
            'description' => $validated['description'],
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(News $news)
    {
        if ($news->media_url && file_exists(storage_path($news->media_url))) {
            unlink(storage_path($news->media_url));
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus');
    }

    protected function resolveMediaType($file): string
    {
        $extension = strtolower($file->getClientOriginalExtension());

        return in_array($extension, ['mp4', 'webm', 'ogg', 'mov'], true) ? 'video' : 'image';
    }

    protected function storeMedia($file): string
    {
        $directory = storage_path('news');

        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }

        $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return 'news/'.$filename;
    }

    protected function storeGalleryFiles(Request $request): array
    {
        if (! $request->hasFile('gallery')) {
            return [];
        }

        $stored = [];
        $directory = storage_path('news');

        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }

        foreach ($request->file('gallery') as $file) {
            if (! $file || ! $file->isValid()) {
                continue;
            }

            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($directory, $filename);
            $stored[] = 'news/'.$filename;
        }

        return $stored;
    }
}
