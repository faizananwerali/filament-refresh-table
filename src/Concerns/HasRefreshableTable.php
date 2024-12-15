<?php

namespace FaizanAnwerAli\FilamentRefreshTable\Concerns;

use Filament\Support\Facades\FilamentView;
use Illuminate\Contracts\View\View;

trait HasRefreshableTable
{
    use ConfigurePlugin;

    public function initializeHasRefreshableTable(): void
    {
        $this->listeners = $this->listeners + [
                'onTableRefresh' => '$refresh',
            ];
    }

    public function bootedHasRefreshableTable(): void
    {
        $this->registerRefreshActionHook('tables::toolbar.search.after');
    }

    public function onRefreshButtonClick(): void
    {
        $this->dispatch('onTableRefresh');
    }

    protected function registerRefreshActionHook(string $filamentHook): void
    {
        FilamentView::registerRenderHook(
            $filamentHook,
            fn (): View => view('filament-refresh-table::components.refresh-button'),
            scopes: static::class,
        );
    }
}
