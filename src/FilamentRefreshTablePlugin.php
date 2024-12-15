<?php

namespace FaizanAnwerAli\FilamentRefreshTable;

use FaizanAnwerAli\FilamentRefreshTable\Concerns\ConfigurePlugin;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Facades\FilamentView;
use Illuminate\Contracts\View\View;

class FilamentRefreshTablePlugin implements Plugin
{
    use ConfigurePlugin;

    public function getId(): string
    {
        return 'filament-refresh-table';
    }

    public function register(Panel $panel): void
    {
        // Register the view hook for the refresh button
        if ($this->isEnabled()) {
            FilamentView::registerRenderHook(
                $this->getPosition(),
                fn (): View => view('filament-refresh-table::components.refresh-button', [
                    'color' => $this->getColor(),
                    'icon' => $this->getIcon(),
                    'label' => $this->getLabel(),
                    'showLabel' => $this->shouldShowLabel(),
                ]),
            );
        }
    }

    public function boot(Panel $panel): void {}

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
