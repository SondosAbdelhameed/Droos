<?php
namespace App\Http\Traits;
use App\Models\Invoice;
trait SaveInvoice {
    public function saveInvoice($student_id, $group_id, $type, $price)
    {
        Invoice::create(['student_id' => $student_id, 'group_id' => $group_id, 'type' => $type, 'price' => $price]);
    }
}