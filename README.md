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

How to create the certs
-----
Generate your private key and public certificate.

Manual Creation - Generate a Private Key 1024 bytes long
```php
openssl genrsa -out my-prvkey.pem 1024

my-prvkey.pem is your private key.
```

Manual Creation - Generate public certificate good for 1 year
```php
openssl req -new -key my-prvkey.pem -x509 -days 365 -out my-pubcert.pem
```
my-pubcert.pem is your public signing certificate. Remember that your certificate is only valid for 365 days with this command, you should recreate your key and certificate every year.


Configure paypal
-----

To upload your public certificates to PayPal:
-----


1. Log in to your Business or Premier account.
2. Click the Profile subtab. 
3. In the Seller Preferences column, click Encrypted Payment Settings. 
4. Click Add. 
5. Click Browse, and select your public certificate file "my-pubcert.pem". 
6. When your public certificate is successfully uploaded, it appears on the next screen under Your Public Certificates. 
7. Record the Cert ID, you'll need to include this in any encrypted data.


Download the PayPal Public Certificate
-----
You use PayPal's public certificate to encrypt your button code. To download PayPal's public certificate: 

1. Log in to your Business or Premier account.
2. Click the Profile subtab. 
3. In the Seller Preferences column, click Encrypted Payment Settings. 
4. Click Download in the PayPal Public Certificate area. 


Block unencrypted payment buttons
-----
You can prevent malicious users from submitting made up unencrypted buttons by blocking unencrypted payments. You should probably have everything working before you complete this step or your current payment buttons may become broken.


1. Log in to your Business or Premier account.
2. Click the Profile subtab. 
3. Click the Website Payment Preferences link in the right-hand menu. 
4. Select On next to Block Non-encrypted Website Payments. 
5. Click Save.
Step 5: Generate your own payment buttons.


Usage
-----

On your config.php file, config like this one component  :

```php
 'paypalEncrypt' => [
            'class' => \catcoderphp\paypalEncrypt\PaypalEncrypt::className(),
            'paypalCertificateId' => 'CFUVS7MAK5JRW ',
            'paypalCertificatePath' => "/$YOUR_CERTS_PATH/paypal_cert_pem_real.pem",
            'publicSSLKeyPath' => "/$YOUR_CERTS_PATH/pubcert.pem",
            'privateSSLKeyPath' => "$YOUR_CERTS_PATH/prvkey.pem",
            'successUrl' => "https://".$_SERVER['SERVER_NAME']."/",
            'failUrl' => "https://".$_SERVER['SERVER_NAME']."/",
            'businessEmail' => "THE PAYPAL BUSINESS EMAIL",
            "isProduction" => true, // IF FALSE, PAYPAL REDIRECTS TO SANDBOX ACCOUNT, ELSE TO REAL PAYPAL SITE
  ],
```
Once the configuration is set, simply use it in your code by :
```php

 <?= \catcoderphp\paypalEncrypt\widgets\PaypalButton::widget([
            "amount" => 100.50,
            "currency" => "USD",
            "orderDetails" => "PAYMENT DETAILS"
 );?>
```
