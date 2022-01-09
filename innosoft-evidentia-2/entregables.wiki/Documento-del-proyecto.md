El documento del proyecto debe ser un documento que sintetice los aspectos del proyecto elegido para su desarrollo con respecto a los temas vistos en clases. 

Debe tener claramente identificados los nombres y apellidos de cada componente, grupo al que pertenecen (1, 2, o 3 mañana o tarde), curso académico, nombre del proyecto (seguir la política de nombres). Use este [[modelo de portada]] para el documento del proyecto y alójelo en su repositorio o en una página del [wiki](https://1984.lsi.us.es/wiki-egc/) de la asignatura.  

Debe ser un documento elaborado en formato [wiki]. 

Debe ser un documento presentado de manera profesional guardando la forma en los estilos y contenidos y con el máximo nivel de rigor académico y profesional.

Este curso se recomienda que el documento se aloje o bien en el [wiki de la asignatura](https://1984.lsi.us.es/wiki-egc/) o bien en el repositorio del proyecto usando para ello el lenguaje de [markdown](https://guides.github.com/features/mastering-markdown/) que ofrece github. 

Tenga en cuenta los siguientes comentarios generales: 

* Siempre diferencie claramente las secciones y subsecciones y para ello use etiquetas de encabezado como las que se disponen en los lenguajes tipo _markdown_

# Apartados del documento 

El documento del proyecto tendrá (al menos) que sintetizar los siguientes apartados:

### Indicadores del proyecto

(_debe dejar enlaces a evidencias que permitan de una forma sencilla analizar estos indicadores, con gráficas y/o con enlaces_)

Miembro del equipo  | Horas | Commits | LoC | Test | Issues | Incremento |
------------- | ------------- | ------------- | ------------- | ------------- | ------------- |  ------------- | 
[Apellidos, nombre](https://github.com/nombredeusuariodegithub) | HH | XX | YY | ZZ | II | Descripción breve 
[Apellidos, nombre](https://github.com/nombredeusuariodegithub) | HH | XX | YY | ZZ | II | Descripción breve 
[Apellidos, nombre](https://github.com/nombredeusuariodegithub) | HH | XX | YY | ZZ | II | Descripción breve 
**TOTAL** | tHH  | tXX | tYY | tZZ | tII | Descripción breve 

La tabla contiene la información de cada miembro del proyecto y el total de la siguiente forma: 
  * Commits: solo contar los commits hechos por miembros del equipo, no lo commits previos
  * LoC (líneas de código): solo contar las líneas producidas por el equipo y no las que ya existían o las que se producen al incluir código de terceros
  * Test: solo contar los test realizados por el equipo nuevos
  * Issues: solo contar las issues gestionadas dentro del proyecto y que hayan sido gestionadas por el equipo
  * Incremento: principal incremento funcional del que se ha hecho cargo el miembro del proyecto

### Integración con otros equipos
Equipos con los que se ha integrado y los motivos por lo que lo ha hecho y lugar en el que se ha dado la integración: 
* [Nombre-del-equipo](https://github.com/nombredeusuariodegithub): breve descripción de la integración 
* [Nombre-del-equipo](https://github.com/nombredeusuariodegithub): breve descripción de la integración 
* [Nombre-del-equipo](https://github.com/nombredeusuariodegithub): breve descripción de la integración 

## Resumen ejecutivo (800 palabras aproximadamente)
Se sintetizará de un vistazo lo hecho en el trabajo y los datos fundamentales. Se usarán palabras para resumir el proyecto presentado. Contendrá, al menos la siguiente información: 

### Descripción del sistema (1.500 palabras aproximadamente)
se explicará el sistema desarrollado desde un punto de vista funcional y arquitectónico. Se hará una descripción tanto funcional como técnica de sus componentes y su relación con el resto de subsistemas. Habrá una sección que enumere explícitamente cuáles son los cambios que se han desarrollado para el proyecto. 

### Visión global del proceso de desarrollo (1.500 palabras aproximadamente)
Debe dar una visión general del proceso que ha seguido enlazándolo con las herramientas que ha utilizado. Ponga un ejemplo de un cambio que se proponga al sistema y cómo abordaría todo el ciclo hasta tener ese cambio en producción. Los detalles de cómo hacer el cambio vendrán en el apartado correspondiente. 

### Entorno de desarrollo (800 palabras aproximadamente)
debe explicar cuál es el entorno de desarrollo que ha usado, cuáles son las versiones usadas y qué pasos hay que seguir para instalar tanto su sistema como los subsistemas relacionados para hacer funcionar el sistema al completo. Si se han usado distintos entornos de desarrollo por parte de distintos miembros del grupo, también debe referenciarlo aquí. 

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


En el proyecto desarrollado, se han implementado dos funcionalidades: una Api Rest de Evidentia y un dashboard para el profesorado con ciertas métricas. Cabe destacar que ambas funcionalidades tienen muchos aspectos a mejorar. En cuanto a la Api realizada es bastante básica, ya que únicamente tiene los métodos CRUD; por lo que esta se podría mejorar añadiendo más métodos. Por otro lado, en cuanto a la funcionalidad del dashboard se han obtenido bastantes métricas, aunque se podría estudiar qué otrás métricas de interés se podrían incluir. Además, sería muy interesante incluir la manera de poder realizar comparaciones entre distintas instancias gracias a estas métricas obtenidas.
