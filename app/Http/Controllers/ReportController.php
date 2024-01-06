<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('pages.report.index');
    }

    public function filter(Request $request)
    {
        $this->validate($request, [
            'date_from'  => 'required',
            'date_to'    => 'required',
        ]);

        $date_from  = $request->date_from;
        $date_to    = $request->date_to;

        //get data donation by range date
        $orders = Order::with('kasir')
            ->whereDate('created_at', '>=', $request->date_from)
            ->whereDate('created_at', '<=', $request->date_to)
            ->paginate(10);

        // dd($orders);

        return view('pages.report.index', compact('orders'));
    }

    public function download(Request $request)
    {
        $this->validate($request, [
            'date_from'  => 'required',
            'date_to'    => 'required',
        ]);

        $date_from  = $request->date_from;
        $date_to    = $request->date_to;

        return (new OrdersExport)->forRange($date_from, $date_to)->download('report-orders.xlsx');
    }
}
