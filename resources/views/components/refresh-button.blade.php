<div>
    <x-filament::icon-button
            :icon="$icon"
            :color="$color"
            size="md"
            :label="$label"
            :tooltip="$showLabel ? null : $label"
            class="h-9 w-9"
            x-on:click="$wire.call('$refresh')"
    />
</div>