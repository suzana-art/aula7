@echo off

REM Vai para a pasta onde este arquivo está
cd /d "%~dp0"

REM Inicia o servidor PHP usando a pasta public como raiz
start "" c:\xampp\php\php.exe -S 127.0.0.1:8000 -t public

REM Aguarda o servidor iniciar
timeout /t 2 >nul

REM Abre o navegador
start http://127.0.0.1:8000