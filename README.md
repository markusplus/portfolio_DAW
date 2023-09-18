# portfolio_DAW
Este repositorio contiene el portfolio de la asignatura. Cada Unidad Didáctica tendrá dos archivos MarkDown diferentes: Uno relativo al diario de clase donde situaremos las reflexiones, y otro donde se guardarán los enlaces a los diferentes trabajos de la Unidad.

# Github 
By _mjovcab_

## Introducción
Github es una herramienta que permite la creación de proyectos con control de versiones.

Se suele utilizar principalmente en el desarrollo de proyectos de software y dos de sus principales características 
son las de permitir guardar cambios en el proyecto y crear ramas para no sobreescribir el trabajo.

Las funciones principales a destacar de GitHub son:

1. Subir proyectos
2. Herramienta de revisión de código
3. Creación de ramas
4. Descargar repositorios
5. Clonar repositorios
### Subir proyectos
![](https://www.swiftbeta.com/content/images/2020/11/Screen-Shot-2020-11-13-at-10.15.08.png)
En GitHub los usuarios pueden subir proyectos mediante la terminal o a través de la propia aplicación web.

Para subir un proyecto desde la web, el usuario deberá crear un repositorio y asignarle un nombre. Después,
deberá seleccionar la carpeta que contenga el proyecto en su equipo y proceder con la subida.

Por otro lado, si el usuario desea subir el proyecto desde la terminal, deberá escribir la siguiente sucesión
de comandos: 
```
git init
git add .
git commit -m "first commit"
git remote add origin git@github.com:mjovcab/portfolio_DAW.git
git push -u origin master
```
### Herramienta de revisión de código
![](https://www.pullrequest.com/blog/github-code-review-service/images/inline-pullrequest-code-review-feedback-github.png)
Esta herramienta permite al propio desarrollador hacer anotaciones en su código, como posibles mejoras o problemas
a arreglar. Esta herramienta es especialmente útil cuando se utiliza en un repositorio público, donde cualquiera
puede participar, revisar el código y ayudar al desarrolador.

Utilizar esta herramienta es tan sencillo como entrar a un repositorio y dentro de la pestaña "Pull requests"
añadir la nota o sugerencia.
### Creación de ramas

![](https://desarrolloweb.com/archivoimg/general/3981.png)

Las ramas sirven para evitar perder partes del código durante el desarrollo. Es decir, funcionan a modo de copia
de seguridad, permitiendo al desarrollador modificar archivos del proyecto sin riesgo a dañar el código principal.

Para crear una rama, el desarrollador deberá situarse en la pestaña "Branches", hacer click en "New branch" y asignar
un nombre a la nueva rama.

Desde la terminal se puede hacer lo mismo mediante el comando ```git branch <nombre_rama>```
### Descargar repositorios
![](https://desarrolloweb.com/archivoimg/general/4493.png)
La descarga de repositorios permite a los usuarios obtener el código de un proyecto de GitHub de manera gratuita.

Para descargar un repositorio desde la web, el usuario deberá seguir los pasos que se muestran en la imagen de la 
cabecera de este apartado. 
### Clonar repositorios
![](https://docs.github.com/assets/cb-29406/images/help/desktop/clone-choose-button-mac.png)
La clonación de repositorios es un recurso muy útil para los desarrolladores, ya que proporciona la posibilidad
de copiar un proyecto tal cual se encuentra en GitHub, incluyendo todas sus ramas.

Los usuarios pueden clonar un repositorio desde la terminal, utilizando  el comando:
```
gh repo clone markusplus/Expansions
```

## Bibliografía
[Xataka](https://www.xataka.com/basics/que-github-que-que-le-ofrece-a-desarrolladores)
