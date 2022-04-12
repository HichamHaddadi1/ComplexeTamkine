<?php

namespace App\Exports;

use App\Salle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OrientateursExport implements FromCollection, WithHeadings, ShouldAutoSize
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
        return Salle::select('users.nom', 'users.prenom', 'users.email', 'users.tel', 'salles.nom as nomSalle', 'salles.created_at')
                        ->join('users', 'users.id', '=', 'salles.user_id')
                        ->where([['users.role','orientateur']])
                        ->whereBetween('salles.created_at', [$this->dateDebut, $this->dateFin])
                        ->orderByDesc('salles.created_at')
                        ->get();
    }

    public function headings(): array
    {
        return [
            'Nom',
            'Prénom',
            'Email',
            'Tel',
            'Nom de la salle',
            'La date de création',
        ];
    }

}
