<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Lesson1_quiz extends Page
{
    protected static ?int $navigationSort = 7;

    protected static ?string $navigationGroup = 'Modules';

    protected static ?string $navigationIcon = 'heroicon-s-pencil';

    protected static ?string $title = 'Module 1: Assessment';
 
    protected static ?string $navigationLabel = 'Module 1: Assessment';
 
    protected static ?string $slug = 'module-1-assessment';

    protected static string $view = 'filament.pages.lesson1_quiz';

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->onboarding != null;
    }
}
