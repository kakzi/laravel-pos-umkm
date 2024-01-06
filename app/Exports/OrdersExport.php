<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    public function forRange(String $start, String $end)
    {
        $this->start = $start;
        $this->end = $end;
        return $this;
    }

    public function query()
    {
        return Order::query()->with('kasir')->whereBetween('created_at', [$this->start, $this->end]);
    }

    public function map($order): array
    {
        $i = 1;
        return [
            $i++,
            $order->transaction_time,
            $order->total_price,
            $order->total_item,
            $order->kasir->name
            // Carbon::parse($order->created_at)->format('d-m-Y'),
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Tanggal Transaksi',
            'Total Price',
            'Total Item',
            'Kasir',
        ];
    }
}
