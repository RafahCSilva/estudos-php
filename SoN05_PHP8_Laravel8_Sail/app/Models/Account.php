<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Account
 *
 * @property int $id
 * @property string $title
 * @property int $agency
 * @property int $account_number
 * @property float $balance
 * @property float $balance_initial
 * @property int $bank_id
 * @property string|null $bank_image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Bank $bank
 * @method static \Illuminate\Database\Eloquent\Builder|Account newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Account newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Account query()
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereAgency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereBalanceInitial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereBankImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';
    protected $fillable = [
        'title',
        'agency',
        'account_number',
        'balance',
        'balance_initial',
        'bank_id',
        'bank_image'
    ];
    protected $casts = [
        'title'           => 'string',
        'agency'          => 'integer',
        'account_number'  => 'integer',
        'balance'         => 'float', // 'decimal,2',
        'balance_initial' => 'float', // 'decimal,2',
        'bank_id'         => 'integer',
        'bank_image'      => 'string',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
