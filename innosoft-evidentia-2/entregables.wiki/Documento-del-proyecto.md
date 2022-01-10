# Nombre del proyecto: innosoft-evidentia-2
* grupo 2 
* Curso escolar: 2021/2022
* Asignatura: Evolución y gestión de la configuración

# Apartados del documento 

### Indicadores del proyecto

(_debe dejar enlaces a evidencias que permitan de una forma sencilla analizar estos indicadores, con gráficas y/o con enlaces_)

Miembro del equipo  | Horas | Commits | LoC | Test | Issues | Incremento |
------------- | ------------- | ------------- | ------------- | ------------- | ------------- |  ------------- | 
[Castro Bonilla, María](https://github.com/Mariia-2000) | 44 | 10 | 765 | 11 | 6 | API rest evidencia, API rest alumnos test, Dashboard reuniones, Dashboard reuniones test
[Diz Gil, Guillermo](https://github.com/GuilleX7) | 49 | 14 | 1973 | 21 | 7 | API rest autentificación y comités, API rest reuniones y autentificación test, Dashboard horas, Dashboard horas test
[Muñoz Pérez, Carmen Mª](https://github.com/CarmenMariaMP) | 53 | 12 | 691 | 11 | 7 | API rest alumnos, API rest comités test, Dashboard alumnos, Dashboard alumnos test
[Rodríguez Pérez, Francisco](https://github.com/Fco-bit) | 49 | 13 | 891 | 12 | 6 | API rest reuniones, API rest evidencias test, Dashboard evidencias y reuniones, Dashboard evidencias test
**TOTAL** | t195  | t49 | t4320 | t55 | t26 | API rest & Dashboard

La tabla contiene la información de cada miembro del proyecto y el total de la siguiente forma: 
  * Commits: solo contar los commits hechos por miembros del equipo, no lo commits previos
  * LoC (líneas de código): solo contar las líneas producidas por el equipo y no las que ya existían o las que se producen al incluir código de terceros
  * Test: solo contar los test realizados por el equipo nuevos
  * Issues: solo contar las issues gestionadas dentro del proyecto y que hayan sido gestionadas por el equipo
  * Incremento: principal incremento funcional del que se ha hecho cargo el miembro del proyecto

### Integración con otros equipos
Este es un proyecto centrado en las jornadas Innosoft, ya que se ha incrementado dos funcionalidades al sistema utilizado en este evento. Para ello ha existido una comunicación sobretodo al principio del proyecto con el creador de Evidentia. El respositorio es el siguiente: [repositorio oficial Evidentia](https://github.com/drorganvidez/evidentia)

## Resumen ejecutivo 
El equipo innosoft-evidentia-2 ha realizado un proyecto que ha consistido en incrementar dos funcionalidades del proyecto Evidentia: realización de una API Rest de Evidentia y un dashboard de profesor. Estos incrementos aportan valor a la aplicación, ya que no existe una API Rest de Evidentia  y el dashboard es útil para el desempeño del trabajo de los profesores. A continuación se describirá en profundidad todo el trabajo que se ha llevado a cabo:

### Descripción del sistema
El proyecto que ha llevado a nuestro grupo (innosoft-evidentia-2) ha consistido en realizar dos incrementos funcionales para el sistema de Evidentia. Evidentia es un proyecto Laravel que utiliza PHP y una base de datos MySQL como pilares. La capa de datos está implementada por el ORM Eloquent y se encarga de crear y ejecutar llamadas automáticamente. Las vistas están programadas con Blade, el motor de vistas de Laravel, que permiten la modularización al poder ser incluidas en otras vistas y al permitir recibir parámetros que pueden usar como variables. En cuanto a los tests, las pruebas en sí están automatizadas gracias a Phpunit, que viene integrado con Laravel y se encarga de levantar el proyecto de forma adecuada para permitir un correcto testeo de todas las funcionalidades, ejecutando todas las pruebas que se encuentren dentro de la carpeta contenedora de los tests.

El patrón arquitectónico utilizado ha sido el MVC (Modelo, Vista, Controlador) ya que Laravel es un framework que utiliza este patrón. Este funciona de la siguiente manera:

* Modelo: estructura de datos de la aplicación. En el proyecto estos están situado en la carpeta ‘app/Models’.
* Vista: representación de la información en una interfaz de usuario. En el proyecto estas están situado en la carpeta ‘resources/views’.
* Controlador: lógica de la aplicación. En el proyecto estos están situado en la carpeta ‘app/Http/Controllers’.

Los incrementos que han sido implementados son los siguientes: realización de una API Rest de Evidentia y un dashboard para el profesorado. A continuación, se detallarán cada uno de estos incrementos:

* API Rest:  esta ha sido realizada directamente sobre las herramientas que Laravel nos ofrece. Se ha realizado una API muy básica con los principales métodos CRUD: crear, leer, actualizar y borrar. Los elementos que conforman la API y sobre los que se puede hacer estas operaciones son los siguientes: usuarios, comités, evidencias y reuniones. Para llevar a cabo lo anteriormente descrito, se ha creado en la carpeta ‘app/Http/Controllers/Api/v1’ un controlador por cada elemento de los nombrado anteriormente. Además, se ha creado un controlador más para obligar a que el usuario esté autenticado para poder hacer uso de la Api ya que una vez autenticado se le proveerá el JWT (Json Web Token). 

* Dashboard profesorado: este incremento consistía en la realización de un dashboard que mostrara las estadísticas más relevantes en una instancia de las jornadas. Esto tiene como objetivo facilitar al profesorado el estudio del desempeño de las jornadas. Las métricas que se han incluido se clasificarán según el área al que pertenezcan. Para esta funcionalidad, se ha creado un único controlador. Por cada área, se ha creado una función que devuelve un array con las métricas pertinentes. Además, existirá una función más llamada ‘showStatistics’ que recogerá la información de los otros métodos, ya que esta función es la que se utilizará para el flujo de información con las vistas. Cos respecto a las vistas se ha creado una vista para cada una de las áreas, que a su vez se han integrado en una vista común para todas las estadísticas. Además de ello, se han realizado representaciones gráficas de las métricas en gráficos de barras para facilitar la visulazación de los datos usando una librería de JavaScripts. Finalmente, a continuación se mostrarán las áreas anteriormente mencionadas:

	* Alumnos: número de alumnos en total en una jornada y número de alumnos según el nivel de implicación en la jornada.
 	* Reuniones: número de reuniones totales y número de reuniones por comité.
 	* Número de horas: horas de trabajo totales en la jornada y horas de trabajo totales por comité.
 	* Evidencias: número de evidencias totales, número de evidencias por comité y número de evidencias según estatus.

Una vez detallados estos incrementos, se detallarán las pruebas que se han llevado a cabo:

* API Rest: una vez desarrollada la funcionalidad, se han implementado ciertos tests. Se han utilizado test unitarios basados en llamadas HTTP con peticiones y respuestas basadas en JSON, que es el formato de intercambio de mensajes de la API. Al ser una API sin estado (stateless), tan solo depende directamente de la capa de datos, por lo que se ha podido probar de forma correcta su funcionamiento sin depender del resto del proyecto. La mayoría de las pruebas se basan en comprobar que el CRUD implementado funciona adecuadamente. También se usan algunos métodos auxiliares que interactúan con la capa de datos para alimentarla de datos o realizar la autenticación necesaria para interactuar con la API, abstrayendo al test de todo este proceso. En cualquier caso, se ha generado siempre y de forma mínima un caso positivo, en el que la funcionalidad responde adecuadamente cuando se le introducen datos correctos, y un caso negativo, en el que puede faltar la autenticación (basada en JWT), faltar datos de la operación, realizar una operación incorrecta, etc, cualquier procedimiento que debiera hacer fallar a la API.

* Dashboard profesorado: una vez desarrollada la funcionalidad, se han implementado ciertos tests. En este caso, los métodos implementados en los controladores, si es que existen, se pueden resumir en una única llamada a la capa de datos, que a su vez está implementada por el ORM Eloquent, por lo que no hay posibilidad de fallo a menos que exista un problema interno. Por ello, no se han creado tests para comprobar ese flujo ya que se considera innecesario. Por otro lado, las vistas generadas sí que tienen más complejidad. Necesitan presentar un modelo de datos en forma tabular y a veces en forma de gráficas. Dado que las vistas están programadas con Blade, se utiliza Dusk como motor de testeo de las vistas de Blade, cargándose parámetros definidos y conocidos por el test, y luego comprobando que estos valores son visibles en la vista de la forma adecuada.

Por último añadir que usamos github Actions como plataforma de CI donde realizamos:

* Build: nos permite verificar que el código fuente que se encuentra en las ramas vitales del proyecto (como master) está libre de problemas técnicos, tales como bugs, problemas de seguridad, malos olores, etc. Para dicho fin se utiliza el servicio de SonarCloud para analizar todo el código fuente del proyecto, escaneándolo con SonarScanner de forma automática cuando se realiza cualquier cambio en master o cuando se abre o reabre un pull request.

* CI: Este flujo de trabajo se encarga de verificar que el comportamiento de la aplicación una vez desplegada es el correcto. Para ello, se define el "job" phpunit, que es el "job" encargado de correr todos los tests que se encuentren definidos dentro de la carpeta tests del proyecto de Evidentia. Este workflow se realiza siempre que se haga un push a las ramas: "develop" y "master" y/o una pull request.

### Visión global del proceso de desarrollo

### Proceso de desarrollo
A lo largo del ciclo de vida del proyecto se han desarrollado múltiples actividades. Para ello se han utilizado diversas herramientas adecuadas para cada uno de los procesos. En esta sección se detallará cómo ha sido este proceso de desarrollo del producto, así como las herramientas que se han ido utilizando.

Al comienzo del proyecto, antes de desarrollar las funcionalidades que se pretendían implementar; el equipo ha tenido que hacer un estudio del framework Laravel, ya que es el utilizado en el proyecto Evidentia. Para ello, este se ha estudiado a través de la documentación oficial. Esta es muy detallada y no excesivamente compleja de entender. Durante el desarrollo del proyecto se ha consultado la documentación oficial en numerosas ocasiones. Además, al principio; el equipo asistió a un taller de Laravel y de la aplicación Evidentia impartido por el creador de Evidentia, para obtener unas lecciones básicas antes de afrontar la implementación.

Por otro lado, para la gestión del proyecto en general se ha utilizado Github. Github permite una cómoda gestión de muchos aspectos del proyecto. A continuación, se van a describir las funcionalidades más destacables que se han utilizado:

* La mayor ventaja de esta herramienta es poder tener un repositorio que almacene todos los archivos de interés para este proyecto.
* En esta plataforma se puede crear un proyecto, teniendo así un Kanban en el que se pueden introducir las distintas incidencias a realizar asignando personas a esta y adjuntando diversas etiquetas. Por ello, el establecimiento del estándar de incidencias se ha realizado basándose en esta ventaja de Github. Al final de esta sección se explicará con mayor profundidad este proceso.
* Permite crear seguridad entre las ramas más importantes del proyecto. Así, se pueden evitar desastres que podrían significar el fracaso del proyecto. Así, en nuestro proyecto se han protegido las ramas `master`, `develop` y `feature/X`, para que obligatoriamente un desarrollador deba revisar los cambios que se quieran mergear en ellas.

Por consiguiente, en el proyecto se ha utilizado Git; vital para el control de versiones y gestión del código. Cabe destacar el uso de dos herramientas que son similares: Github Desktop y Github Kraken. Ambas sirven para hacer uso de Git a través de una interfaz de usuario sencilla e intuitiva. Aun así, hay ciertas ventajas de Git que no se pueden aprovechar con estas herramientas, por lo que saber utilizarlo a través de la consola de comandos es una gran ventaja.

Con respecto al proceso de integración continua, se ha utilizado GitHub Actions como plataforma de CI.
En cuanto a la implementación del código, se ha utilizado la herramienta Visual Studio Code (VS Code) como editor. Esta ha sido escogida ya que es muy versátil y permite la inclusión de gran cantidad extensiones que facilitan al desarrollador. En nuestro proyecto concreto, se ha instalado el paquete ‘Laravel Extension Pack’, que contiene diez extensiones de interés para el desarrollo del código utilizando Laravel. Otras de las ventajas de VS Code es que permite el control integrado de Git, una de las herramientas más importantes del proyecto.

#### Cambio propuesto del sistema
Una vez se ha descrito a grandes rasgos las herramientas que se han ido utilizando en el desarrollo del proyecto, se va a explicar qué se debería hacer si se pretende realizar un nuevo cambio en el proyecto. Esto se explicará de manera general, ya que más adelante en la sección ‘Ejercicio de propuesta de cambio’ se especifica una propuesta concreta con los pasos a seguir.

En primer lugar, cuando se afronta un cambio se debe pensar de qué tipo es: nueva funcionalidad o hotfix. Dentro de hotfix entran aspectos tanto de resolución de errores como refactorización o mejoras leves de frontend. Esto es vital, ya que dependiendo del tipo de cambio se utilizarán unas ramas u otras. Si es una nueva funcionalidad, se utilizarán ramas feature y rama específica para los miembros, si no; se utilizará una única rama hotfix en la que se realizarán los cambios directamente.
Una vez se sabe esto, se estudiará el cambio para saber las incidencias que se crearán para realizarlo. Todas las incidencias que correspondan al cambio deberán tener una parte del título común para que sea más fácil identificar que pertenecen al mimo. Cuando se creen estas incidencias se deberán hacer las siguientes acciones.

* Añadir un título descriptivo y claro.
* Añadir una descripción (opcional).
* Indicar la prioridad de la incidencia y el tipo de esta a través de las etiquetas.
* Cuando un desarrollador sepa que va a trabajar en esa incidencia, deberá asignársela.

Durante el desarrollo de este cambio las incidencias asociadas pasarán por estos estados: ‘To do’, ‘In progress’, ‘In review’, ‘Done’. Cuando la incidencia se crea está en el estado ‘To do’. Cuando un desarrollador empieza a trabajar en esta pasará al estado ‘In progress’. Una vez esta esté finalizada, deberá pasar una revisión, por lo que pasará al estado ‘In review’. En este momento es cuando un miembro del equipo es asignado para realizar la revisión, que se hará de forma dinámica para evitar cuello de botella. Finalmente, si la incidencia es aprobada, esta pasará al estado ‘To do’. Si no es así, podrá ser por aspectos a corregir/mejorar. Dependiendo de la complejidad de estos aspectos, la tarea se quedará en ‘In review’ si no es mu complejo, o volvería al estado de ‘In progress’.

Una vez que todas las incidencias asociadas al cambio han sido realizadas, se considerará que el cambio se ha finalizado. Así, la rama que contenga todos los cambios deberá ser mergeada con develop a través de un Pull Request, que deberá ser revisado por un miembro del equipo. Una vez realizado esto se realizará el mismo proceso con la rama master con la diferencia de que el Pull Request debe ser revisado por el Project Manager del equipo.
Finalmente, el equipo sopesará si realizar una nueva release o no. Esto dependerá del cambio realizado y de la situación actual de la aplicación.
Esta es una descripción genérica del proceso que se debe llegar a cabo cada vez que se quiera realizar un cambio. En el apartado ‘Ejercicio de cambio’ se describirá paso a paso un ejemplo concreto cuanto te proponen un incremento funcional.

### Entorno de desarrollo 
El entorno de desarrollo de la aplicación está compuesto por contenedores Docker orquestados por Docker-compose, que es una de las dos estrategias presentadas por el proyecto original de Evidentia, siendo la otra Homestead, pensada para utilizarla junto a Vagrant. Dado que Evidentia es un proyecto Laravel, podemos encontrar un subproyecto llamado Laradock que consiste en un conjunto de imágenes y contenedores de Docker que nos permiten desplegar un entorno con todas las herramientas necesarias para aprovechar el potencial de Laravel al máximo ya preparadas.

Para el despliegue en local, se ha usado o bien una máquina Windows utilizando Docker Desktop para ejecutar los contenedores, o una máquina Windows utilizando el subsistema Linux para Windows (WSL2). En cualquier caso, estos dos entornos funcionan de forma equivalente a la hora de arrancar y ejecutar contenedores Docker.
Si es necesario desplegarla en remoto, la aplicación se ha probado a desplegar en un servidor virtual privado (VPS) corriendo Ubuntu Server 20.04. En este servidor se ha instalado Docker y Docker-compose con el objetivo de ejecutar todos los contenedores necesarios para soportar el Laradock ya configurado con Evidentia. No han existido problemas a la hora del despliegue en remoto, por lo que no se requieren pasos adicionales.

Entre los contenedores que podemos encontrar y que son necesarios para ejecutar la aplicación están:
- Nginx: sirve como servidor web y sirve todos los archivos al usuario. Para ello, se encuentra configurado con un módulo de PHP y se conecta a otro contenedor mediante FastCGI.
- Workspace: este contenedor contiene una instalación de PHP FPM (FastCGI), que ejecuta toda la lógica de la aplicación de Evidentia. Sus resultados se pasan a Nginx para ser servidos al usuario.
- MySQL: este contenedor sirve como base de datos para la aplicación de Evidentia.
- Phpmyadmin: contiene un administrador de bases de datos MySQL que permite gestionar la base de datos que se encuentra en el contenedor de MySQL.
- Redis: base de datos en memoria que ofrece una gran velocidad. Se usa como memoria caché de la aplicación, mejorando los tiempos de respuesta y de ejecución.
Cabe destacar que todos los contenedores están conectados a una misma red de Docker, exponiendo sus servicios a través de un puerto mapeado a la máquina de host, de forma que parezca que se está corriendo el proyecto en su totalidad directamente en el sistema operativo, y no virtualizado en contenedores.

El despliegue del entorno de desarrollo en uno de los sistemas anteriormente mencionado se puede realizar así:

#### 1. Clonar repositorio de Evidentia

Clonamos el repositorio de Evidentia

    git clone https://github.com/drorganvidez/evidentia.git evidentia

#### 2.1. Instalación automática

Dentro de la carpeta evidentia que acabamos de clonar, encontraremos un archivo llamado install_laradock.sh

Primero, mediante consola, nos situaremos en la carpeta evidentia

    cd evidentia

Luego, daremos permisos de ejecución al archivo

    chmod +x install_laradock.sh

Por último, ejecutaremos el archivo

    sh install_laradock.sh

#### 2.2. Instalación manual de Laradock

Aunque el paquete de Laradock está convenientemente automatizado, puede darse el caso de no funcionar bien. Podemos, entonces, introducir los comandos de forma manual.

Copiamos las variables de entorno desde la carpeta laradock

    cd laradock
    cp env.example .env

Nos aseguramos que los contenedores están con STATUS: UP

Listamos los contenedores que están corriendo:

    docker ps

En caso de que no sea así, nos situamos en la carpeta laradock (si no lo estamos ya) y levantamos los contenedores:

    cd laradock
    docker-compose up -d nginx mysql phpmyadmin redis workspace

Para acceder al espacio de trabajo, nos fijamos en la columna NAMES a ver qué nombre tiene el contenedor de workspace.

En nuestro caso, es laradock_workspace

Actualizamos composer

    docker exec laradock_workspace rm -f composer.lock
    docker exec laradock_workspace composer install

Inicializamos la base de datos de Evidentia

    docker exec laradock_workspace php artisan evidentia:start_docker

Inicializamos una instancia por defecto, Curso 2021/22

    docker exec laradock_workspace php artisan evidentia:createinstance

Generamos una nueva key

    docker exec laradock_workspace php artisan key:generate

Actualizamos la caché

    docker exec laradock_workspace php artisan config:cache

#### 3. Comprobar que todo ha ido bien

Desde el navegador, acceder a la dirección http://localhost.

### Ejercicio de propuesta de cambio
Se supone que se pide la siguiente propuesta de cambio: incluir comparaciones de las métricas de las distintas instancias existentes. A continuación se van a definir los pasos necesarios para realizar este cambio.

#### Primer paso - Crear las instancias en el proyecto
Para crear una nueva instancia se deberá seguir los siguientes pasos:
* Entrar en el repositorio del proyeto de Github: https://github.com/CarmenMariaMP/evidentia.
* Ir al apartado 'Projects' y seleccionar el proyecto 'innosoft-evidentia-2'.
* A continuación se crearán todas las instancias que se consideren necesarias para la realización de esta funcionalidad. Todas 	estas tendrán la siguiente estructura en el título: INSTANCE_COMPARATOR - [key_word], donde la key_word serán una o dos palabras 	claves que definan esa instancia.
* Una vez creadas las notas, se convertirán a issue cada una de ellas. Al realizar esto, se añadirá una descripción para esa tarea 	en concreto. Además se añadirán las etiquetas necesarias para indicar el tipo de instancia y la prioridad que tiene. Para añadir 	estas etiquetas se deberá revisar el documento donde se especifica el significado de cada una de estas etiquetas.

#### Segundo paso - Crear la rama de la funcionalidad
Para empezar a trabajar, se debe crear la rama para la funcionalidad. Además cada miembro que quiera hacer cambios a esa rama tendrá que crear su propia rama donde trabajar, para después mergear los cambios. La rama feature tendría el siguiente nombre: feature/instance_comparator. Las ramas de cada miembro tendrían la siguiente forma: miembro1_instance-comparator. Para crearlas se podrá hacer desde la interfaz de Github o desde a través de los siguientes comandos:

	1) git branch feature/instance_comparator (Crear la rama feature).
    
	2) git checkout feature/instance_comparator (Moverse a la rama feature recién creada).
    
	3) git branch miembro1_instance-comparator (Crear la rama específica como miembro1 que va a empezar a trabajar).
    
	4) git checkout miembro1_instance-comparator (Moverse a la rama del miembro1 recién creada).

#### Tercer paso - Desarrollo del trabajo
Cada vez que un desarrollador se ponga a trabajar en una de las instancias que conforman este cambio, deberá asignarse la tarea en Github. Una vez hecho eso, cambiará el estado de la intancia a 'In progress' cambiándola de columna. 

Para el desempeño del trabajo se podrá usar la herramienta que se desee. Nuestro equipo recomienda el uso de Visual Studio Code. Para la realización de commits se podrá utilizar herramientas como Github Desktop o Github Kraken; así como utilizar los comandos de git directamente en la terminal. Para realizar un commit desde la terminal se deberán seguir los siguientes pasos (se asumen que se han creado las ramas necesarias):

	1) git checkout miembro1_instance-comparator (Moverse a la rama donde se pretende trabajar)
    
	2) Se realizarán los cambios pertinentes.
    
	3) git add . (Para añadir todos los archivos que se hayan cambiado al estado stage) // git add file (Para añadir un archivo concreto al estado stage).
    
	4) git commit -m [mensaje] (Realización del commit con los cambios que están en el estado de stage).
    
	5) git push (subir los cambios a la rama miembro1_instance-comparator).
    
