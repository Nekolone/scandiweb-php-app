FROM mattrayner/lamp
RUN yes | apt-get install iproute2
RUN echo "remote_host=host.docker.internal remote_enable=1 remote_port=9000" > /xdebug_config
RUN sed -i '1 a export XDEBUG_CONFIG="$(cat \/xdebug_config)"' run.sh
RUN sed -i '1 a [ -z "$(getent hosts host.docker.internal)" ] \&\& IP=$(ip r | grep default | awk "{print \\$3}") \&\& echo "$IP   host.docker.internal" >> \/etc\/hosts ' run.sh
RUN sed -i 's/exec supervisord -n/supervisord 1> \/dev\/null 2>\&1;sleep 3;mysql -uroot < \/app\/schema.sql;while :;do sleep 100;done/' run.sh
CMD ./run.sh

