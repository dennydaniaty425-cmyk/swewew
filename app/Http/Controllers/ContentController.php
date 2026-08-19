<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::orderBy('order')->get();

        return view('admin.content.index', compact('contents'));
    }

    public function create()
    {
        return view('admin.content.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'media_type' => 'required|in:video,carousel',
            'video' => 'nullable|file|mimetypes:video/mp4,video/webm,video/ogg',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'description' => 'nullable|string|max:1000',
            'carousel_count' => 'nullable|integer|min:1|max:10',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $mediaType = $validated['media_type'];
        $mediaUrl = null;
        $gallery = [];

        if ($mediaType === 'video' && $request->hasFile('video')) {
            $mediaUrl = $this->storeMedia($request->file('video'), 'content-video');
        }

        if ($mediaType === 'carousel' && $request->hasFile('images')) {
            $gallery = $this->storeGallery($request->file('images'));
            $mediaUrl = $gallery[0] ?? null;
        }

        Content::create([
            'media_type' => $mediaType,
            'media_url' => $mediaUrl,
            'gallery' => $gallery,
            'description' => $validated['description'] ?? null,
            'carousel_count' => $validated['carousel_count'] ?? 3,
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.content.index')->with('success', 'Konten berhasil ditambahkan');
    }

    public function show(Content $content)
    {
        return view('apotek.news-detail', ['news' => $content]);
    }

    public function edit(Content $content)
    {
        return view('admin.content.edit', compact('content'));
    }

    public function update(Request $request, Content $content)
    {
        $validated = $request->validate([
            'media_type' => 'required|in:video,carousel',
            'video' => 'nullable|file|mimetypes:video/mp4,video/webm,video/ogg',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'description' => 'nullable|string|max:1000',
            'carousel_count' => 'nullable|integer|min:1|max:10',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $mediaType = $validated['media_type'];
        $mediaUrl = $content->media_url;
        $gallery = $content->gallery ?? [];

        if ($mediaType === 'video' && $request->hasFile('video')) {
            if ($content->media_url && File::exists(storage_path($content->media_url))) {
                File::delete(storage_path($content->media_url));
            }
            $mediaUrl = $this->storeMedia($request->file('video'), 'news');
            $gallery = [];
        }

        if ($mediaType === 'carousel' && $request->hasFile('images')) {
            $gallery = $this->storeGallery($request->file('images'));
            $mediaUrl = $gallery[0] ?? $content->media_url;
        }

        $content->update([
            'media_type' => $mediaType,
            'media_url' => $mediaUrl,
            'gallery' => $gallery,
            'description' => $validated['description'] ?? null,
            'carousel_count' => $validated['carousel_count'] ?? 3,
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.content.index')->with('success', 'Konten berhasil diperbarui');
    }

    public function destroy(Content $content)
    {
        if ($content->media_url && File::exists(storage_path($content->media_url))) {
            File::delete(storage_path($content->media_url));
        }

        foreach ($content->gallery ?? [] as $image) {
            if (File::exists(storage_path($image))) {
                File::delete(storage_path($image));
            }
        }

        $content->delete();

        return redirect()->route('admin.content.index')->with('success', 'Konten berhasil dihapus');
    }

    protected function storeMedia($file, string $folder): string
    {
        $directory = storage_path($folder);

        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }

        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return $folder . '/' . $filename;
    }

    protected function storeGallery(array $files): array
    {
        $stored = [];
        $directory = storage_path('news/gallery');

        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }

        foreach ($files as $file) {
            if (! $file || ! $file->isValid()) {
                continue;
            }

            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($directory, $filename);
            $stored[] = 'news/gallery/' . $filename;
        }

        return $stored;
    }
}
