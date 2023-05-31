<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute; 
use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

    const STATUS = [
        1 => [ 'label' => '未着手', 'class' => 'bg-red-300' ],
        2 => [ 'label' => '着手中', 'class' => 'bg-green-300' ],
        3 => [ 'label' => '完了', 'class' => '' ],
    ];

    /*public function getStatusLabelAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }*/

    public function statusLabel(): Attribute // laravel9からの書き方
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }
        return new Attribute(
            // アクセサ 
            get: fn () => self::STATUS[$status]['label'],
        );
    }
    
    public function statusClass(): Attribute
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }
        return new Attribute(
            // アクセサ 
            get: fn () => self::STATUS[$status]['class'],
        );
    }

    public function formattedDueDate(): Attribute
    {
        return new Attribute(
            // アクセサ 
            get: fn () => Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])->format('Y/m/d'),
        );
    }
}
