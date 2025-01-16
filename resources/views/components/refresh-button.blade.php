<div>
    <x-filament::icon-button
            :icon="$icon"
            :color="$color"
            size="md"
            :label="$label"
            :tooltip="$showLabel ? null : $label"
            class="h-9 w-9"
            wire:loading.class.delay="hidden"
            wire:loading.attr.delay="disabled"
            x-on:click="$wire.call('$refresh')"
    />

    <x-filament::loading-indicator
            x-cloak
            wire:loading.delay
            class="h-5 w-5"
    />
</div>
