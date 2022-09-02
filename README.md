- **[WSL and Docker config](https://docs.docker.com/desktop/windows/wsl/).**
- **[WSL connection through a development environment (VS code)](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.vscode-remote-extensionpack). The point is to be able to enter linux and access the project files.**
- **Select any folder for example: `/home/user/` and clone the repo.**
- **Entering the root of the project**
- **Create `.env` file with copy of the `.env.example` content**
- **Installing Composer Dependencies: 
  `docker run --rm \
  -u "$(id -u):$(id -g)" \
  -v $(pwd):/var/www/html \
  -w /var/www/html \
  laravelsail/php81-composer:latest \
  composer install --ignore-platform-reqs`**
- **Run`./vendor/bin/sail up` which starts the Docker container (it may take a long time for the first start!).**
- **Open new terminal**
- **Then installation via sail commands: `./vendor/bin/sail composer install`, `./vendor/bin/sail npm install`, `./vendor/bin/sail npm run build`.**
- **Run migrations and seed tables `./vendor/bin/sail artisan migrate:fresh --seed`**
- **Open app url: `http://localhost/`**
- **Delete previous volumes if needed `./vendor/bin/sail down -v`**
