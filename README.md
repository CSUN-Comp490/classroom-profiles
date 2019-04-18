# Classroom-Profiles
[![Build Status](https://cloud.drone.io/api/badges/CSUN-Comp490/classroom-profiles/status.svg?branch=dev)](https://cloud.drone.io/CSUN-Comp490/classroom-profiles)

## How to get started with the project
COMP491/CIT481 Senior Design project. This application will navigate students to their respective classes based on their schedule and more!

## How to get started with the project

### Prerequisites 
Make sure you have the following:
- [Git](https://guides.github.com/activities/hello-world/)
- A terminal
- [Docker](https://www.docker.com/get-started)
- [Docker-Compose](https://docs.docker.com/compose/install/)
- [Composer](https://getcomposer.org/doc/00-intro.md)
- [NPM](https://www.npmjs.com/get-npm) or [Yarn](https://yarnpkg.com/lang/en/docs/install/)

### Bootstrapping a freshly cloned project
1. Clone the repo into your projects folder with your terminal using `git clone https://github.com/CSUN-Comp490/classroom-profiles.git` and change directory into the project `cd classroom-profiles`
2. Run `composer install` on the terminal
3. Run `yarn` or `npm install` to grab Frontend packages
4. Copy the .env.example as a .env file with `cp .env.example .env` If you're using the database, ask your Ops person for the proper .env file
5. Run `php artisan key:generate`
6. Now run `docker-compose up -d` to start your local dev environment
7. Visit `http://localhost:8080` to view the project

**Tip: When you're done developing, run `docker-compose down` to stop your environment**
