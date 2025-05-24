<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DonationResource\Pages;
use App\Models\Donation;
use Filament\Forms;
use Filament\Tables\Columns\SelectColumn;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Icons\Icon;

use App\Notifications\DonationStatusNotification; // Ensure this is the correct namespace for the notification class

class DonationResource extends Resource
{
    protected static ?string $model = Donation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack'; // Kamu bisa pilih ikon lain

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('donor_name')
                    ->label('Nama Donatur')
                    ->required(),

                Forms\Components\Select::make('type')
                    ->label('Jenis Donasi')
                    ->options([
                        'financial' => 'Uang',
                        'goods' => 'Barang',
                        'emotional' => 'Dukungan Emosional',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('amount')
                    ->label('Jumlah Uang')
                    ->numeric()
                    ->nullable()
                    ->requiredIf(fn($get) => $get('type') === 'financial', ['type' => 'financial']),

                Forms\Components\TextInput::make('item_quantity')
                    ->label('Jumlah Barang')
                    ->nullable()
                    ->requiredIf(fn($get) => $get('type') === 'goods', ['type' => 'goods']),

                Forms\Components\TextInput::make('session_count')
                    ->label('Jumlah Sesi')
                    ->nullable()
                    ->requiredIf(fn($get) => $get('type') === 'emotional', ['type' => 'emotional']),

                // Menambahkan kolom bukti pembayaran
                FileUpload::make('payment_proof')
                    ->label('Bukti Pembayaran')
                    ->disk('public') 
                    ->previewable(true)
                    ->nullable(),

                // Menambahkan kolom status verifikasi pembayaran
                Select::make('payment_verified')
                    ->label('Status Verifikasi Pembayaran')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
{
    return $table
        ->defaultSort('created_at', 'desc') 
        ->columns([
            Tables\Columns\TextColumn::make('donor_name')
                ->label('Nama Donatur'),

            Tables\Columns\TextColumn::make('type')
                ->label('Jenis Donasi'),

            Tables\Columns\TextColumn::make('amount')
                ->label('Jumlah Uang')
                ->money('IDR', true)
                ->sortable(),

            Tables\Columns\TextColumn::make('item_quantity')
                ->label('Barang')
                ->sortable(),

            Tables\Columns\TextColumn::make('session_count')
                ->label('Jumlah Sesi')
                ->sortable(),
            

            Tables\Columns\TextColumn::make('payment_verified')
                ->label('Status Verifikasi')
                ->badge()
                ->color(fn($state) => match ($state) {
                    'approved' => 'success',
                    'rejected' => 'danger',
                    'pending' => 'warning',
                    default => 'gray',
                }),

            
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('type')
                ->label('Jenis Donasi')
                ->options([
                    'financial' => 'Uang',
                    'goods' => 'Barang',
                    'emotional' => 'Dukungan Emosional',
                ]),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),

            Tables\Actions\Action::make('approve')
                ->label('Approve')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->visible(fn($record) => $record?->payment_verified === 'pending')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $record->update(['payment_verified' => 'approved']);
                    if ($record->user) {
                        $record->user->notify(new DonationStatusNotification($record));
                    }
                }),

            Tables\Actions\Action::make('reject')
                ->label('Reject')
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->visible(fn($record) => $record?->payment_verified === 'pending')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $record->update(['payment_verified' => 'rejected']);
                    if ($record->user) {
                        $record->user->notify(new DonationStatusNotification($record));
                    }
                }),
        ]);
}




    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDonations::route('/'),
            'create' => Pages\CreateDonation::route('/create'),
            'edit' => Pages\EditDonation::route('/{record}/edit'),
        ];
    }
}
