@echo off

C:\xampp\mysql\bin\mysql.exe -u root proyecto__ < proyecto_backup.sql

if %errorlevel%==0 (
    echo Base de datos restaurada correctamente.
) else (
    echo Error al restaurar la base de datos.
)

pause