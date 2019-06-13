<?php

namespace App\Exports;

use App\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BooksExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Book::all();
    }
    public function headings(): array
    {
        return [
            '#',
            'Prenom',
            'Nom',
            'Email',
            'Contact',
            'Debut sejour',
            'Fin sejour',
            'Nombre Adulte',
            'Nombre Enfant',
            'Nom chambre',
            'book_status',
            'date reservation',
            'sous total',
            'services',
            'prix service',
            'Montant total',
            'Created at',
            'Updated at'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}
