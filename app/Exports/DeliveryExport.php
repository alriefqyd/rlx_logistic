<?php

namespace App\Exports;

use App\Models\Delivery;
use App\Services\AdminDeliveryService;
use http\Env\Request;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DeliveryExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize,
    WithStyles, WithColumnFormatting
{
    use Exportable;

    public function __construct($start,$end, $stt, $request)
    {
        $this->start = $start;
        $this->end = $end;
        $this->stt = $stt;
        $this->request = $request;
//        $dates = $this->dates;
        $data = Delivery::all();
        $this->count = sizeof($data) + 1;
//        if($dates){
//            $this->count = sizeof($dates) + 1;
//        }
    }
//    /**
//    * @return \Illuminate\Support\Collection
//    */
//    public function collection()
//    {
//        return Delivery::all();
//    }

    /**
     * @return Builder|EloquentBuilder|Relation
     */
    public function query()
    {
        $deliveryService = new AdminDeliveryService();
        $query = $deliveryService->getDelivery();
        $this->count = sizeof($query->get()) + 2;
        return $query->orderBy('created_at', 'DESC');
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return
            [
                "TANGGAL",
                "NO STT",
                "CONSIGNEE NAME",
                "CONSIGNEE ADRESS",
                "TUJUAN",
                "COLY",
                "BERAT/KG",
                "BIAYA",
                "ASURANSI",
                "PPN 1%",
                "PACKING",
                "JUMLAH"
            ];
    }

    /**
     * @param mixed $row
     * @return array
     */
    public function map($delivery): array
    {

        $berat = 0;
        if ($delivery->consignments){
            foreach ($delivery->consignments as $c) {
                $berat += $c->berat_barang;
            }
        }
        return [
            $delivery->created_at->isoFormat('dddd, D MMMM Y'),
            $delivery->stt,
            $delivery->senderName,
            $delivery->addressSender,
            $delivery->cityDestination->name,
            sizeof($delivery->consignments),
            $berat,
            $delivery->sending_price,
            $delivery->biaya_asuransi,
            $delivery->ppn ?? 0,
            'packing',
            $delivery->total_price,
        ];
    }

    public function styles(Worksheet $sheet)
    {


        $sheet->getStyle('1')->applyFromArray([
            'font' => [
                'bold' => true
            ],
            'alignment' => [
                'horizontal' => Alignment::VERTICAL_CENTER,
                'vertical' => Alignment::HORIZONTAL_CENTER
            ]
        ]);

        $sheet->getStyle($this->count+3)->applyFromArray([
            'font' => [
                'bold' => true
            ],
            'alignment' => [
                'horizontal' => Alignment::VERTICAL_CENTER,
                'vertical' => Alignment::HORIZONTAL_CENTER
            ]
        ]);

        $sheet->mergeCellsByColumnAndRow(1,$this->count+3,5,$this->count+3);

        $data = [
            'Jumlah (Rp)',
            '','','','',
            '=SUM(F2:F'.$this->count.')',
            '=SUM(G2:G'.$this->count.')',
            '=SUM(H2:H'.$this->count.')',
            '=SUM(I2:I'.$this->count.')',
            '=SUM(J2:J'.$this->count.')',
            '',
            '=SUM(L2:L'.$this->count.')',
        ];
        $sheet->fromArray(array(
            $data
        ), null,"A".($this->count+3)."",false,false);
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'L' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'H' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'J' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }
}
