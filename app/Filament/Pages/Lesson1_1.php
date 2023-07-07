<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Lesson1_1 extends Page
{
    protected static ?int $navigationSort = 6;

    protected static ?string $navigationGroup = 'Modules';

    protected static ?string $navigationIcon = 'heroicon-s-bookmark';

    protected static ?string $title = 'Module 1: Lesson 1';
 
    protected static ?string $navigationLabel = 'Module 1: Lesson I';
 
    protected static ?string $slug = 'module-1-lesson-1';

    protected static string $view = 'filament.pages.lesson1_1';

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->onboarding != null;
    }
}
