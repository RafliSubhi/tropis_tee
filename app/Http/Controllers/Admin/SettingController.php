<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'favicon' => 'image|mimes:ico,png,jpg,jpeg,svg|max:2048',
        ]);

        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $filename = 'favicon.' . $file->getClientOriginalExtension();
            $file->move(public_path(), $filename);

            $this->updateSettingsConfigFile(['favicon' => $filename]);
        }

        return back()->with('success', 'Pengaturan berhasil diperbarui.');
    }

    private function updateSettingsConfigFile(array $newSettings)
    {
        $path = config_path('settings.php');
        $content = File::get($path);

        foreach ($newSettings as $key => $value) {
            $content = preg_replace("/'{$key}' => '.*'/'", "'{$key}' => '{$value}'", $content);
        }

        File::put($path, $content);
    }
}
