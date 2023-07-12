<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class UsersExport implements FromCollection, WithHeadings ,WithColumnWidths
{
    protected $organization;

    public function __construct($organization)
    {
        $this->organization = $organization;
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'username',
            'email',
            // Add more column headings here
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10, // Width of column A
            'B' => 20, // Width of column B
            'C' => 25, // Width of column C
            'D' => 40, // Width of column D
            // Add more column widths here
        ];
    }

    public function collection()
    {
        return User::where('organization', '=', $this->organization)->get();
    }


}
