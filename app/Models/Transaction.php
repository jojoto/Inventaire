<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public static function createTransaction($item_id, $category_id, $department, $unit, $employee)
    {
        Transaction::insert([
            'item_id' => $item_id,
            'category_id' => $category_id,
            'department_id' => Department::idFromName($department),
            'unit_id' => Unit::idFromName($unit),
            'employee_id' => Employee::where('name', $employee)->get('id')[0]->id,
        ]);
    }
}
