<?php $encrypted = Yii::$app->paypalEncrypt->getButtonCode($amount, $currency, $orderDetails);?>
<form action="<?= Yii::$app->paypalEncrypt->paypalURL;?>" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="encrypted" value="<?php echo $encrypted; ?>">
    <input type="image" src="https://www.paypalobjects.com/webstatic/es_MX/mktg/logos-buttons/redesign/btn_10.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online." class="center-block">
    <img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>