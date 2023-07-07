<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Widgets\StatsOverview;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        if(auth()->user()->hasRole('Superadmin')){
            return ['name', 'email', 'progress', 'roles.name'];
        } else {
            return [];
        }

    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Name' => $record->name,
            'Email' => $record->email,
            'Role' => $record->roles[0]->name,
        ];
    }

    
    

    protected static ?string $navigationGroup = 'User Management';
    
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->minLength(2)
                ->maxLength(255),
                Select::make('roles')
                ->multiple()
                ->relationship('roles', 'name')
                ->preload(),
                TextInput::make('email')
                ->email(),
                TextInput::make('password')
                ->password()
                ->maxLength(255)
                ->dehydrated(fn ($state) => filled($state))
                ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                ->required(fn (string $context): bool => $context === 'create'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')->toggleable(isToggledHiddenByDefault: true)->searchable(),
                TextColumn::make('roles.name')->searchable()->icon('heroicon-s-user-circle')->color(function(User $record){
                    if($record->hasRole('Superadmin')){
                        return "primary";
                    } else if($record->hasRole('Student')){
                        return "secondary";
                    }
                }),
                TextColumn::make('progress')->description(function(User $record){
                        return ((((int)$record->progress)/5)*100)."% Progressed";                
                }),
                TextColumn::make('score1')->toggleable(isToggledHiddenByDefault: true)->label("Score Exercise 1"),
                TextColumn::make('score2')->toggleable(isToggledHiddenByDefault: true)->label("Score Exercise 2"),
                TextColumn::make('score3')->toggleable(isToggledHiddenByDefault: true)->label("Score Exercise 3"),
                TextColumn::make('score4')->toggleable(isToggledHiddenByDefault: true)->label("Score Exercise 4"),
                TextColumn::make('score5')->toggleable(isToggledHiddenByDefault: true)->label("Score Exercise 5"),
                TextColumn::make('created_at')->date()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->since()->label('Updated'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
