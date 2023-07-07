<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LessonResource\Pages;
use App\Filament\Resources\LessonResource\RelationManagers;
use App\Models\Lesson;
use App\Models\Module;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\MarkdownEditor;

function modules(){
    $modules = Module::all();
    $arrModules = [];
    foreach($modules as $module){
        $newArr = array($module->module_number => $module->module_number);
        $arrModules = array_merge($arrModules, $newArr);
    }
    return $arrModules;
    
}

class LessonResource extends Resource
{
    protected static ?string $model = Lesson::class;

    protected static ?int $navigationSort = 4;


    protected static ?string $navigationGroup = 'Resource Management';

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('module')
                ->options(
                    modules()
                )
                ->required()
                ->preload(),
                TextInput::make('title')
                ->required()
                ->disabled(),
                RichEditor::make('content')
                ->required()
                ->columnSpan(2)
                ->toolbarButtons([
                    'attachFiles',
                    'bold',
                    'codeBlock',
                    'italic',
                    'link',
                    'blockquote',
                    'h2',
                    'h3',
                    'orderedList',
                    'redo',
                    'strike',
                    'color',
                    'undo',
                ])
                ->fileAttachmentsDisk('local')
                ->fileAttachmentsDirectory('public')
                // ->fileAttachmentsVisibility('private')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('module'),
                TextColumn::make('title'),
                TextColumn::make('created_at')->date(),
                TextColumn::make('updated_at')->since()->label('Updated'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLessons::route('/'),
            'create' => Pages\CreateLesson::route('/create'),
            'edit' => Pages\EditLesson::route('/{record}/edit'),
        ];
    }    
}
