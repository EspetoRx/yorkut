## Sobre o Yorkut

Clone do Orkut feito em Laravel + Vue.JS 3.
Aplicação Dockerizada

## Reproduza

Faça o clone e rode

``cp .env.example .env``

``docker compose up --build -d``

``docker exec yorkut_app php artisan migrate``

Configure as variáveis de ambiente do hCaptcha. Adicione no seu .env:
```
VITE_H_CAPTCHA_SITE_KEY=
VITE_H_CAPTCHA_SITE_SECRET=
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
