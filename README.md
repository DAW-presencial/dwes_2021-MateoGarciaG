# DWES_PHP
## Archivo donde están las justificaciones a las preguntas del examen evaluación 1

### Pregunta 4
Justificación: Como vemos la propiedad una vez instanciado el objeto, le agregramos la propiedad textura y la leemos para comprobar que si haya creado. Después utilizando la función get_class_vars() y property_exists compruebo si la propiedad fue añadida a la clase, al objeto con isset(). Donde la propiedad pertenece al objeto donde fue creada, en este ejemplo al objeto $pepino

### Pregunta 5
1.Se activan las funciones del padre?: Tanto en la clase padre como en la hija, se activan el __get() y __set(), lo que sucede es que en el hijo se llama dos vecess
  2. Como afecta a la subclase que una propiedad sea privada o protegida en la clase padre?: La subclase puede llamar a una propiedad PROTECTED y PRIVATE mediante __get() y __set() 

