# Política de commits
Para la realización de cualquier commit se debe seguir el siguiente estándar:

* <título>: (título conciso de no más de 40 carácteres)
* <type>: (documentación, hotfix, backend, frontend, release)
* <body>: (descripción breve de no más de 200 carácteres)

# Estrategia de ramas
La estrategia de ramas que se va a seguir es bastante simple. Esta está basada en la estrategia de ramas GitFlow. A continuación se detalla los aspectos a tener en cuenta:

*Rama "documentation": en esta rama se subirán todos los documentos que se realizarán relacionados con el proyecto.
*Ramas "feature/X": estas se crearán cada vez que se vaya a realizar una nueva funcionalidad. El nombre será la palabra "feature/X", donde a X serán una o dos palabras claves que describan la funcionalidad a desarrollar. Como el grupo que está desarrollando la funcionalidad es pequeño, cada miembro que trabaje en esa funcionalidad utilizará esta rama directamente.
*Rama "develop": una vez se haya revisado la funcionalidad pertinente, la persona asignada realizará un PUll Request que deberá ser aceptado por el revisor asignado. La rama de documentación se mergeará con develop al final del proyecto, siguiendo el procedimiento anteriormente explicado.
*Rama "master": cuando se considere que la rama "develop" está estable y lista para producción, se realizará un Pull Request que solo el Proyect Manager tendrá la autoridad de aceptar.
*Rama "hotfix/X": en caso de que haya que solucionar cualquier tipo de problema, se creará una rama que se llamrá "hotfix/X", donde la  X serán una o dos palabras claves que describan la el problema. Una vez solventado, se hará un Pull Request a develop, que deberá ser aceptado por el revisor asignado.