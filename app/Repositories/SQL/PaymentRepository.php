<?php

namespace App\Repositories\SQL;

use App\Models\Payment;
use App\Repositories\Contracts\PaymentContract;


class PaymentRepository extends BaseRepository implements PaymentContract
{
    public function __construct(Payment $model)
    {
        parent::__construct($model);
    }
}
