# Pink Pastel Post Office

![Project Image](Images/project.png)

All members of this repo (Armando, Alexander, Derek, Sevilay, and Zachary) contributed equally to this project.

---

### Table of Contents
- [Description](#description)
- [How To Use](#how-to-use)
- [User Authentication](#user-authentication)
- [Data Entry Forms](#data-entry-forms)
- [Triggers](#triggers)
- [Data Queries](#data-queries)
- [Data Reports](#data-reports)
- [Old Backend Folder](#data-reports)

---

## Description

Our web application was constructed using the following tools and technologies listed below.

#### Tools and Technologies

- HTML
- CSS
- JavaScript
- PHP
- MySQL

[Back To The Top](#pink-pastel-post-office)

---

## How To Use

We recommend you visit our site online, which is hosted at [team10.online](https://team10.online/)

#### Installation
If you wish run this on localhost instead, you will need to install [XAMPP](https://www.apachefriends.org/index.html). Once XAMPP is intalled, you can open it and do the following to get this running:
- Under "General", click "Start" and take note of the IP Address assigned to you.
- Under "Services", click "Start All".
- Under "Network", enable either SSH port option.
- Under "Volumes", click "Mount". This will the IP Address to your Finder (mac) / File Explorer (windows).
- Follow the mounted directory until you see a folder called htdocs. Here you will drop our entire repo.
- Then you can type the IP Address assigned to you into your browser and navigate to the pages folder. For example, 192.168.64.2/COSC3380-PostOffice/root/pages

[Back To The Top](#pink-pastel-post-office)

---

## User Authentication

#### Registration

Once you enter our site, you can click on "REGISTER / SIGN IN" on the top right. You will be prompted to a login screen as shown in the image below. Click on "signup now" and fill out the registration form to create a customer account. For example, I will type in the following information to create an account for a new customer

- First Name: Edward
- Last Name: Elgar
- Email: edward@gmail.com
- Phone Number: 7138853697
- Create a Password: 123
- Confirm a Password: 123
- Building Number: 15
- Street Name: Brentway
- City: Austin
- State: Texas
- Zipcode: 99032

Once you click on "Sign Up" an account will be created for you and you can login. We have also created a test account for you if you'd like to skip registration and login. The login information is
- Email: customer@gmail.com
- Password: 123

![Project Image](Images/login.png)

Important Note
- All user passwords are hashed before being stored into the database for privacy reasons. You can see this in our code when a user is created in the functions.inc.php file inside of the includes folder.
- If you do not use the correct login information you will get an error message in red
- When registering for an account, validation is in place to make sure proper characters / numbers are used. If create a password and confirm password do not match, the account will not be created and you will be redirected to fix the information.

<img src="Images/login-error.png" alt="login-error" width="500"/>

Once you are logged in as a customer, you will see a "Customer Services" Link in your navigation bar on the top right. Clickin that will direct you the the customer control panel, which includes all functionality of a customer: viewing / editing their information, viewing package information, creating packages, and reporting packages as lost.

![Customer Services](Images/cust-services.png)

Employee accounts can only be created through an administrator, which we will showcase later, but below are example accounts that you can login to:
- employee@gmail.com
- admin@gmail.com

Both accounts are using the password 123 for simplicity

[Back To The Top](#pink-pastel-post-office)

---

## Data Entry Forms

#### Form Example 1
filler text filler text filler text filler text filler text filler text

[Back To The Top](#pink-pastel-post-office)

---

## Triggers

#### Trigger Example 1
filler text filler text filler text filler text filler text filler text

[Back To The Top](#pink-pastel-post-office)

---

## Data Queries

#### Data Query Example 1
filler text filler text filler text filler text filler text filler text

[Back To The Top](#pink-pastel-post-office)

---

## Data Reports


#### Data Report Example 1
filler text filler text filler text filler text filler text filler text

[Back To The Top](#pink-pastel-post-office)

## Data Reports


## Old Back End File
This file consists of routes and services that connect to the database and it's fully tested on POSTman to be working. Initially we wanted to create our backend in this direction but we changed strategy to use php instead. 

[Back To The Top](#pink-pastel-post-office)

