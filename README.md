## Integrate EazyAuth with Laravel
This repository consists of sample code to integrate EazyAuth to Laravel. Visit https://eazyauth.com or https://www.youtube.com/watch?v=buw9inQ1HWc for details.

## What is EazyAuth
EazyAuth makes 2 factor authentication easy. It provides a set of APIs to authenticate your users through one time passwords sent by email.

## Why Use EazyAuth
- Works on all devices.
- Secure
- Maintains Privacy
- Simple
- Economical
- Ensures peace of mind

## How It Works
It's Easy - just 2 APIs
1. Call EazyAuth Find User API - it finds the user record based on the email address and even creates one if it doesn't already exist. An email is sent to the user with a random one time secret. The secret is not stored anywhere, even in our database. (Hint: it's stored as a hash).
2. Once the user enters the one time secret, call EazyAuth Verify User API to determine if the user is verified or not. At this point, your app / site can decide how to proceed.

## Steps to Integrate with Laravel
To get started, login to eazyauth.com and get your integration id / secret key

Next, create a basic laravel project. Skip if integrating to an existing project.
1. Create your project using command - laravel new yourproject
2. Change directory to your project - cd yourproject
3. Optional step - Prepare for frontend scaffolding - composer require laravel/ui
4. Optional step - Add bootstrap scaffolding - php artisan ui bootstrap
5. Optional step - Complete frontend scaffolding - npm install && npm run dev
At this point, a basic laravel site should be working.

Now we integrate EazyAuth to the laravel website
1. Create EazyAuthLogin controller using command - php artisan make:controller EazyAuthLoginController - and add code to it from this repository.
2. Add Views eazyauthlogin.layout, eazyauthlogin.login and eazyauthlogin.verify and add code to it from this repository.
3. Add three routes (get /login, post /login, post /verify) to routes/web.php using code from this repository.
4. Add a login link to the welcome view
That's it. You have linked EazyAuth to Laravel.
