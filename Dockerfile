FROM mattrayner/lamp
RUN sed -i '2s/^/export XDEBUG_CONFIG="$(cat \/xdebug_config)"\n/' run.sh
RUN sed -i 's/exec supervisord -n/supervisord 1> \/dev\/null 2>\&1;sleep 3;mysql -uroot < \/app\/schema.sql;while :;do sleep 100;done/' run.sh
RUN yes | apt-get install iproute2
RUN GATEWAY=$(ip r | grep default | awk '{print $3}') && echo "remote_host=$GATEWAY remote_enable=1 remote_port=9000" > /xdebug_config
CMD ./run.sh

