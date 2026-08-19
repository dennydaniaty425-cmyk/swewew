<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('order')->get();

        return view('admin.partner.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partner.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $logoPath = $this->storePartnerLogo($request);

        Partner::create([
            'name' => $validated['name'],
            'logo_url' => $logoPath,
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.partner.index')->with('success', 'Logo mitra berhasil ditambahkan');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partner.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $logoPath = $partner->logo_url;

        if ($request->hasFile('logo')) {
            if ($partner->logo_url && file_exists(storage_path($partner->logo_url))) {
                unlink(storage_path($partner->logo_url));
            }

            $logoPath = $this->storePartnerLogo($request);
        }

        $partner->update([
            'name' => $validated['name'],
            'logo_url' => $logoPath,
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.partner.index')->with('success', 'Logo mitra berhasil diperbarui');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->logo_url) {
            $filePath = storage_path($partner->logo_url);

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $partner->delete();

        return redirect()->route('admin.partner.index')->with('success', 'Logo mitra berhasil dihapus');
    }

    public function publicIndex()
    {
        $partners = [];

        if (Schema::hasTable('partners')) {
            $partners = Partner::where('is_active', true)
                ->orderBy('order')
                ->get();
        }

        return view('apotek.partners', compact('partners'));
    }

    protected function storePartnerLogo(Request $request): string
    {
        $directory = storage_path('partners');

        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }

        $file = $request->file('logo');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return 'partners/' . $filename;
    }
}
