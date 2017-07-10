<?php
/**
 * Created by PhpStorm.
 * User: josegomez
 * Date: 23/02/2017
 * Time: 06:34 PM
 */

namespace catcoderphp\paypalEncrypt\widgets;

use yii\base\Widget;

class PaypalButton extends Widget
{
    public $amount;
    public $currency;
    public $orderDetails;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        parent::run(); // TODO: Change the autogenerated stub

        return $this->render("paypalButton", [
            "amount" => $this->amount,
            "currency" => $this->currency,
            "orderDetails" => $this->orderDetails
        ]);
    }
}