# Examen DAW
### Segundo ejercicio
Documenta todos los pasos realizados en un archivo MarkDown. Accede a esta máquina remota mediante ssh:
![Captura ejercicio 2](captura0.png)
Deberás ir al escritorio y crear un archivo de texto que contenga como nombre de archivo, tu nombre propio y apellido sin espacios y con extensión txt (por ejemplo ArnoldSchwarzenegger.txt) escribe en su interior el resultado de whoami.

Después, mediante otro comando, concatena al final del archivo el resultado del comando necesario para saber quién está conectado a la máquina mediante ssh.
#### Solución
```ssh -p 22 usuario@192.168.0.148```
Seguidamente, escribimos "yes" y pulsamos "intro".
Una vez conectados, nos ubicamos en el escritorio y creamos el archivo de nombre "MarcJovani.txt" y concatenamos el resultado del comando "whoami":
```
cd Escritorio
touch MarcJovani.txt
whoami >> MarcJovani.txt
```
![Captura ejercicio 2](captura1.png)
Ahora concatenamos al final del archivo el resultado del comando "who"
```who >> MarcJovani.txt```
![Captura ejercicio 2](captura2.png)
### Tercer ejercicio
Primero comprobamos que apache se esté ejecutando con el comando:
```sudo service apache2 status```
Seguidamente pasamos a crear un nuevo VirtualHost accediendo a la carpeta "sites-available" y creando un nuevo archivo ".conf" a partir del por defecto:
```
cd /etc/apache2/sites-available/
sudo cp 000-default.conf marc_jovani.conf
sudo nano marc_jovani.conf
```
![Captura ejercicio 3](captura3.png)
Ahora modificamos el archivo hosts:
```sudo nano /etc/hosts```
![Captura ejercicio 3](captura4.png)
En este momento trasladamos el archivo que acabamos de crear a la ruta: /var/www/marc_jovani:
```sudo mv /home/usuario/Escritorio/index.html /var/www/marc_jovani```
Una vez hecho esto probamos en el navegador que el host funciona.
