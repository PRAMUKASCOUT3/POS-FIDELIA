<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function dashboard()
{
    $completedPercentages = [];
    $totalTransactionCodes = [];
    $months = [];

    // Loop through the last 12 months for chart data
    for ($i = 11; $i >= 0; $i--) {
        $startOfMonth = now()->subMonths($i)->startOfMonth();
        $endOfMonth = now()->subMonths($i)->endOfMonth();

        $totalTransactions = Transaction::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->distinct('code')
            ->count('code');

        $totalTransactionCodes[] = $totalTransactions;
        $completedPercentages[] = $totalTransactions > 0 ? $totalTransactions : 0;
        $months[] = $startOfMonth->format('M');
    }

    // Calculate data for the current month
    $startOfCurrentMonth = now()->setTimezone('Asia/Jakarta')->startOfMonth();
    $endOfCurrentMonth = now()->setTimezone('Asia/Jakarta')->endOfMonth();

    // Penjualan bulan ini
    $salesThisMonth = Transaction::whereBetween('created_at', [$startOfCurrentMonth, $endOfCurrentMonth])
        ->sum('subtotal');

    // Pengeluaran bulan ini
    $expensesThisMonth = Expenditure::whereBetween('date', [$startOfCurrentMonth, $endOfCurrentMonth])
        ->sum('nominal');

    // Penjualan bersih bulan ini
    $netSalesThisMonth = $salesThisMonth - $expensesThisMonth;

    // Pass data to the dashboard view
    return view('dashboard', compact(
        'completedPercentages',
        'totalTransactionCodes',
        'salesThisMonth',
        'expensesThisMonth',
        'netSalesThisMonth',
        'months'
    ));
}


    public function report()
    {
        $users = User::where('isAdmin', 0)->paginate(10);
        return view('user.laporan', compact('users'));
    }

    public function generatePDF()
    {
        $data = [
            'title' => 'Laporan Pengguna/Kasir',
            'user' => User::where('isAdmin', 0)->get(),
        ];
        $pdf = PDF::loadView('user.print', $data);
        return $pdf->download('Laporan_Pengguna_Kasir.pdf');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('pengguna.index')->with('success', 'Data Berhasil Dihapus');
    }
}
