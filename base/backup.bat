@echo off

C:\xampp\mysql\bin\mysqldump.exe -u root proyecto__ > proyecto_backup.sql

if %errorlevel%==0 (
    echo Backup realizado correctamente.
) else (
    echo Error al realizar el backup.
)

pause