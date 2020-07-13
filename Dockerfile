FROM mattrayner/lamp
RUN sed -i 's/exec supervisord -n/supervisord 1> \/dev\/null 2>\&1;sleep 3;mysql -uroot < \/app\/schema.sql;while :;do sleep 100;done/' run.sh
CMD ./run.sh

