<?php

namespace App\Exports;

use App\Models\Article;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ArticlesExport implements
    FromCollection,
    WithHeadings,
    WithStyles,
    ShouldAutoSize,
    WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Article::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Заголовок',
            'Содержание',
            'ID создателя',
            'Опубликовано',
            'Изменено'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'C' => 55,
            'E' => 28,
            'F' => 28,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle(1)->getFont()->setBold(true);
        $sheet->getStyle('C')->getAlignment()->setWrapText(true);
        // $sheet->getDefaultRowDimension()->setRowHeight(50);
        // $sheet->getRowDimension(1)->setRowHeight(-1);
    }
}
