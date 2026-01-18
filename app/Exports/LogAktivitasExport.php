<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Font;

class LogAktivitasExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, WithTitle, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Peminjaman::with(['user', 'buku'])
            ->latest()
            ->get()
            ->map(function ($log) {
                return [
                    'Tanggal' => $log->created_at->format('d-m-Y H:i'),
                    'Nama User' => $log->user->nama ?? '-',
                    'Email User' => $log->user->email ?? '-',
                    'Judul Buku' => $log->buku->judul ?? '-',
                    'ISBN' => $log->buku->isbn ?? '-',
                    'Status' => $this->getStatusLabel($log->status),
                    'Denda (Rp)' => number_format($log->denda, 0, ',', '.'),
                    'Keterangan' => $log->keterangan ?? '-',
                ];
            });
    }

    /**
     * Get formatted status label
     */
    private function getStatusLabel($status)
    {
        return match($status) {
            'meminjam' => '📘 Meminjam',
            'dikembalikan' => '✅ Dikembalikan',
            'terlambat' => '⏰ Terlambat',
            default => $status
        };
    }

    /**
     * Headings
     */
    public function headings(): array
    {
        return [
            'TANGGAL',
            'NAMA USER',
            'EMAIL USER',
            'JUDUL BUKU',
            'ISBN',
            'STATUS',
            'DENDA (RP)',
            'KETERANGAN',
        ];
    }

    /**
     * Title
     */
    public function title(): string
    {
        return 'Log Aktivitas';
    }

    /**
     * Column widths
     */
    public function columnWidths(): array
    {
        return [
            'A' => 20, // Tanggal
            'B' => 25, // Nama User
            'C' => 30, // Email User
            'D' => 35, // Judul Buku
            'E' => 20, // ISBN
            'F' => 15, // Status
            'G' => 15, // Denda
            'H' => 30, // Keterangan
        ];
    }

    /**
     * Styles
     */
    public function styles(Worksheet $sheet)
    {
        // Header styles
        $sheet->getStyle('A1:H1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 12,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '0F766E'], // Emerald 700
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        // Set row height for header
        $sheet->getRowDimension(1)->setRowHeight(35);

        // Auto-size columns
        foreach (range('A', 'H') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(false);
        }

        // Data styles
        $lastRow = $sheet->getHighestRow();
        if ($lastRow > 1) {
            // Alternating row colors
            for ($row = 2; $row <= $lastRow; $row++) {
                $fillColor = $row % 2 == 0 ? 'F8FAFC' : 'FFFFFF'; // Light gray / White

                $sheet->getStyle("A{$row}:H{$row}")->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => $fillColor],
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb' => 'E5E7EB'], // Gray 200
                        ],
                    ],
                    'alignment' => [
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // Status column styling
                $statusCell = $sheet->getCell("F{$row}")->getValue();
                $statusColor = 'FFFFFF';

                if (str_contains($statusCell, 'Meminjam')) {
                    $statusColor = 'DBEAFE'; // Blue 100
                } elseif (str_contains($statusCell, 'Dikembalikan')) {
                    $statusColor = 'D1FAE5'; // Green 100
                } elseif (str_contains($statusCell, 'Terlambat')) {
                    $statusColor = 'FEE2E2'; // Red 100
                }

                $sheet->getStyle("F{$row}")->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => $statusColor],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                ]);

                // Denda column styling
                $dendaValue = $sheet->getCell("G{$row}")->getValue();
                if ($dendaValue !== '0') {
                    $sheet->getStyle("G{$row}")->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'color' => ['rgb' => 'DC2626'], // Red 600
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_RIGHT,
                        ],
                    ]);
                } else {
                    $sheet->getStyle("G{$row}")->applyFromArray([
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_CENTER,
                        ],
                    ]);
                    $sheet->setCellValue("G{$row}", '-');
                }

                // Text alignment for other columns
                $sheet->getStyle("A{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle("E{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle("H{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
            }

            // Set row height for data rows
            for ($row = 2; $row <= $lastRow; $row++) {
                $sheet->getRowDimension($row)->setRowHeight(25);
            }
        }

        // Freeze header row
        $sheet->freezePane('A2');

        // Add filter
        $sheet->setAutoFilter('A1:H1');
    }

    /**
     * Events
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Add title
                $sheet->mergeCells('A1:H1');
                $sheet->setCellValue('A1', 'LAPORAN LOG AKTIVITAS PEMINJAMAN');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 16,
                        'color' => ['rgb' => '0F766E'], // Emerald 700
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'F0FDFA'], // Emerald 50
                    ],
                ]);
                $sheet->getRowDimension(1)->setRowHeight(40);

                // Insert header at row 2
                $sheet->insertNewRowBefore(2, 1);
                $headers = $this->headings();
                $sheet->fromArray($headers, null, 'A2');

                // Add generated date
                $lastRow = $sheet->getHighestRow();
                $sheet->mergeCells("A" . ($lastRow + 2) . ":H" . ($lastRow + 2));
                $sheet->setCellValue("A" . ($lastRow + 2), "Dibuat pada: " . now()->format('d F Y H:i:s'));
                $sheet->getStyle("A" . ($lastRow + 2))->applyFromArray([
                    'font' => [
                        'italic' => true,
                        'color' => ['rgb' => '6B7280'], // Gray 500
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_RIGHT,
                    ],
                ]);

                // Add summary row
                $totalDenda = Peminjaman::sum('denda');
                $totalAktivitas = Peminjaman::count();
                $totalMeminjam = Peminjaman::where('status', 'meminjam')->count();
                $totalDikembalikan = Peminjaman::where('status', 'dikembalikan')->count();
                $totalTerlambat = Peminjaman::where('status', 'terlambat')->count();

                $summaryRow = $lastRow + 4;

                $sheet->setCellValue("A{$summaryRow}", "TOTAL AKTIVITAS");
                $sheet->setCellValue("B{$summaryRow}", $totalAktivitas);
                $sheet->setCellValue("D{$summaryRow}", "TOTAL DENDA");
                $sheet->setCellValue("E{$summaryRow}", "Rp " . number_format($totalDenda, 0, ',', '.'));
                $sheet->setCellValue("G{$summaryRow}", "STATISTIK STATUS");

                $sheet->getStyle("A{$summaryRow}:H{$summaryRow}")->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FFFFFF'],
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '475569'], // Slate 600
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ],
                ]);

                $sheet->setCellValue("A" . ($summaryRow + 1), "Meminjam");
                $sheet->setCellValue("B" . ($summaryRow + 1), $totalMeminjam);
                $sheet->setCellValue("D" . ($summaryRow + 1), "Dikembalikan");
                $sheet->setCellValue("E" . ($summaryRow + 1), $totalDikembalikan);
                $sheet->setCellValue("G" . ($summaryRow + 1), "Terlambat");
                $sheet->setCellValue("H" . ($summaryRow + 1), $totalTerlambat);

                $sheet->getStyle("A" . ($summaryRow + 1) . ":H" . ($summaryRow + 1))->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'F8FAFC'], // Slate 50
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb' => 'E5E7EB'],
                        ],
                    ],
                ]);

                // Format summary numbers
                $sheet->getStyle("B" . ($summaryRow + 1))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle("E" . ($summaryRow + 1))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle("H" . ($summaryRow + 1))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // Add borders to all data
                $dataEndRow = $lastRow;
                $sheet->getStyle("A2:H{$dataEndRow}")->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb' => 'E5E7EB'],
                        ],
                    ],
                ]);

                // Auto-fit columns after data insertion
                foreach (range('A', 'H') as $column) {
                    $sheet->getColumnDimension($column)->setAutoSize(true);
                }
            },
        ];
    }
}
