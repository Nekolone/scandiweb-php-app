# Online web shopping application
# Author
Nikolajs Kottcov,
TSI 3rd year student
## Used technologies
* Languages: HTML, JavaScript, PHP 
* Database: MySql 
* Web server: Apache HTTP
* Deployment platform: Docker 
## Deployment instructions
1. Install Docker desktop
2. In command line (in the directory with the Dockerfile), build docker image:<br>
`docker  build -t app .`
3. Run image, publishing port 80:<br>
`docker run -p 80:80 app`

Upon startup, admin password will be generated and given in this message:
>You can now connect to this MySQL Server with $PASS

