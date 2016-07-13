# php-assisted-transfer-with-BXML
This project is provided as an example on how to how to implement a simple assisted transfer flow using Bandwidth XML (BXML). The following features are demonstrated:

* Using BXML for inbound call handling
* Using BXML to make an outbound call
* Using BXML to manage separate call flows for different call legs
* Using BXML to conference separate call legs together

## Before you start, make sure that you have the following:

* A working PHP development environment, including composer
* A Bandwidth App Platform account (see [here](https://catapult.inetwork.com/pages/signup.jsf) to sign up)
* A Heroku account

## First, get the code

Pull down the repo as follows:

```sh
$ git clone https://github.com/BandwidthExamples/php-assisted-transfer-with-BXML.git # or clone your own fork
$ cd php-assisted-transfer-with-BXML
$ composer update
```

## Next, modify the code with your App Platform Account info

Update the credentials by editing the web/recording_handler.php file and replacing the token:secret with your own App Platform token and secret. Edit the web/assisted_transfer.php file and change the $to variable to the phone number you want to transfer the call to.

# And deploy it

## Using Heroku

Create an Heroku app:

```sh
$ heroku create
```
And deploy it:

```sh
$ git add .
$ git commit -m "initial deployment"
$ git push heroku master
```
This will show the name of your app as follows:
 ```sh
remote:        https://<app-name>.herokuapp.com/ deployed to Heroku
```

## Using Docker

Make sure you have the [Docker Engine](https://docs.docker.com/engine/installation/) running on a publicly available host. 

```sh
# build your Docker image 
$ docker build -t bandwidthapp . 

# run your application
$ docker run -d -P bandwidthapp 

# check what port port 80 was exposed to (probably something in the 32-thousand range)
$ docker ps -l
```

## Create an App Platform application to route inbound calls to your app

First you'll want to get a phone number. See [here] (http://ap.bandwidth.com/docs/how-to-guides/buying-new-phone-numbers/) for ways to buy a phone number. 

Next, use the publicly available of your app to create an application in the App Platform dev console. See [here] (http://ap.bandwidth.com/docs/how-to-guides/configuring-apps-incoming-messages-calls/) for a detailed example of how to set up an application. Paste the url in the Call Url field and append the php file, *assisted_transfer.php*, to it. It will look something like https://hidden-oasis-7486.herokuapp.com/assisted_transfer.php or http://yourhost:32443/assisted_transfer.php.

![App screenshot](https://github.com/BandwidthExamples/php-assisted-transfer-with-BXML/blob/master/appscreenshot.png)

# VERY IMPORTANT - Make sure that the Callback HTTP method is set to GET. This tells the App Platform to retrieve XML from the url. 

Now add a phone number to the app by clicking the Add Phone Number button and selecting your phone number. 

Now just call the number and you'll see BXML in action.
