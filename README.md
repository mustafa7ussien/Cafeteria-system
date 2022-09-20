# Demo

![login](https://user-images.githubusercontent.com/77110627/191341025-dd5e29fc-bca2-4323-b67f-bd0a805d7893.PNG)
![home](https://user-images.githubusercontent.com/77110627/191341080-bf862266-94e7-447f-b3cf-36e1eb0caabf.PNG)
![user](https://user-images.githubusercontent.com/77110627/191341108-ef58795c-457e-45c3-a4d0-876fe3a76a88.PNG)
![product](https://user-images.githubusercontent.com/77110627/191341125-f0194021-bdb2-4a79-8ca5-057ffe30ea19.PNG)
![order](https://user-images.githubusercontent.com/77110627/191341145-e91ce3b8-c7f7-4e83-964f-29b16ee6460f.PNG)

//video





# Simply Cafeteria System Using Laravel

The system consists of Roles (Admin,User). Each one of them is granted to specific permissions.

Authentication :
1- Login to the site with Email and password
2- When click forget password, send link to email that when click redirect to new page to enter password and
confirm password.

User:

A=>
1- In the home page user select his order, images of the products
are clickable, when you click on it, item added. 2- + or – to add or
remove the count of the product you need in the notes; you can
specify any comment.
3- Rooms are displayed in combo box.
4- the money you should pay is displayed.
5- when you click confirm the order is sent.
6- Latest order is displayed on the top.
7- Drink price should be specified

B=>
1- User can view his/ her order with total price according to date
range specified.
2- Order status should in (Processing, out for delivery and done)
3- Only the orders with processing status can be canceled
when you click on the order, its content is displayed


Admin:

A=>
1-Admin create an order for a user selected from drop down

B=>
1-Admin can view all products and add remove them

C=>
1-Admin can view the users and edit, delete them also has a ref to add
user page.

D=>
1-Admin can product,
Product have categories
Admin clicks on add category-> redirect to a new page that
accept the name of the category.

E=>
1-Admin can check all the checks he has, according to the
specified date
And can select specific user.
if he doesn’t choose specific users, all users should be displayed
When you click on the username his order’s info during the
specified time period should be displayed.

F=>
1-Admin can check the current orders he have to finish as
described above.

## Installation
1- Download or Clone the project

2- Open the project in vs Code 

3- In a Terminal window run the following >>

```bash
composer update
```
```bash
composer i
```
```bash
npm i
```
```bash
create database name Cafeteria as type of utf8mb4_unicode_ci
```
```bash
npm run dev
```


4- Create new Schema in your DBMS, Assign it to "DB_DATABASE=" field in '.env' file, and set your DB Server information

5- Set These Values in ".env" file to test Verification using email
```bash
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=mostafyhussien@gmail.com
MAIL_PASSWORD=kldarcqrpkobznfn
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=castacode@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

6- Run the following to load DB & Seed Data
```bash
php artisan migrate
```
```bash
php artisan migrate:fresh
```
7- After All is Finished run
```bash
php artisan serve
```

## Notes



## Authors

- [@Mostafa Hussien Amin](https://github.com/mustafa7ussien)
- [@Mohamed Medhat](https://github.com/CoDeBrEaKe)
- [@Ahmed Omira](https://github.com/)
- [@Ahmed ElKazafy](https://github.com/)


