<?php

namespace App\Exports;

use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class GuruExport implements FromCollection, WithMapping, WithHeadings, WithEvents, ShouldAutoSize, WithCustomStartCell
{    
    public function __construct($guruModel) {
        $this->guruModel = $guruModel;
    }

    public function startCell(): string
    {
        return 'A2';
    }

    public function headings(): array
    {
        return [
            'NIP', 
            'Nama', 
            'Email',
            'Nomor Hp', 
            'Tempat Lahir',
            'Tanggal Lahir',
            'Agama',
            'Status Nikah',
            'Nama Ibu',
            'Nama Ayah',
            'Status Kepegawaian',
            'Jenis PTK',
            'Lembaga Sertifikasi',
            'Nomor SK',
            'Tanggal SK',
            'NUPTK',
            'TMT Tugas',
            'Tugas Tambahan',
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getStyle('A2:R2')->applyFromArray([
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
     * @return GuruModel $guruModel
     */
    public function map($guruModel): array
    {
        return [
            $guruModel->nip,
            $guruModel->GuruToUser->name,
            $guruModel->GuruToUser->email,
            $guruModel->no_hp,
            $guruModel->tempat_lahir,
            $guruModel->tanggal_lahir,
            $guruModel->agama,
            $guruModel->status_nikah,
            $guruModel->nama_ibu,
            $guruModel->nama_ayah,
            $guruModel->status_kepegawaian,
            $guruModel->jenis_ptk,
            $guruModel->lembaga_sertifikasi,
            $guruModel->no_sk,
            $guruModel->tgl_sk,
            $guruModel->nuptk,
            $guruModel->tmt_tugas,
            $guruModel->tugas_tambahan,
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->guruModel->GuruExport();
    }
}
