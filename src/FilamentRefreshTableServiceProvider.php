<?php

namespace FaizanAnwerAli\FilamentRefreshTable;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentRefreshTableServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-refresh-table';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasViews('filament-refresh-table')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->askToStarRepoOnGitHub('faizananwerali/filament-refresh-table');
            });
    }

    public function packageRegistered(): void
    {
        // Register the plugin
        $this->app->scoped(FilamentRefreshTablePlugin::class, function () {
            return new FilamentRefreshTablePlugin();
        });
    }
}
