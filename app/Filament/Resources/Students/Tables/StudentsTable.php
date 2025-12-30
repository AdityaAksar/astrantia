<?php

namespace App\Filament\Resources\Students\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                    ImageColumn::make('photo')
                        ->label('Foto Profil')
                        ->disk('public')
                        ->circular()
                        ->height(50)
                        ->width(50),
                    TextColumn::make('name')
                        ->label('Nama Mahasiswa')
                        ->searchable()
                        ->sortable(), 
                    TextColumn::make('role')
                        ->label('Peran')
                        ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
