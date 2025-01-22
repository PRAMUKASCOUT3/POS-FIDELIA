<?php

namespace App\Livewire\Cashier;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CashierTable extends Component
{
    public $items = [];
    public $subtotal = 0;
    public $amount_paid;
    public $total_item = 0;
    public $date;
    public $status = 'pending';
    public $change = 0;

    public $products;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function mount()
    {
        $this->date = now()->toDateTimeString(); // Set tanggal transaksi
    }

    public function calculateSubtotal()
    {
        $this->subtotal = array_reduce($this->items, function ($carry, $item) {
            return $carry + ($item['price_sell'] * $item['stock']);
        }, 0);

        $this->total_item = count($this->items);
    }
    public function addItem($productId)
    {
        $product = Product::find($productId);
        $this->items[] = [
            'id' => $product->id,
            'name' => $product->name,
            'price_sell' => $product->price_sell,
            'stock' => 1,
        ];

        $this->calculateSubtotal();
    }
    public function updateQuantity($index, $stock)
    {
        $this->items[$index]['stock'] = $stock;
        $this->total_item = collect($this->items)->sum('stock');
        $this->calculateSubtotal();
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items); // Reindex array
        $this->calculateSubtotal();
    }

    public function saveTransaction()
    {
        // Validasi jika keranjang kosong
        if (empty($this->items)) {
            toastr()->error('Keranjang tidak boleh kosong!');
            return;
        }

        // Hapus format Rupiah dari amount_paid
        $amountPaid = $this->removeRupiahFormat($this->amount_paid);

        // Validasi pembayaran
        if ((float) $amountPaid < $this->subtotal) {
            toastr()->error('Jumlah pembayaran tidak cukup!');
            return;
        }

        foreach ($this->items as $item) {
            $cashier = Transaction::create([
                'code' => 'TRX-' . now()->timestamp, // Kode transaksi unik
                'user_id' => Auth::id(),
                'product_id' => $item['id'], // Mengambil ID produk dari item yang diiterasi
                'date' => now(), // Menggunakan waktu sekarang sebagai tanggal transaksi
                'total_item' => $item['stock'], // Menyimpan jumlah item per produk
                'subtotal' => $item['price_sell'] * $item['stock'], // Subtotal per item
                'amount_paid' => $amountPaid, // Gunakan nilai tanpa format
                'status' => 'completed',
            ]);

            // Update stok produk
            $product = Product::find($item['id']);
            if ($product->stock >= $item['stock']) {
                $product->stock -= $item['stock'];
                $product->save();
            } else {
                throw new \Exception('Stok tidak cukup untuk produk: ' . $product->name);
            }
        }

        // Menyimpan detail transaksi dalam sesi untuk pencetakan
        session(['transaction' => [
            'items' => $this->items,
            'subtotal' => $this->subtotal,
            'amount_paid' => $amountPaid,
            'change' => $amountPaid - $this->subtotal,
        ]]);

        

        // Reset form
        $this->reset(['items', 'subtotal', 'amount_paid']);

        // Redirect ke halaman cetak
        return redirect()->route('cashier.print')->with('success','Transaksi Berhasil');
    }



    public function clear()
    {
        $this->reset(['items', 'subtotal', 'amount_paid', 'total_item']);
    }


    public function calculateChange()
    {
        // Hapus format sebelum kalkulasi
        $amountPaid = $this->formatRupiah($this->amount_paid, false);
        $this->change = (float) $amountPaid - (float) $this->subtotal;
    }

    public function updatedAmountPaid()
    {
        // Hapus format sebelum menyimpan
        $this->amount_paid = $this->formatRupiah($this->amount_paid, false);

        // Terapkan kembali format Rupiah
        $this->amount_paid = $this->formatRupiah($this->amount_paid);

        // Hitung kembalian
        $this->calculateChange();
    }

    private function formatRupiah($value, $formatted = true)
    {
        if ($formatted) {
            // Pastikan nilai diubah menjadi float sebelum diformat
            $value = (float) str_replace(',', '.', preg_replace('/[^\d]/', '', $value)); // Ubah menjadi angka
            return number_format($value);
        }

        // Hapus format Rupiah
        return preg_replace('/[^\d]/', '', $value);
    }


    private function removeRupiahFormat($value)
    {
        return preg_replace('/[^\d]/', '', $value); // Hapus semua karakter kecuali angka
    }

    public function updatingSearch()
    {
        // Reset pagination when search input is updated
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.cashier.cashier-table', [
            'product' => Product::where('name', 'like', '%' . $this->search . '%')
                ->paginate(5)
        ]);
    }
}
