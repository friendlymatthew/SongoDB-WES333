# _WELCOME TO COMP333 BACKEND_

#### Written by Nelson Lin Matthew Kim

# Instructions

Precursor:
Install virtual environment dependencies

pip3 install Django

## Step One
cd into root project directory

## Step Two 
for mac:
    run: `source my-venv/Scripts/activate`

for windows:
    run: `my-venv/Scripts/activate`


## Step Three
run: python3 manage.py runserver


## Step Four
paste development server into browser:
[local](http://127.0.0.1:8000/music/)


# Project Blueprint

comp333_backend
|
| django_db
    - urls.py (routed /music/ with music view)
| music
    - ...
    - static
        - style.css (stylesheet for forms.html)
    - templates
        - forms.html (form template for endpoints)
    - admin.py (registered models)
    - forms.py (created form models for each endpoint)
    - models.py (created Table Models)
    - urls.py (routed html_view)
    - views.py (set up rendering for each endpoint)


#### This project was made for Software Engineering class, COMP333. 


