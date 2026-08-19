<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('order')->get();

        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $imagePath = $this->storeBannerImage($request);

        Banner::create([
            'title' => $validated['title'],
            'image_url' => $imagePath,
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil ditambahkan');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $imagePath = $banner->image_url;

        if ($request->hasFile('image')) {
            if ($banner->image_url && file_exists(storage_path($banner->image_url))) {
                unlink(storage_path($banner->image_url));
            }

            $imagePath = $this->storeBannerImage($request);
        }

        $banner->update([
            'title' => $validated['title'],
            'image_url' => $imagePath,
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil diperbarui');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image_url) {
            $filePath = storage_path($banner->image_url);

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $banner->delete();

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil dihapus');
    }

    protected function storeBannerImage(Request $request): string
    {
        $directory = storage_path('banner');

        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }

        $file = $request->file('image');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return 'banner/' . $filename;
    }
}