Si en algún momento el desarrollador quiere mergear de una rama a otra desde la consola de comandos, deberá hacerlo de la siguiente manera:

    git checkout nombre_rama_a_la_que _quiero_mergear
    git merge rama_con_los_cambios
    
Si en algún momento el desarrollador quiere actualizar la rama en la que está trabajando desde la consola de comandos, deberá hacerlo de la siguiente manera:

    git checkout rama_que_quiero_actualizar
    git pull 

Una vez se hayan realizado todos los cambios pertinentes, se realizará una Pull Request (desde la interfaz de Github) a la rama feature/instance_comparator para que sea revisada por otro miembro del equipo. Este miembro se asignará dinámicamente para evitar cuello de botella. La instancia asociada deberá cambiar su estado de 'In progress' a 'In review' en el Kanvan de la sección 'Project' de Github. Si la revisión es aceptada, los cambios se actualizarán en la rama feature, si no se deberán realizar los cambios pedidos por el revisor. Si estos cambios son complejos, la instancia volverá al estado 'In progress'.

#### Cuarto paso - funcionalidad terminada
Una vez todas las instancias correspondientes a esta petición de cambio hayan sido realizadas y revisadas y todos los cambios estén en la rama feature de la funcionalidad, se considerará que esta está lista para ser mergeada con develop. Para mergear ambas ramas, un miembro del equipo realizará una Pull Request desde la interfaz de Github y otro miembro realizará la revisión pertinente. Una vez aceptada la revisión, los cambios se encontrarán en develop. Así, se hará el mismo proceso de la rama develop a master, estando así finalmente el cambio pedido en la rama en producción.

