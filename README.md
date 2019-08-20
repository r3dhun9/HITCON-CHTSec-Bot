<p align="center"><img height="188" width="198" src="https://i.imgur.com/Lga8QZU.jpg"></p>
<h1 align="center">HITCON-CHTSec-Botman</h1>

> **This is a guideline about creating your own chatbot on facebook**
> **Author : Redhung aka r3dhun9**
>**Contact :**[Philip Chen (Facebook)](https://www.facebook.com/philip.chen.581)
## Installation (PHP >= 7.1.3)

```bash=
composer global require laravel/installer

composer global require "botman/installer"

composer create-project --prefer-dist botman/studio <directory>

php artisan botman:install-driver facebook
```

## Guideline - Step 1
First, create your own page on facebook.

![](https://i.imgur.com/9S6yQmv.png)

And then go to this website to login.

![](https://i.imgur.com/zCJRops.png)

Press the button to create your app and input your name.

![](https://i.imgur.com/EneXzil.png)

![](https://i.imgur.com/utCU2Lt.png)

Press "基本資料" and fill in the blanks.

> Notice: You can use https://www.privacypolicies.com/ to create a privacy page.
> Notice2: You can use https://ngrok.com/ to create a domain with **php artisan serve**.

![](https://i.imgur.com/esZ11bT.png)
![](https://i.imgur.com/fFgn2jo.png)

Press "+" button next to the "產品", and press "設定".

![](https://i.imgur.com/hN90wsn.png)

Add your own page.

![](https://i.imgur.com/U5HqEaO.png)

## Guideline - Step 2
Let's go back to our botman directory.

Edit **.env** and add these parameters below :

![](https://i.imgur.com/QMfrefo.png)

Press "產生權杖" to access your FACEBOOK_TOKEN :

![](https://i.imgur.com/DAZkEre.png)

Press "基本資料" and "顯示" to access your FACEBOOK_APP_SECRET :

![](https://i.imgur.com/VqAXM5h.png)

Last, enter your specific FACEBOOK_VERIFICATION to **.env** and go back to edit the **webhook**.

> Notice: We must add **/botman** after the url to call our chatbot.

![](https://i.imgur.com/slMKjhB.png)

![](https://i.imgur.com/moCivsP.png)

Okay, let's turn up the button and have fun !

![](https://i.imgur.com/eMm7XYe.png)

![](https://i.imgur.com/8F32O1d.jpg)

