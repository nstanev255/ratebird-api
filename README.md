
# Ratebird-api

Ratebird-api is the backend server application for the ratebird app.   The ratebird app is used for ranking and following your favorite anime/manga.

## How to run the app
1. In order for the api to work you firstly need to spin up a jikan instance.
2. You need to start the ratebird-api
   1. You need to run `composer install` in order to install the needed packages.
   2. After the jikan instance is up, you can run `php artisan serve`, in order for the local dev server to be started.
   3. (Optional) You can also setup a apache server and run the app from there.
## Jikan
[Jikan](https://github.com/jikan-me/jikan-rest) is an open source **Unofficial** myanimelist api, which is used for resource gathering for this app. It is basically a webcrawler with caching features + elasticsearch/typesense support.

#### How to run with docker
The easiest way to spin up the Jikan instance locally is to go into the `/jikan` folder and run `docker composer up`.
This will spin up a jikan container + a mongodb database instance. \
After that you can `artisan migrate` to prepare the mongodb databse `docker exec php artisan migrate -it jikan-1`, for example.
In order for the indexer to start (basically have the caching and the endpoints up and running) you need to `exec` some commands into the container. \
For example you can run : `sudo docker exec php artisan -it jikan-1` to see all the available commands and choose under the `indexer` commands which you want. You can start with `sudo docker exec php artisan indexer:anime-current-season -it jikan-1` and go from there. This command will index all the animes from the current season.\
***NOTE: The indexing will take alot of time...***

#### How to run manually
Jikan has an extensive guide which you an read [here](https://github.com/jikan-me/jikan-rest/wiki/Installation).\
This method may be needed if you don't have enough RAM and the indexing keeps breaking.\
You will need to run the same `php artisan indexer` commands for this approach as well.

#### How to run remotely
If you don't want to install jikan, but still want to run the api you can just point the `jikan.base_url` config to `https://api.jikan.moe/v4/`. The config can be found under `app/config/services.php` file and changed from there.

***Note: This approach may cause some endpoints to stop working, as we are being rate-limited.*** 
