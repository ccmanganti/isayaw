<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Lesson1_2 extends Page
{
    protected static ?int $navigationSort = 7;

    protected static ?string $navigationGroup = 'Module 1';

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';

    protected static ?string $title = 'Module 1: Lesson 2';
 
    protected static ?string $navigationLabel = 'Lesson II';
 
    protected static ?string $slug = 'module-1-lesson-2';

    protected static string $view = 'filament.pages.lesson1_2';

    protected static function shouldRegisterNavigation(): bool
    {
        // return auth()->user()->onboarding != null;
        return false;
    }
}
