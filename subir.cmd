echo "# aula7  %date%  %time%" > README.md
git init
git add . -v
git commit -m "first commit"
git branch -M main
git remote add origin git@github.com:suzana-art/aula7.git
git push -u origin main