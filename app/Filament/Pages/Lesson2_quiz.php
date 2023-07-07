<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Score;

class Lesson2_quiz extends Page
{
    protected static ?int $navigationSort = 9;

    protected static ?string $navigationGroup = 'Modules';

    protected static ?string $navigationIcon = 'heroicon-s-pencil';

    protected static ?string $title = 'Module 2: Assessment';
 
    protected static ?string $navigationLabel = 'Module 2: Assessment';
 
    protected static ?string $slug = 'module-2-assessment';

    protected static string $view = 'filament.pages.lesson2_quiz';

    protected static function shouldRegisterNavigation(): bool
    {
        // return auth()->user()->canManageSettings();
        $user = Score::where('userid', '=', auth()->user()->id)->where('module', 'Module 1')->first();
        if ($user != null && auth()->user()->progress > 1){
            return true;
        } else {
            return false;
        }
    }
    public function mount(): void
    {
        abort_unless(Score::where('userid', '=', auth()->user()->id)->where('module', 'Module 1')->first() != null, 403);
    }
}
