# Caballero Website Manager / ”Poor Man’s” CMS From The Ground Up - Dockerised solution

Caballero is a CMS originally developed by Jason M. Knight
This is just a dockerised solution for it 


## Original Live demo:
https://cutcodedown.com/caballero/


## How to start 

Copy example environment and edit the PROJECT_BASE_URL to match the needed subdomain for example caballero.docker.localhost
```
mv .env.example .env
nano .env 
```

add this line to 
```
127.0.0.1 *.docker.localhost
```
using 
```
nano /etc/hosts 
```



start trefik and portainer
```
cd localdevtools
docker-compose up -d 
```

start apache/php 
```
cd ..
docker-compose up -d 
```

just visit https://caballero.docker.localhost
to see caballero in action


## Articles 

https://medium.com/codex/poor-mans-cms-from-the-ground-up-part-1-planning-and-defines-387e0eafc107
