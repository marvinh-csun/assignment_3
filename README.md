## Assignment 3
## Part 0 Installation
## Step 1. Make sure you have docker installed and install php composer 
```
https://getcomposer.org/doc/00-intro.md

```
## inside root directory of this project
```
composer install
```
## Step 2. Go to the root directory
run
```
./vendor/bin/sail up
``` 
This should create a mysql instance along with a laravel backend api available at localhost:8091
Step 3.
To create the business table run
```
./vendor/bin/sail artisan make:migrate
```
Step 4.
To add the yelp data set into the table run
```
./vendor/bin/sail artisan db:seed --class=BusinessSeeder
```
## Part 1 Backend
Build out the rest of the endpoint started for you at this route. Do backend first then think of a method to display this on a front end framework posting your search results while paginating the data and ordering by the various field in the database. Do not do client side pagination order sorting only server side.
```
routes/api.php
Route::post('/business/search',function(Request $request){
    //TODO your api
    //https://laravel.com/docs/10.x/queries#main-content
    $search_param = $request->input('search_param');

    $businesses = Business::
    where('name','like',"%{$search_param}%")
    ->limit(10)
    ->get();

    return response($businesses);
});
```
## Part 2 Frontend
Create a frontend for this api endpoint
sorting and searching what ever fields you find interesting try to do at least to or 3 search fields
Make sure to paginate your data. Returning only 25-100 entries max at a time.

## You dont have to user larevel for your api but this is the quickest way to seed a database instance with yelp data which will then be available to you through docker
