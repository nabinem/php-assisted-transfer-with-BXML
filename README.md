# php-assisted-transfer-with-BXML
This example app shows how to implement a simple assisted transfer flow using BXML.

Prereqs:
<list>
<li>A working PHP development environment, including composer</li>
<li>A Bandwidth App Platform account (see here to sign up)</li>
<li>A Heroku account</li>
</list>

Pull down the repo:

```sh
$ git clone git@github.com:heroku/php-assisted-transfer-with-BXML.git # or clone your own fork
$ cd php-assisted-transfer-with-BXML
$ composer update
```

Update the credentials by editing the web/recording_handler.php file and replacing the token:secret with your own App Platform token and secret. Edit the web/assisted_transfer.php file and change the $to variable to the phone number you want to transfer call to.

Create an heroku app:
```sh
$ create heroku
```
Deploy to heroku:
```sh
$ git add .
$ git commit -m "initial deployment"
$ git push heroku master
```
This will show the name of your app as follows:

remote:        https://<app-name>.herokuapp.com/ deployed to Heroku

Use that url to create an application in the App Platform dev console. Paste the heroku url in the Call Url field and add the php file /assisted_transfer.php. It will look like the following:

<TODO image here />

Now add a phone number to the app.

When you call the phone number, you'll go through the full call flow.
