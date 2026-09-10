@echo off
chcp 65001 >nul
title Upload GitHub - Aula 7

echo.
echo ==========================================
echo              AULA 7 - GITHUB
echo ==========================================
echo.

:: ==============================
:: INFORMAÇÕES DO SISTEMA
:: ==============================
set "SISTEMA=Aula 7"
set "REPOSITORIO=aula7"

:: ==============================
:: CRIA README
:: ==============================
(
echo # 🚀 %SISTEMA%
echo.
echo ┌──────────────────────────────────────┐
echo │              %SISTEMA%               │
echo │          Projeto em desenvolvimento   │
echo └──────────────────────────────────────┘
echo.
echo **Informações do projeto**
echo.
echo - 📁 Diretório: `%CD%`
echo - 📅 Data: %DATE%
echo - 🕐 Hora: %TIME%
echo - 💻 Sistema: Windows
echo - 📦 Repositório: %REPOSITORIO%
echo.
echo ---
echo.
echo Projeto desenvolvido para fins acadêmicos.
echo.
echo **Última atualização:** %DATE% %TIME%
) > README.md

echo README.md criado!
echo.

:: ==============================
:: GIT
:: ==============================
git init

echo.
echo Adicionando arquivos...
git add . -v

echo.
echo Criando commit...
git commit -m "Atualização do projeto - %DATE% %TIME%"

echo.
echo Configurando branch...
git branch -M main

echo.
echo Configurando repositorio remoto...
git remote remove origin 2>nul
git remote add origin git@github.com:suzana-art/aula7.git

echo.
echo Enviando para GitHub...
git push -u origin main

echo.
echo ==========================================
echo          UPLOAD CONCLUIDO!
echo ==========================================
echo.
pause