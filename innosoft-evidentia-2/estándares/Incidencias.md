# Gestión de incidencias

Las incidencias  son gestionadas mediante las issues de GitHub.

### Tipos incidencia

Para crear una incidencia hay que aportar una serie de información que permita al equipo de desarrollo cómo tratar dicha incidencia, parar poder diferenciar el tipo de incidencia se han usado las siguientes etiquetas/tags :

* backend: la incidencia es una tarea de backend.
* frontend: la incidencia es una tarea de frontend.
* documentation:la incidencia se trata de documentación.
* test: la incidencia es una tarea de realización de tests para alguna funcionalidad.
* bug: la incidencia describe un fallo de programación en el software.
* enhancement: una solicitud de mejora en el software.
* help wanted: esta incidencia describe una petición de ayuda.
* question: esta incidencia describe una pregunta a responder para el equipo de desarrollo.
* duplicate: ya existe otra incidencia que describe lo mismo que ésta.
* good first issue: esta incidencia es idónea para un desarrollador del equipo junior, o con menor experiencia en el software.
* invalid: esta incidencia es incorrecta, refleja una petición que no tiene sentido.
* wontfix: esta incidencia no tiene solución posible. Se emplea cuando se describe como incidencia un comportamiento que parece ser defectuoso, pero que en realidad es una funcionalidad. También se puede emplear para una incidencia que describe un problema, para la que no existe solución posible. Hay que tener una buena razón para etiquetar una incidencia de esta manera.

Una incidencia puede ser de varios tipos a la vez, por lo que Github permite seleccionar múltiples categorías simultáneamente.


### Estado de la incidencia

Hay que gestionar las incidencias de manera ordenada con estados predeterminados.

* New: cuando se crea la incidencia se debe indicar que el estado es New.
* Rejected: la incidencia ha sido rechazada.
* Accepted: la incidencia ha sido aceptar, por tanto, alguien del equipo de desarrollo se encargará de tratar la incidencia.
* Fixed: el desarrollador ha finalizado el trabajo y la incidencia está pendiente de ser verificada.
* In process: alguien del equipo de desarrollo ya ha comenzado a trabajar en la incidencia.
* Verified: la incidencia ya ha sido verificada.

Una incidencia sólo podrá tener un estado en un momento determinado. A lo largo del proceso por el que pasa la incidencia, esta pasará por varios estados.

### Prioridad

La prioridad sólo la puede etiquetar un miembro del equipo de desarrollo. Por tanto, si usted no pertenece a dicho equipo, no indique la prioridad.

En cuanto a las prioridades de las issues, se han gestionado mediante el uso de las siguientes etiquetas/tags:

* high priority: incidencias con la prioridad más alta. Son las primeras que se deben realizar. Si la issue en cuestión tiene la etiqueta "bug" como tipo, es porque partes del código fuente están impidiendo el correcto funcionamiento del sistema de forma seria.
* medium priority: incidencias con la prioridad intermedia. Son incidencias importantes, pero no se deben realizar de forma inmediata. Si la issue en cuestión tiene la etiqueta "bug" como tipo, es porque algún problema impide el funcionamiento de cierta funcionalidad, pero la aplicación sigue siendo viable en general.
* low priority: incidencias con la prioridad más baja. Estas tareas tienen una menor importancia o menor urgencia en ese momento en el proyecto. Si la issue en cuestión tiene la etiqueta "bug" como tipo, es porque el fallo no afecta a ninguna funcionalidad determinante.


### Rol

En cuanto a los roles en la gestión de incidencias, existirán dos roles principales:

* Issue owner/s(IO): encargado de realizar la issue. Una issue puede estar asignada a más de un miembro del equipo. En Github esto se traduce en las personas asignadas a la tarea.
* Issue reviewer (IR): se encarga de revisar la issue. Un miembro del equipo se asignará como revisor de una tarea cuando la vaya a revisar. Para ello, los miembros del equipo tendrán que estar atentos a las tareas pendientes de revisión diariamente en el tablero de Github y evitar la acumulación de estas. 

Es importante destacar que el Project Manager del equipo será el único revisor aceptable para mergear una rama con master. Existirá otro miembro asignado a esta tarea para situaciones excepcionales en las que el Project Manager no se encuentre disponible, evitando así posibles retrasos. 
 
