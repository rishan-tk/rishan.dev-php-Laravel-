<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class TerminalController extends Controller
{
    public function filesystem()
    {
        $ttl = app()->isProduction() ? null : 3600;

        $tree = Cache::remember('terminal_fs', $ttl, function () {
            $base = resource_path('data/terminal');
            if (! is_dir($base)) {
                return [];
            }
            return $this->buildTree($base, $base);
        });

        return response()->json($tree);
    }

    public function file(string $path)
    {
        if (str_contains($path, "\0") || ! str_ends_with($path, '.md')) {
            abort(404, 'File not found');
        }

        $base = resource_path('data/terminal');
        $full = realpath($base . '/' . $path);

        if (! $full || ! str_starts_with($full, realpath($base)) || ! is_file($full)) {
            abort(404, 'File not found');
        }

        return response(file_get_contents($full))
            ->header('Content-Type', 'text/plain');
    }

    private function buildTree(string $dir, string $base): array
    {
        $items = [];
        $entries = scandir($dir);

        foreach ($entries as $entry) {
            if ($entry === '.' || $entry === '..') {
                continue;
            }

            $fullPath = $dir . DIRECTORY_SEPARATOR . $entry;
            $relativePath = str_replace('\\', '/', substr($fullPath, strlen($base) + 1));

            if (is_dir($fullPath)) {
                $items[] = [
                    'name' => $entry,
                    'type' => 'dir',
                    'path' => $relativePath,
                    'children' => $this->buildTree($fullPath, $base),
                ];
            } else {
                $items[] = [
                    'name' => $entry,
                    'type' => 'file',
                    'path' => $relativePath,
                ];
            }
        }

        return $items;
    }
}
