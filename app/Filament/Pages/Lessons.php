<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Lessons extends Page
{
    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'Progress';

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $title = 'Lessons Progress';
 
    protected static ?string $navigationLabel = 'Modules';
 
    protected static ?string $slug = 'modules';

    protected static string $view = 'filament.pages.lessons';

    protected static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}
