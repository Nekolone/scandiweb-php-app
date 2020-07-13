# Online web shopping application
# Author
Nikolajs Kottcov,
TSI 3rd year student
## Used technologies
* Languages: HTML, JavaScript, PHP 
* Database: MySQL
* Web server: Apache HTTP
* Deployment platform: Docker 
## Deployment instructions
1. Install Docker desktop
2. In command line (in the directory with the Dockerfile), build docker image:<br>
`docker build -t application .`
3. Run image, using port 8084:<br>
Shell/Bash and PowerShell:
`docker run -p 8084:80 -v ${PWD}:/app application `<br>
Windows CMD:
`docker run -p 8084:80 -v%cd%:/app application`<br>
4. Go to browser and look up `localhost:8084`

Upon startup, admin password will be generated and given in this message:
>You can now connect to this MySQL Server with $PASS

