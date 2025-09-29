<?php

namespace App\Exports;

use App\Models\Beneficiary;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportBeneficiaries implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Eager load the project relationship and get the project name
        return Beneficiary::with('project') 
            ->select("id", "name", 'gender', "phone", 'age', 'notes', 'project_id')
            ->get()
            ->map(function ($beneficiary) {
                // Replace project_id with project name
                $beneficiary->project_id = $beneficiary->project ? $beneficiary->project->title : null;
                return $beneficiary;
            });
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ['ID', 'Name', 'Gender', 'Phone', 'Age', 'Note', 'Project',];
    }
}
