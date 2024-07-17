Am scris o biblioteca RsLogger care se afla in folderul rsLoggerTestApplication/RsLogger. Exista un driver, care se ocupa cu scrierea in mediul de stocare, un formatter, care formateaza mesajele, o clasa pentru configuratie, o clasa care reprezinta mesajul de logat si o clasa pentru crearea logger-ului.

Testele pentru biblioteca sunt in rsLoggerTestApplication/RsLogger/tests .
Exemple de folosire a bibliotecii sunt in fisierul rsLoggerTestApplication/index.php
Biblioteca poate scrie mesaje in standard output si intr-un fisier. 
Am facut niste clase care scriu mesajele in mysql extinzand biblioteca, aceste clase sunt in rsLoggerTestApplication/app/lib/.
Am facut ca aplicatia sa functioneze intr-un container de Docker. Exista si un container de mysql.

Pentru a crea si porni containerele de Docker
```
docker-compose up -d
```

Pentru a rula comenzi de bash pe containerul cu aplicatia:
```
docker-compose exec rslogger-test-application bash
```
Pentru a rula exemplele:
```
php index.php
```
Pentru a vizualiza logurile
```
cat logs/fileDriverExample.log
cat logs/fileDriverJsonFormatterExampleConfiguration.log
```
Pentru a rula clientul de mysql pe containerul de mysql rulati comanda de mai jos, parola este "rslogger".
```
docker-compose exec mysql mysql -u rslogger -p rslogger
```
Pentru a vedea ce s-a scris in tabelul log
```
select * from log;
```