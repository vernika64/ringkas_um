<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    // use HasFactory;
    private static $isikoran = [
        [
            'judul'             => 'ASUS STRIX RTX 3090',
            'alias'             => 'rog-rtx3090',
            'isi'               => 'VGA GREGET!'
        ],
        [
            'judul'             => 'GIGABYTE AORUS RTX 3060',
            'alias'             => 'aorus-rtx3060',
            'isi'               => 'VGA GREGET!'
        ],
        [
            'judul'             => 'ASUS DUAL GTX 1650 Super',
            'alias'             => 'asus-dualgtx1650',
            'isi'               => 'VGA GREGET!'
        ],
    ];
}
