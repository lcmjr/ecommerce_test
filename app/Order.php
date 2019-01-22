<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'cpf',
        'phone',
        'email',
        'zip_code',
        'state',
        'city',
        'district',
        'address'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function totalValueItems()
    {
        $itens = $this->orderItems();
        return $itens->sum('total_price');
    }

    /**
     * Get Cpf
     *
     * @param  string $value
     *
     * @return string
     */
    public function getCpfAttribute($value)
    {
        return vsprintf('%s%s%s.%s%s%s.%s%s%s-%s%s', str_split($value));
    }

    /**
     * Get phone
     *
     * @param  string $value
     *
     * @return string
     */
    public function getPhoneAttribute($value)
    {
        $split = str_split($value);

        switch (strlen($value)) {
            case 11:
                $mask = '(%s%s) %s%s%s%s%s-%s%s%s%s';
                break;
            case 10:
                $mask = '(%s%s) %s%s%s%s-%s%s%s%s';
                break;
            case 9:
                $mask = '%s%s%s%s%s-%s%s%s%s';
                break;
            case 8:
                $mask = '%s%s%s%s-%s%s%s%s';
                break;
            default:
                $mask = '%s';
                $split = $value;
                break;
        }
        return vsprintf($mask, $split);
    }

    /**
     * Get Zip Code
     *
     * @param  string $value
     *
     * @return string
     */
    public function getZipCodeAttribute($value)
    {
        return vsprintf('%s%s%s%s%s-%s%s%s', str_split($value));
    }

    /**
     * return only the numbers of string
     *
     * @param  string $value
     *
     * @return string
     */
    private function getOnlyNumers($value)
    {
        return preg_replace('/\D/', '', $value);
    }

    /**
     * Set the user's first name.
     *
     * @param  string $value
     *
     * @return void
     */
    public function setCpfAttribute($value)
    {
        $this->attributes['cpf'] = $this->getOnlyNumers($value);
    }

    /**
     * Set the user's first name.
     *
     * @param  string $value
     *
     * @return void
     */
    public function setZipCodeAttribute($value)
    {
        $this->attributes['zip_code'] = $this->getOnlyNumers($value);
    }

    /**
     * Set the user's first name.
     *
     * @param  string $value
     *
     * @return void
     */
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = $this->getOnlyNumers($value);
    }
}
