<?php

namespace App\Exports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BukuExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    // Ambil semua data buku
    public function collection()
    {
        return Buku::with('kategori')->get();
    }

    // Heading kolom
    public function headings(): array
    {
        return [
            'No',
            'Judul',
            'Penulis',
            'Penerbit',
            'Kategori',
            'ISBN',
        ];
    }

    // Mapping setiap baris
    public function map($buku): array
    {
        static $no = 0;
        $no++;
        return [
            $no,
            $buku->judul,
            $buku->penulis,
            $buku->penerbit,
            $buku->kategori->kategori ?? '-',
            $buku->isbn ?? '-',
        ];
    }

    // Styling Excel (warna header dan font tebal)
    public function styles(Worksheet $sheet)
    {
        // Header
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);
        $sheet->getStyle('A1:F1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FF34D399'); // hijau soft

        // Auto width kolom
        foreach (range('A', 'F') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
    }
}
