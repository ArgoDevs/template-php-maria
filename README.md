# template-php-maria
Template per sviluppo siti ready to cook by argo devs


# Setup Docker
Installare Docker e seguire i passaggi per utilizzarlo anche non da root: [Docker non root](https://docs.docker.com/engine/install/linux-postinstall/).\
*Tutti i comandi a seguire sono da lanciare nel terminale.*

## TL;DR

#### Solo la prima volta, partendo da cartella root

```shell
mkdir mariadb; \
cd build_php_apache_container; \
docker image build -t php8 .; \
cd ..
```
#### Lancio containers, da cartella root
```shell
docker-compose up
```

## Buildare l'immagine
1. Entrare nella cartella `build_php_apache_container`.\
Il file `000-deafult.conf` contiene i settings per il server apache.\
La riga con DocumentRoot corrisponde al path da cui verranno presi i file che il server dovrà servire.\
Secondo lo stile di Argo i file pubblici saranno nella cartella `public_html`.

```
<VirtualHost *:80>

  ServerAdmin admin@localhost
  DocumentRoot /var/www/html/public_html
  ErrorLog ${APACHE_LOG_DIR}/error.log
  CustomLog ${APACHE_LOG_DIR}/access.log combined

</VirtualHost>
```

2. Per buildare l'immagine eseguire il comando:
```shell
docker image build -t php8 .
```

## Lanciare i container
1. Nella cartella **root** del progetto, creare la cartella `mariadb` per avere persistenza dei dati del database.

2. Per lanciare i container di php-apache e mariadb eseguire il comando:

```shell
docker-compose up
```

All'interno del container php verrà montata la root in `/var/www/html` in modo che apache serva correttamente i file dentro `public_html`.\
Le credenziali di default per accedere al database sono all'interno del file `docker-compose.yml`.
La cartella `mariadb` conterrà i file persistenti del database, non è necessario caricarla nel server finale.

3. Per verificare gli ip dei container (localhost non è un indirizzo valido per il collegamento) usare lo script:
```shell
./getContainersIp.sh
```
Gli ip potrebbero cambiare nelle diverse esecuzioni (ma solitamente non accade).

## Errore Unable to connect
Verificare se si sta provando ad accedere tramite https invece che http; sul container con Apache non è stato configurato nessun certificato.
