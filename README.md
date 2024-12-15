# Filament Refresh Table

A Filament plugin that adds refresh functionality to tables.

![Filament Refresh Table](/screenshots/image1.png)

## Installation

You can install the package via composer:

```bash
composer require faizananwerali/filament-refresh-table
```

## Usage

### Global Usage

```php
use FaizanAnwerAli\FilamentRefreshTable\FilamentRefreshTablePlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->plugins([
                FilamentRefreshTablePlugin::make(),
            ]);
    }
}
```

### Manual Usage

```php
use FaizanAnwerAli\FilamentRefreshTable\FilamentRefreshTablePlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->plugins([
                FilamentRefreshTablePlugin::make()->enabled(false),
            ]);
    }
}
```

On table page, use trait.

```php
<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use FaizanAnwerAli\FilamentRefreshTable\Concerns\HasRefreshableTable;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPosts extends ListRecords
{
    use HasRefreshableTable;
    
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
```


## License

The MIT License (MIT).