<div align='center'>

![Magazord](https://assets-global.website-files.com/62744430025fac4fab4c36ba/63e2792ae6613226287832d3_637237945749b26e533c20d7_Marca_Magazord_Prancheta%201.png)

 </div>

# Teste para vaga de Estágio Fullstack no Magazord.com.br

## Configuração do Projeto para Execução em Ambiente Local

### Pré-requisitos
Para executar o projeto localmente, é necessário ter as seguintes ferramentas instaladas:
- [Node.js](https://nodejs.org/en)
- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

## Backend
```sh
cd backEnd
```
### Configuração do Backend
Certifique-se de que o Docker esteja em execução e execute o seguinte comando:
```sh
docker-compose -f docker-compose.dev.yml up -d
```
### Retornar à pasta raiz
```sh
cd ..
```

## Frontend
```sh
cd frontEnd
```
### Configuração do Frontend
Instale as dependências necessárias com o seguinte comando:
```sh
npm install
```
### Iniciar o Servidor de Desenvolvimento
```sh
npm run dev
```

### Acessar Localhost
Acesse [Localhost](http://localhost:5173/)

Se a página não abrir corretamente, verifique onde o comando `npm run dev` está sendo executado.

## Documentação da API

- [DOCUMENTAÇÃO](backEnd/README.md)


## Problema Conhecido: Seleção Incorreta de Cidade com Nomes Iguais

### Descrição do Problema
Quando uma cidade brasileira possui o mesmo nome de uma cidade estrangeira, a API de Geolocalização retorna uma lista de cidades, o que pode resultar na seleção incorreta da cidade. Atualmente, o sistema utiliza uma função que busca a primeira cidade do Brasil, e se não encontrada, a cidade estrangeira é enviada, o que pode levar a resultados imprecisos.

### Exemplo do Problema
Por exemplo, ao procurar pela cidade "Alenquer," que existe tanto no Brasil quanto em Portugal, a seleção atual pode não garantir a escolha da cidade desejada.

### Comportamento Atual
O sistema atual prioriza a seleção da primeira cidade brasileira com o mesmo nome, o que pode levar a ambiguidades e resultados incorretos, especialmente em casos de homônimos internacionais.


## Ambiente de produção

#### Teste possui um ambiente de produção com hospedagem na [Vercel](https://vercel.com) para o frontend e [Heroku](https://heroku.com) para o backend

- [previsaotempo.online](https://previsaotempo.online)
