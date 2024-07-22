<?php

namespace App\Filament\Resources\AtributeResource\Pages;

use App\Filament\Resources\AtributeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAtributes extends ListRecords
{
    protected static string $resource = AtributeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
