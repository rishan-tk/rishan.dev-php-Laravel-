<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class TerminalFrame extends Component
{
    public array $tabs;
    public string $path;

    public function __construct(string $path = '')
    {
        $this->path = $path;

        $this->tabs = [
            ['label' => '~/home',      'href' => '/',          'route' => 'home'],
            ['label' => '~/projects',   'href' => '/projects',  'route' => 'projects'],
            ['label' => '~/skills',     'href' => '/skills',    'route' => 'skills'],
            ['label' => '~/aboutme',    'href' => '/aboutme',   'route' => 'aboutme'],
            ['label' => '~/contactme',  'href' => '/contactme', 'route' => 'contactme'],
            ['label' => '~/blog',       'href' => '/blog',      'route' => 'blog'],
        ];
    }

    public function isActive(array $tab): bool
    {
        $current = '/' . ltrim($this->path, '/');
        return $current === $tab['href'];
    }

    public function render(): View
    {
        return view('components.terminal-frame');
    }
}
