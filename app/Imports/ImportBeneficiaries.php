<?php

namespace App\Imports;

use App\Models\Beneficiary;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportBeneficiaries implements ToModel, WithHeadingRow, WithValidation
{
    protected $project_id;
    protected $notes;

    // Constructor to accept project_id and notes
    public function __construct($project_id, $notes)
    {
        $this->project_id = $project_id;
        $this->notes = $notes;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Beneficiary([
            'name' => $row['name'],
            'age' => $row['age'],
            'gender' => $row['gender'],
            'phone' => $row['phone'],
            'notes' => $this->notes,
            'project_id' => $this->project_id,
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable',
            'project_id' => 'nullable|exists:projects,id',
            'phone' => 'nullable',
            'age' => 'nullable|integer',
            'gender' => 'nullable|in:male,female,other',
            'notes' => 'nullable',
        ];
    }
}
