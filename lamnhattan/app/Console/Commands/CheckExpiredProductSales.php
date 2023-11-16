<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\productsale;
use Carbon\Carbon;

class CheckProductSales extends Command
{
    protected $signature = 'productsale:check';
    protected $description = 'Check and delete product sales where end_date has passed the current time';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $currentDateTime = Carbon::now();

        // Lấy tất cả các productsale có end_date đã qua thời gian hiện tại
        $productSalesToDelete = productsale::where('end_date', '<=', $currentDateTime)->get();

        // Xóa các productsale đã qua thời gian
        foreach ($productSalesToDelete as $productSale) {
            $productSale->delete();
        }

        $this->info('Checked and deleted product sales successfully.');
    }
}
