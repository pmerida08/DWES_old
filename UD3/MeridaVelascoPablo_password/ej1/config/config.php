<?php

#Ejercicio 1.
// array horarios. Contiene varios arrays con el grupo con su respectivo horario cada uno. (Indexado)

$horarios = array(
      array(
            "grupo" => "2º DAW A",
            // array. Contiene el horario de cada asignatura (Asociativo)
            "horario" => array(
                  // array. Contiene el horario del grupo correspondiente (Asociativo)
                  "DWES" => array(
                        "nombre" => "Desarrollo web en entorno servidor",
                        "profesor" => "José Aguilera",
                        // array horas. Contiene las horas de la semana que hay de la asignatura correspondiente (Indexado)
                        "horas" => array(
                              // Contiene arrays con el dia de la semana y sus horas correspondientes de la asignatura (Asociativo)     
                              array("Dia" => "Lunes", "Hora" => "1ª"),
                              array("Dia" => "Lunes", "Hora" => "2ª"),
                              array("Dia" => "Martes", "Hora" => "1ª"),
                              array("Dia" => "Martes", "Hora" => "2ª"),
                              array("Dia" => "Miercoles", "Hora" => "1ª"),
                              array("Dia" => "Miercoles", "Hora" => "2ª"),
                              array("Dia" => "Viernes", "Hora" => "3ª"),
                              array("Dia" => "Viernes", "Hora" => "4ª"),
                        )
                  ),
                  "DWC" => array(
                        "nombre" => "Desarrollo Web en entorno cliente",
                        "profesor" => "José Aguilera",
                        "horas" => array(
                              array("Dia" => "Lunes", "Hora" => "3ª"),
                              array("Dia" => "Lunes", "Hora" => "4ª"),
                              array("Dia" => "Martes", "Hora" => "3ª"),
                              array("Dia" => "Martes", "Hora" => "4ª"),
                              array("Dia" => "Jueves", "Hora" => "1ª"),
                              array("Dia" => "Jueves", "Hora" => "2ª"),
                        )
                  ),
                  "DIS" => array(
                        "nombre" => "Disenio web",
                        "profesor" => "Jaime",
                        "horas" => array(
                              array("Dia" => "Miercoles", "Hora" => "3ª"),
                              array("Dia" => "Miercoles", "Hora" => "4ª"),
                              array("Dia" => "Jueves", "Hora" => "5ª"),
                              array("Dia" => "Jueves", "Hora" => "6ª"),
                              array("Dia" => "Viernes", "Hora" => "1ª"),
                              array("Dia" => "Viernes", "Hora" => "2ª"),
                        )
                  ),
                  "DESP" => array(
                        "nombre" => "Despliegues web",
                        "profesor" => "Mari Carmen Tripiana",
                        "horas" => array(
                              array("Dia" => "Martes", "Hora" => "5ª"),
                              array("Dia" => "Martes", "Hora" => "6ª"),
                              array("Dia" => "Viernes", "Hora" => "5ª"),
                        )
                  ),
                  "WP" => array(
                        "nombre" => "WordPress",
                        "profesor" => "Carolina",
                        "horas" => array(
                              array("Dia" => "Viernes", "Hora" => "6ª"),
                        )
                  ),
                  "HLC" => array(
                        "nombre" => "Horas de libre configuracion",
                        "profesor" => "Pablo Merida",
                        "horas" => array(
                              array("Dia" => "Jueves", "Hora" => "3ª"),
                              array("Dia" => "Jueves", "Hora" => "4ª"),
                        )
                  ),
                  "EMP" => array(
                        "nombre" => "Empresas",
                        "profesor" => "Raquel",
                        "horas" => array(
                              array("Dia" => "Miercoles", "Hora" => "5ª"),
                              array("Dia" => "Miercoles", "Hora" => "6ª"),
                              array("Dia" => "Lunes", "Hora" => "5ª"),
                              array("Dia" => "Lunes", "Hora" => "6ª"),

                        )
                  )
            )
      ),
      array(
            "grupo" => "1º DAW A",
            "horario" => array(
                  "PROG" => array(
                        "nombre" => "Programación",
                        "profesor" => "Rafael del Castillo",
                        "horas" => array(
                              array("Dia" => "Lunes", "Hora" => "1ª"),
                              array("Dia" => "Lunes", "Hora" => "2ª"),
                              array("Dia" => "Martes", "Hora" => "1ª"),
                              array("Dia" => "Martes", "Hora" => "2ª"),
                              array("Dia" => "Miercoles", "Hora" => "1ª"),
                              array("Dia" => "Miercoles", "Hora" => "2ª"),
                              array("Dia" => "Viernes", "Hora" => "3ª"),
                              array("Dia" => "Viernes", "Hora" => "4ª"),
                        )
                  ),
                  "BD" => array(
                        "nombre" => "Bases de Datos",
                        "profesor" => "Amelia Pérez",
                        "horas" => array(
                              array("Dia" => "Lunes", "Hora" => "5ª"),
                              array("Dia" => "Lunes", "Hora" => "6ª"),
                              array("Dia" => "Martes", "Hora" => "3ª"),
                              array("Dia" => "Martes", "Hora" => "4ª"),
                              array("Dia" => "Jueves", "Hora" => "1ª"),
                              array("Dia" => "Jueves", "Hora" => "2ª"),
                        )
                  ),
                  "ENT" => array(
                        "nombre" => "Entornos",
                        "profesor" => "Jaime",
                        "horas" => array(
                              array("Dia" => "Miercoles", "Hora" => "3ª"),
                              array("Dia" => "Miercoles", "Hora" => "4ª"),
                              array("Dia" => "Jueves", "Hora" => "3ª"),
                              array("Dia" => "Jueves", "Hora" => "4ª"),
                              array("Dia" => "Viernes", "Hora" => "1ª"),
                              array("Dia" => "Viernes", "Hora" => "2ª"),
                        )
                  ),
                  "SIST" => array(
                        "nombre" => "Sistemas informaticos",
                        "profesor" => "Miguel",
                        "horas" => array(
                              array("Dia" => "Martes", "Hora" => "5ª"),
                              array("Dia" => "Martes", "Hora" => "6ª"),
                              array("Dia" => "Viernes", "Hora" => "5ª"),
                        )
                  ),
                  "FOL" => array(
                        "nombre" => "WordPress",
                        "profesor" => "Carolina",
                        "horas" => array(
                              array("Dia" => "Viernes", "Hora" => "6ª"),
                        )
                  ),
                  "LM" => array(
                        "nombre" => "Lenguajes de marcas",
                        "profesor" => "Jose Aguilera",
                        "horas" => array(
                              array("Dia" => "Miercoles", "Hora" => "5ª"),
                              array("Dia" => "Miercoles", "Hora" => "6ª"),
                              array("Dia" => "Jueves", "Hora" => "5ª"),
                              array("Dia" => "Jueves", "Hora" => "6ª"),
                              array("Dia" => "Lunes", "Hora" => "3ª"),
                              array("Dia" => "Lunes", "Hora" => "4ª"),
                        )
                  )
            )
      )

);
