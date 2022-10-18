<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

        /**
     * The uploads that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'file_extension',
        'file_original_name',
        'file_name',
        'file_size',
        'file_type',
    ];
}
