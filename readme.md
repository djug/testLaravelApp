#twitterTestApp

This is just a simple (test) laravel app that allows a user to register / login and then link her twitter account to her account on the app.

The app allows the user to create a simple profile `profile/create` on the app (name, country and address). Currently the app doesn’t support editing the profile after creating it (it just needs some form model binding to make it editable).

The app also show the user twitter profile, the `/twitter` route:

 - The first part (named twitter) is retrieved from the DB, these information are retrieved via the Twitter API and persisted on the DB. 
 - The second part showcases how we can use twitter API, in this case we retrieve the user profile via the twitter API.
 
#How to use the app

Firstly, you need to create a twitter app from here:
https://apps.twitter.com/app/new

get the **access token** and the **Access Token Secret** and update the .env file:

    TWITTER_CONSUMER_KEY=[put twitter consumer here]
    TWITTER_CONSUMER_SECRET=[put twitter consumer  secret here]

you need of course to set up a database as well:

    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret

after that, all what you need to do, it to execute:

    php artisan serve

and you are good to go.
the app will be available here: http://localhost:8000/

