<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AbsensiResource\Pages;
use App\Filament\Resources\AbsensiResource\RelationManagers;
use App\Models\Absensi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AbsensiResource extends Resource
{
    protected static ?string $model = Absensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\TextInput::make('office_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jadwal_latitude')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('jadwal_longitude')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('jadwal_start_time')
                    ->required(),
                Forms\Components\TextInput::make('jadwal_end_time')
                    ->required(),
                Forms\Components\TextInput::make('start_latitude')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('start_longitude')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('end_latitude')
                    ->numeric(),
                Forms\Components\TextInput::make('end_longitude')
                    ->numeric(),
                Forms\Components\TextInput::make('start_time')
                    ->required(),
                Forms\Components\TextInput::make('end_time'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('office_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jadwal_latitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jadwal_longitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jadwal_start_time'),
                Tables\Columns\TextColumn::make('jadwal_end_time'),
                Tables\Columns\TextColumn::make('start_latitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_longitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_latitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_longitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_time'),
                Tables\Columns\TextColumn::make('end_time'),
                Tables\Columns\TextColumn::make('is_Late')
                    ->label('status')
                    ->badge()
                    ->getStateUsing(function ($record) {
                        return $record->isLate() ? 'Terlambat' : 'Tepat Waktu';
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'Tepat Waktu' => 'success',
                        'Terlambat' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('durasi_Kerja')
                    ->label('Durasi')
                    ->badge()
                    ->getStateUsing(function (Absensi $record) {
                        if ($record->durasiKerja() == 8) {
                            return $record->durasiKerja() . ' jam';
                        }
                        if ($record->durasiKerja() > 8) {
                            return 8 . ' jam + ' . $record->durasiKerja() - 8 . ' jam';
                        }
                        if ($record->durasiKerja() < 8) {
                            return $record->durasiKerja() . ' jam' . 'Terlambat';
                        }
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'Terlambat'  => 'danger',
                        $state  => 'warning',
                    }),
                Tables\Columns\TextColumn::make('over_Time')
                    ->label('Overtime')
                    ->badge()
                    ->getStateUsing(function (Absensi $record) {
                        if ($record->overTime() > 0) {
                            return $record->overTime() . ' jam';
                        }
                    })
                    ->color(fn(string $state): string => match ($state) {
                        $state => 'success',
                    }),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListAbsensis::route('/'),
            'create' => Pages\CreateAbsensi::route('/create'),
            'edit' => Pages\EditAbsensi::route('/{record}/edit'),
        ];
    }
}
