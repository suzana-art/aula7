@echo off
chcp 65001 >nul
title Upload GitHub - NEXA

echo.
echo ==========================================
echo              NEXA - AULA 7
echo ==========================================
echo.

:: ==============================
:: INFORMACOES
:: ==============================
set "SISTEMA=NEXA"
set "PROJETO=Aula 7"
set "REPOSITORIO=aula7"

:: ==============================
:: CRIAR README
:: ==============================
(
echo # 🚀 NEXA - %PROJETO%
echo.
echo ## 💻 Sistema NEXA
echo.
echo Projeto desenvolvido para fins acadêmicos.
echo.
echo ### 📌 Informações do projeto
echo.
echo ^| Informação ^| Detalhe ^|
echo ^|---^|---^|
echo ^| 📁 Diretório ^| `%CD%` ^|
echo ^| 📅 Data ^| %DATE% ^|
echo ^| 🕐 Hora ^| %TIME% ^|
echo ^| 💻 Sistema ^| Windows ^|
echo ^| 📦 Repositório ^| %REPOSITORIO% ^|
echo.
echo ---
echo.
echo ## 🌐 NEXA
echo.
echo **Tecnologia da Informação e suporte técnico.**
echo.
echo A NEXA conecta empresas que precisam de suporte técnico a profissionais qualificados de TI.
echo.
echo ---
echo.
echo 📅 **Última atualização:** %DATE% às %TIME%
) > README.md

echo README.md criado com sucesso!
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
git commit -m "NEXA - %PROJETO% - %DATE% %TIME%"

echo.
echo Configurando branch...
git branch -M main

echo.
echo Configurando GitHub...
git remote remove origin 2>nul
git remote add origin git@github.com:suzana-art/aula7.git

echo.
echo Enviando projeto para o GitHub...
git push -u origin main

echo.
echo ==========================================
echo          🚀 NEXA ENVIADA!
echo ==========================================
echo.
pause