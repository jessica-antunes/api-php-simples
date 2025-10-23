# API PHP Simples (sem framework)

Endpoints:
- `GET /contatos` — lista contatos fictícios
- `POST /contatos` — cria contato (JSON: `{ "nome": "...", "email": "..." }`)

## Rodar local
```bash
php -S 0.0.0.0:8080 -t public
# GET:
curl http://localhost:8080/contatos
# POST:
curl -X POST http://localhost:8080/contatos -H "Content-Type: application/json" -d '{"nome":"Jéssica","email":"jessica@mail.com"}'
```

## Deploy grátis (sugestões)
- Render.com ou Railway.app (PHP). Publique a pasta `public` como document root.
