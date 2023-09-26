
# Ratebird-api

Ratebird-api is the backend server application for the ratebird app.   The ratebird app is used for ranking and following your favorite anime/manga.

## How to run the app
1. Clone the project `git clone https://github.com/nstanev255/ratebird-api`.
2. Run `composer install` in order to install the needed packages.
3. Boot up the composer containers with `docker composer up` into the root of the project.
4. Run `php artisan migrate`, in order for the tables to come up.
5. Seed the data with `php artisan db:seed` in order to seed the taxonomies. (Taxonomies are basically enum values).
6. Spin up a [jikan instance](#how-to-run-with-docker), [run remotely](#how-to-run-remotely), or [run manually](#how-to-run-manually).
6. After jikan is up, you can run `php artisan serve`, in order for the local dev server to be started.
7. (Optional) You can also setup a apache server and run the app from there.

## Jikan
[Jikan](https://github.com/jikan-me/jikan-rest) is an open source **Unofficial** myanimelist api, which is used for resource gathering for this app. It is basically a webcrawler with caching features + elasticsearch/typesense support.

#### How to run with docker
1. Go into the `/jikan` folder and run `docker compose up`, this will start up the needed docker containers.
2. After that you can `artisan migrate` to prepare the mongodb databse `docker exec php artisan migrate -it jikan-1`, for example.
3. In order for the indexer to start (basically have the caching and the endpoints up and running) you need to `exec` some commands into the container. \
4. For example you can run : `sudo docker exec php artisan -it jikan-1` to see all the available commands and choose under the `indexer` commands which you want. You can start with `sudo docker exec php artisan indexer:anime-current-season -it jikan-1` and go from there. This command will index all the animes from the current season.\
***NOTE: The indexing will take alot of time...***

#### How to run manually
Jikan has an extensive guide which you an read [here](https://github.com/jikan-me/jikan-rest/wiki/Installation).\
This method may be needed if you don't have enough RAM and the indexing keeps breaking.\
You will need to run the same `php artisan indexer` commands for this approach as well.

#### How to run remotely
If you don't want to install jikan, but still want to run the api you can just point the `jikan.base_url` config to `https://api.jikan.moe/v4/`. The config can be found under `app/config/services.php` file and changed from there.

***Note: This approach may cause some endpoints to stop working, as we are being rate-limited.*** 
