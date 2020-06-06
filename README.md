# LaravelLearn
> Learn Laravel website development

## Develop
1. First time you need install [Composer](https://getcomposer.org/).
Then in root dir run:
`composer install`
2. Rename `.env.example` to `.env` in project root dir, then change the DB options
3. Run commend `php artisan key:generate` to generate app key.
4. When completed:
`php artisan migrate:fresh`
## Run
`composer artisan serve`
## Attention
If you are using Linux or macOS, you need to create a soft link in the `public` folder(Because the user avatar is stored in `storage/app`.):
```
$ pwd
laravelLearn/public
$ ln -s ../storage/app/ storage
```
