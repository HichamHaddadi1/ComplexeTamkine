<?php

namespace App\Exports;

use App\User;
use App\Salle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class IntervenantExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $dateDebut;
    protected $dateFin;

    function __construct($dateDebut,$dateFin) {
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
    }

    public function collection(){
        return User::select('nom', 'prenom', 'email', 'tel',  'created_at')
        ->where([['role','intervenant']])
        ->whereBetween('created_at', [$this->dateDebut, $this->dateFin])
        ->orderByDesc('created_at')
        ->get();
    }

    public function headings(): array{
        return [
            'Nom',
            'Prénom',
            'Email',
            'Tel',
            'La date de création',
        ];
    }


}
