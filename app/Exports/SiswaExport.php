<?php

namespace App\Exports;

use App\Models\SiswaModel;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class SiswaExport implements FromCollection, WithMapping, WithHeadings, WithEvents, ShouldAutoSize, WithCustomStartCell
{

    public function __construct(SiswaModel $siswaModel) {
        $this->siswaModel = $siswaModel;
    }

    /**
     * Start Cell Excel
     *
     * @return string
     */
    public function startCell(): string
    {
        return 'A2';
    }

    /**
     * Heading on Excel
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'NIS',
            'NISN',
            'nama',
            'email',
            'tanggal_lahir',
            'agama',
            'jenis_kelamin',
            'nomor_telf',
            'nama_ayah',
            'nama_ibu'
        ];
    }

    /**
     * @return GuruModel $guruModel
     */
    public function map($guruModel): array
    {
        return [
            $guruModel->nis,
            $guruModel->nisn,
            $guruModel->SiswaToUser->name,
            $guruModel->SiswaToUser->email,
            $guruModel->tanggal_lahir,
            $guruModel->agama,
            $guruModel->jenis_kelamin,
            $guruModel->nomor_telf,
            $guruModel->nama_ibu,
            $guruModel->nama_ayah,
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getStyle('A2:J2')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  15,
                        'bold'      =>  true
                    )
                ]);
            },
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SiswaModel::all();
    }


}
