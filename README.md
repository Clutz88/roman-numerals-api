# Roman Numerals Tech Task
This development task is based on the simple process of converting Roman numerals. This task requires you to build a JSON API and so any HTML, CSS or JavaScript that is submitted will not be reviewed.

## Brief
Our client (Numeral McNumberFace) requires a simple RESTful API which will convert an integer to its Roman numeral counterpart. After our discussions with the client, we have discovered that the solution will contain three API endpoints, and will only support integers ranging from 1 to 3999. The client wishes to keep track of conversions so they can determine which is the most frequently converted integer, and the last time this was converted. The client would also like to use an Artisan command on the command line to allow them to have a provided number converted to Roman numeral.

### Endpoints Required
1. Accepts an integer, converts it to a Roman numeral, stores it in the database and returns the response.
2. Lists all the recently converted integers.
3. Lists the top 10 converted integers.

### Commands Required
1. Accepts an integer argument, appropriately named, that will store the converted Roman numeral and present it to the command line user.

## What we are looking for
- Use of MVC components (View in this instance can be, for example, a Laravel Resource).
- Use of [Laravel Resources](https://laravel.com/docs/eloquent-resources)
- Use of Laravel features such as Eloquent, Requests, Validation, and Routes.
- An implementation of the supplied interface.
- Appropriate logging and exception handling.
- The supplied PHPUnit test passing and any other tests you consider worthwhile being added.
- Clean code, following PSR-12 standards.
- Use of PHP 8.3 features where appropriate.

This list is our expectation of your approach, but it is not exhaustive. You are free, at your own discretion, to demonstrate your skills to us relating to Laravel, PHP, Testing, API Development, and more.

Please also include a short explanation of your approach, including any design decisions you have made and the reasons for those decisions. While we do not believe it necessary to use any third party libraries, please document and explain your reasoning for using any libraries you choose to use.

## Submission Instructions
Please create a [git bundle](https://git-scm.com/docs/git-bundle/) and send the file across:
```
git bundle create <yourname>.bundle --all --branches
```

## My approach
My approach was to save each conversion as a separate entry in the database. While this has the side effect of increasing the size of the 
database table, it means that the latest endpoint can return the same number if it has been request multiple times. 
If the last five requests were all for "12" then the first five in the latest will be "12".

I made both the API endpoint and the command call an action, this action then calls the convert service and saves its result to the database.
Using an action keeps the service purely about converting a number and doesn't mix in Laravel models, while ensuring that we don't
need to add saving into everywhere that uses the service.

I added some more tests to ensure that both the service is covered by a unit test and that the endpoints and command are covered by feature tests.
With testing I would normally use Pest as it has taken over PHPUnit as the standard go to for new Laravel projects, I decided to stick with PHPUnit as it had
already been installed and configured in this codebase.

To ensure ease of use with the laravel command, it can be run by both providing a number such as 
`php artisan convert:number 10` or you can call the command without any input `php artisan convert:number` and Laravel Prompts will then prompt the user for the number.
The output isn't styled and doesn't contain any extra output, as it might be to be piped into another command, and any extra characters would cause issues with that.

To add API documentation that's always up to date, and easy to configure, I installed the package `dedoc/scramble` as this generates an OpenAPI spec, and 
documentation pages, I then changed the index of the project to redirect to the documentation pages.


