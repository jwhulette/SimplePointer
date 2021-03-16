# if you just cloned this repository, you can use this to setup some basics

# get to this script so commands run right
cd $(dirname $0)

# (re)build service images
docker-compose build

# start services detached
docker-compose up -d

# create an env file with keys if we don't have one
if [ ! -e .env ]; then
    cp .env.example .env
    # generate keys for PUSHER_APP_ID, PUSHER_APP_SECRET, PUSHER_APP_KEY
    for envItem in 'PUSHER_APP_ID' 'PUSHER_APP_SECRET' 'PUSHER_APP_KEY'
    do
        echo "Tackling $envItem"
        echo "sed -i -E \"s|$envItem=$|$envItem=$(tr -dc A-Za-z0-9 < /dev/urandom | head -c 13; echo '')|\" .env"
        sed -i -E "s|$envItem=$|$envItem=$(tr -dc A-Za-z0-9 < /dev/urandom | head -c 13; echo '')|" .env
    done
fi;

# create a sqlite file
touch storage/database.sqlite
chmod 755 storage/database.sqlite

# now inside the container stand things up with composer and npm. you'd test changes with the following three as well.
docker-compose exec app composer install
docker-compose exec app npm install
docker-compose exec app npm run dev

# put stuff in the db
docker-compose exec app php artisan migrate --seed

# and we have to get ownership of storage in line with server. local user won't be able to write but that shouldn't matter.
docker-compose exec app chown -R www-data:www-data /var/www/html/storage

# generate key
docker-compose exec app php artisan key:generate