### Conclusiones y trabajo futuro
En el desarrollo del proyecto se han agrupado las siguientes lecciones aprendidas y conclusiones:
* Aprender a trabajar en equipo, desarrollando habilidades de comunicación y coordinación.
* Aprender a trabajar y adaptarse a un proyecto que esta en producción.
* Capacidad de aprender un framework nuevo en un corto período de tiempo.
* La importancia de tener estándares en los aspectos más importantes del desarrollo del proyecto como estándares en los commits, incidencias y política de ramas.
* La importancia de implementar los estándares lo antes posible para conseguir una gestión unificada en el proyecto rápidamente.


En el proyecto desarrollado, se han implementado dos funcionalidades: una Api Rest de Evidentia y un dashboard para el profesorado con ciertas métricas. Cabe destacar que ambas funcionalidades tienen muchos aspectos a mejorar. En cuanto a la Api realizada, hay que destacar que este es un incremento base que debe ser extendido en el futuro por otro grupo de trabajo, ya que únicamente tiene los métodos CRUD; esta se podría mejorar añadiendo más métodos, además de que no cuenta con la seguridad necesaria para ser implementada en la aplicación ya que solo requiere estar autenticado para realizar todas las operaciones CRUD de los modelos mencionados, cuando en algunos de los modelos también se necesita un rol específico. Sin embargo, implementar la autenticación mediante JWT fue un gran avance debido a la arquitectura de la aplicación.

Por otro lado, en cuanto a la funcionalidad del dashboard se han obtenido bastantes métricas, aunque se podría estudiar qué otrás métricas de interés se podrían incluir. Además, sería muy interesante incluir la manera de poder realizar comparaciones entre distintas instancias gracias a estas métricas obtenidas.
