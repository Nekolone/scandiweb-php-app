FROM mattrayner/lamp
COPY ./schema.sql /
RUN sed -i 's/exec supervisord -n/supervisord 1> \/dev\/null 2>\&1;sleep 3;mysql -uroot < schema.sql;exec \/bin\/bash/' run.sh
COPY . /app
CMD ./run.sh

