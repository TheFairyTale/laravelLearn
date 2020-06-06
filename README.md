# LaravelLearn
> Learn Laravel website development

## Develop
First time you need install [Composer](https://getcomposer.org/).
Then in root dir run:
`composer install`
## Run
`composer artisan serve`
## Attention
If you are using Linux or macOS, you need to create a soft link in the `public` folder(Because the user avatar is stored in `storage/app`.):
```
$ pwd
laravelLearn/public
$ ln -s ../storage/app/ storage
```
