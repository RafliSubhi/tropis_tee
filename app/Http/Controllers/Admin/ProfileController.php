<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::firstOrCreate([], [
            'latar_belakang' => 'Isi latar belakang perusahaan di sini.',
            'deskripsi_usaha' => 'Isi deskripsi usaha Anda di sini.',
            'welcome_title' => 'Selamat Datang di Tropis Tee',
            'welcome_text' => 'Teks selamat datang bisa diatur di halaman profil pada dashboard admin.',
        ]);
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:51200',
            'logo_text' => 'nullable|string|max:255',
            // Existing fields
            'latar_belakang' => 'required|string',
            'deskripsi_usaha' => 'required|string',
            'welcome_title' => 'nullable|string|max:255',
            'welcome_text' => 'nullable|string',
            'welcome_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:51200',
            
            // New Profile fields
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'prinsip' => 'nullable|string',
            'team_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:51200',

            // New Contact fields
            'map_embed_url' => 'nullable|string',
            'location_address' => 'nullable|string|max:255',
            'email_address' => 'nullable|email|max:255',
            'social_link' => 'nullable|url',
            'whatsapp_number' => 'nullable|url',
        ]);

        $profile = Profile::first();
        
        // Prepare data for update, excluding images for now
        $data = $request->except(['logo_image', 'welcome_image', 'team_image']);

        // Handle Logo Image Upload
        if ($request->hasFile('logo_image')) {
            if ($profile->logo_image) {
                Storage::disk('public')->delete($profile->logo_image);
            }
            $path = $request->file('logo_image')->store('site', 'public');
            $data['logo_image'] = $path;

            // Update favicon
            $faviconPath = public_path('favicon.ico');
            if (File::exists($faviconPath)) {
                File::delete($faviconPath);
            }
            File::copy(storage_path('app/public/' . $path), $faviconPath);
        }

        // Handle Welcome Image Upload
        if ($request->hasFile('welcome_image')) {
            if ($profile->welcome_image) {
                Storage::disk('public')->delete($profile->welcome_image);
            }
            $path = $request->file('welcome_image')->store('site', 'public');
            $data['welcome_image'] = $path;
        }

        // Handle Team Image Upload
        if ($request->hasFile('team_image')) {
            if ($profile->team_image) {
                Storage::disk('public')->delete($profile->team_image);
            }
            $path = $request->file('team_image')->store('site', 'public');
            $data['team_image'] = $path;
        }

        $profile->update($data);

        return redirect()->route('admin.profile.edit')->with('success', 'Pengaturan Website berhasil diperbarui.');
    }
}
