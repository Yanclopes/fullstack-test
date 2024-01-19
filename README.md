
# Teste

## Configuração do projeto para rodar em ambiente local

#### Necessário possuir instalado
- [Node.Js](https://nodejs.org/en)
- [Docker](https://www.docker.com/)

## Backend
```sh
cd backEnd
```
### Backend Setup
Docker deve estar sendo executado
```sh
docker-compose -f docker-compose.dev.yml up -d
```
### Voltar para pasta raiz
```sh
cd ..
```
## Frontend
```sh
cd frontEnd
```
### Frontend Setup
```sh
npm install
```
### Servidor de desenvolvimento
```sh
npm run dev
```

### Acessar localhost
[Localhost](http://localhost:5173/)

Caso não abra de maneira correta verifique onde esta sendo executado o npm run dev

## Documentação da API

- [README](backEnd/README.md)


## Backend em produção

#### O backend possui ambiente de produção ja configurado e pode ser testado a partir do front em ambiente local

### Trocar variavel de ambiente para produção
```sh
cd frontEnd
```
```sh
(Get-Content .env) -replace 'VITE_APP_BASE_URL=http://localhost:8080', 'VITE_APP_BASE_URL=18.222.108.134:8080' | Set-Content .env
```

### Trocar voltar para ambiente Local
```sh
cd frontEnd
```
```sh
(Get-Content .env) -replace 'VITE_APP_BASE_URL=18.222.108.134:8080', 'VITE_APP_BASE_URL=http://localhost:8080' | Set-Content .env
```