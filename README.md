Paypal Button Encrypted
==============
Button encrypted to make secure payments

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist catcoderphp/yii2-paypal-encrypt-button "*"
```

or add

```
"catcoderphp/yii2-paypal-encrypt-button": "*"
```

to the require section of your `composer.json` file.


Usage
-----

On your config.php file, config like this one component  :

```php
 'paypalEncrypt' => [
            'class' => \catcoderphp\paypalEncrypt\PaypalEncrypt::className(),
            'paypalCertificateId' => 'CFUVS7MAK5JRW ',
            'paypalCertificatePath' => "/$YOUR_CERTS_PATH/paypal_cert_pem_real.pem",
            'publicSSLKeyPath' => "/$YOUR_CERTS_PATH/pubcert.pem",
            'privateSSLKeyPath' => "/home/catcoder/sites/boca_live/prvkey.pem",
            'successUrl' => "https://".$_SERVER['SERVER_NAME']."/",
            'failUrl' => "https://".$_SERVER['SERVER_NAME']."/",
            'businessEmail' => "catcoder.py@gmail.com",
            "isProduction" => true,
  ],
```
