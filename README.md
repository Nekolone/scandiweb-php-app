# PHP Web Application
# Author
Nikolajs Kottcov,
TSI 3rd year student
## Used technologies
* Languages: HTML, JavaScript, PHP, SASS
* Database: MySQL
* Web server: Apache HTTP
* Deployment platform: Docker
* Code quality: SonarQube (temp url: `http://ec2-13-49-135-104.eu-north-1.compute.amazonaws.com:9000/dashboard?id=nekolone%3Aphpapp`) 
## Deployment instructions
1. Install Docker desktop
2. In command line (in the directory with the Dockerfile), build docker image:
`docker build -t application .`
3. Run image, using port 8084:  
Shell/Bash and PowerShell:
`docker run -v ${PWD}:/app -p 8084:80 -p 8085:3306 application `  
Windows CMD:
`docker run -v%cd%:/app -p 8084:80 -p 8085:3306 application`  
4. Open a browser and look up `localhost:8084`

Upon startup, database admin password will be generated and given in a message like this:
>You can now connect to this MySQL Server with <PASS>