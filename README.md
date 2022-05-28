# Estructura base de una template para Joomla 3.x

Una plantilla de base con la estructura de una template Joomla.

## Prerrequisitos
* NodeJs

## Preparación para desarrollo
* En primer lugar crearemos un nuevo repositorio en nuestra máquina local y obtenemos el código desde el este repositorio.
~~~
git init foo
cd foo
git pull https://github.com/LBC-Starter-Kits/Joomla-Template-Starter-Kit.git
~~~

* Enlazamos con el repositorio sass con el patrón 7-1
~~~
git subtree add --prefix src/styles https://github.com/LBC-Starter-Kits/sass-7-1-pattern.git main --squash
~~~

* Instalamos las dependencias del archivo package.json
~~~
npm install
~~~

* Por último ejecutamos el script build
~~~
npm run build
~~~

## Getting Started

Descomprimir el archivo zip en el directorio /templates/nombre_plantilla

* Cambiar los metadatos de la plantilla en templateDetails.xml
* Cambiar los archivos de imagen por archivos válidos, favicon.ico, template_preview.png(600x400) y template_thumbnail (200x150).
* Cambiar posiciones de módulos que sean necesarias.
* Cambiar los parámetros dentro de la sección config.

### Installing

En el panel de administración de joomla ir a extensiones -> descubrir

## Authors

* **Luis BC** - *Initial work* - [Luinux81](https://github.com/LuinuX81)


