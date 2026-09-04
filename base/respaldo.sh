#!/bin/bash

opcion=0

while [ $opcion -ne 4 ]
do

    echo "-------------------------"
    echo " RESPALDOS COVASG"
    echo "-------------------------"
    echo "1 - Crear respaldo"
    echo "2 - Ver respaldos"
    echo "3 - Restaurar respaldo"
    echo "4 - Salir"

    read -p "Ingrese una opcion: " opcion

    if [ $opcion -eq 1 ]
    then
        echo "Creando respaldo..."

        fecha=$(date +%Y-%m-%d_%H-%M)

        mkdir -p respaldos

        /c/xampp/mysql/bin/mysqldump.exe -u root proyecto__ > respaldos/respaldo_$fecha.sql

        echo "Respaldo creado."
    fi


    if [ $opcion -eq 2 ]
    then
        echo "Respaldos guardados:"

        ls respaldos
    fi


    if [ $opcion -eq 3 ]
    then
        echo "Respaldos disponibles:"

        ls respaldos

        echo ""
        read -p "Escriba el nombre del respaldo: " archivo

        echo "Restaurando respaldo..."

        /c/xampp/mysql/bin/mysql.exe -u root -e "DROP DATABASE proyecto__;"
        /c/xampp/mysql/bin/mysql.exe -u root -e "CREATE DATABASE proyecto__;"
        /c/xampp/mysql/bin/mysql.exe -u root proyecto__ < respaldos/$archivo

        echo "Respaldo restaurado."
    fi


    if [ $opcion -eq 4 ]
    then
        echo "Programa finalizado."
    fi

done