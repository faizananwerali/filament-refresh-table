<?php

namespace FaizanAnwerAli\FilamentRefreshTable\Concerns;

use Closure;
use Filament\Support\Concerns\EvaluatesClosures;

trait ConfigurePlugin
{
    use EvaluatesClosures;

    protected string|Closure $icon = 'heroicon-o-arrow-path';

    protected string|Closure $color = 'gray';

    protected string|Closure $label = 'Refresh';

    protected string|Closure $position = 'tables::toolbar.search.after';

    protected bool|Closure $isEnabled = true;

    protected bool|Closure $showLabel = false;

    protected string|Closure|null $tooltip = null;

    public function icon(string|Closure $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function color(string|Closure $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function label(string|Closure $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function position(string|Closure $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function showLabel(bool|Closure $condition = true): static
    {
        $this->showLabel = $condition;

        return $this;
    }

    public function enabled(bool|Closure $condition = true): static
    {
        $this->isEnabled = $condition;

        return $this;
    }

    public function getIcon(): string
    {
        return $this->evaluate($this->icon);
    }

    public function getColor(): string
    {
        return $this->evaluate($this->color);
    }

    public function getLabel(): string
    {
        return $this->evaluate($this->label);
    }

    public function getPosition(): string
    {
        return $this->evaluate($this->position);
    }

    public function isEnabled(): bool
    {
        return $this->evaluate($this->isEnabled);
    }

    public function shouldShowLabel(): bool
    {
        return $this->evaluate($this->showLabel);
    }

    public function tooltip(string|Closure|null $tooltip): static
    {
        $this->tooltip = $tooltip;

        return $this;
    }

    public function getTooltip(): ?string
    {
        return $this->evaluate($this->tooltip) ?? ($this->shouldShowLabel() ? null : $this->getLabel());
    }
}
