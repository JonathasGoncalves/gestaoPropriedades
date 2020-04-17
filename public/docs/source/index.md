---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_a44d4d75632ee7a526123c0009570ef7 -->
## api/tanque
> Example request:

```bash
curl -X GET -G "http://localhost/api/tanque" 
```

```javascript
const url = new URL("http://localhost/api/tanque");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Não autorizado"
}
```

### HTTP Request
`GET api/tanque`


<!-- END_a44d4d75632ee7a526123c0009570ef7 -->

<!-- START_f34bfe4506b83e014f2379ebb159b85f -->
## api/tanque/CbtAcimaDe300/{dataReferencia}
> Example request:

```bash
curl -X GET -G "http://localhost/api/tanque/CbtAcimaDe300/1" 
```

```javascript
const url = new URL("http://localhost/api/tanque/CbtAcimaDe300/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Não autorizado"
}
```

### HTTP Request
`GET api/tanque/CbtAcimaDe300/{dataReferencia}`


<!-- END_f34bfe4506b83e014f2379ebb159b85f -->

<!-- START_5465210cd07152d02fd95a04acf756e0 -->
## api/tanque/CcsAcimaDe500/{dataReferencia}
> Example request:

```bash
curl -X GET -G "http://localhost/api/tanque/CcsAcimaDe500/1" 
```

```javascript
const url = new URL("http://localhost/api/tanque/CcsAcimaDe500/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Não autorizado"
}
```

### HTTP Request
`GET api/tanque/CcsAcimaDe500/{dataReferencia}`


<!-- END_5465210cd07152d02fd95a04acf756e0 -->

<!-- START_4b8812516088fa89dd22c2affa90d05a -->
## api/tanque/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/api/tanque/1" 
```

```javascript
const url = new URL("http://localhost/api/tanque/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Não autorizado"
}
```

### HTTP Request
`GET api/tanque/{id}`


<!-- END_4b8812516088fa89dd22c2affa90d05a -->

<!-- START_26f13508dac12cc85fb59ddee5186043 -->
## api/cooperado
> Example request:

```bash
curl -X GET -G "http://localhost/api/cooperado" 
```

```javascript
const url = new URL("http://localhost/api/cooperado");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Não autorizado"
}
```

### HTTP Request
`GET api/cooperado`


<!-- END_26f13508dac12cc85fb59ddee5186043 -->

<!-- START_5bf21c0c8a2e95a2504fc5998b4e47ce -->
## api/cooperado/cooperadoPorLatao
> Example request:

```bash
curl -X GET -G "http://localhost/api/cooperado/cooperadoPorLatao" 
```

```javascript
const url = new URL("http://localhost/api/cooperado/cooperadoPorLatao");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Não autorizado"
}
```

### HTTP Request
`GET api/cooperado/cooperadoPorLatao`


<!-- END_5bf21c0c8a2e95a2504fc5998b4e47ce -->

<!-- START_ca89972ae05cb339defb17e2f0e592d7 -->
## api/cooperado/teste
> Example request:

```bash
curl -X GET -G "http://localhost/api/cooperado/teste" 
```

```javascript
const url = new URL("http://localhost/api/cooperado/teste");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Não autorizado"
}
```

### HTTP Request
`GET api/cooperado/teste`


<!-- END_ca89972ae05cb339defb17e2f0e592d7 -->

<!-- START_cf435b526fd340c17fc1f21b57083b66 -->
## api/qualidade
> Example request:

```bash
curl -X GET -G "http://localhost/api/qualidade" 
```

```javascript
const url = new URL("http://localhost/api/qualidade");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Não autorizado"
}
```

### HTTP Request
`GET api/qualidade`


<!-- END_cf435b526fd340c17fc1f21b57083b66 -->

<!-- START_eb7dc45ae01292973a2e850d7643c642 -->
## api/submissao/{formulario_id}/{cooperado_id}
> Example request:

```bash
curl -X GET -G "http://localhost/api/submissao/1/1" 
```

```javascript
const url = new URL("http://localhost/api/submissao/1/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Não autorizado"
}
```

### HTTP Request
`GET api/submissao/{formulario_id}/{cooperado_id}`


<!-- END_eb7dc45ae01292973a2e850d7643c642 -->

<!-- START_698265b4077360b3abff6001491f8423 -->
## api/submissao
> Example request:

```bash
curl -X POST "http://localhost/api/submissao" 
```

```javascript
const url = new URL("http://localhost/api/submissao");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/submissao`


<!-- END_698265b4077360b3abff6001491f8423 -->

<!-- START_19bf49974d7159bad82981e5c50b4d23 -->
## api/submissao/{submissao_id}
> Example request:

```bash
curl -X GET -G "http://localhost/api/submissao/1" 
```

```javascript
const url = new URL("http://localhost/api/submissao/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Não autorizado"
}
```

### HTTP Request
`GET api/submissao/{submissao_id}`


<!-- END_19bf49974d7159bad82981e5c50b4d23 -->

<!-- START_14fdd0b51d40e235551f47f9f28306f4 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X GET -G "http://localhost/api/submissao" 
```

```javascript
const url = new URL("http://localhost/api/submissao");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Não autorizado"
}
```

### HTTP Request
`GET api/submissao`


<!-- END_14fdd0b51d40e235551f47f9f28306f4 -->

<!-- START_be2d3709b63a8071fc5f189857ced56f -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X GET -G "http://localhost/api/OpcaoPergunta_submissaoController" 
```

```javascript
const url = new URL("http://localhost/api/OpcaoPergunta_submissaoController");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Não autorizado"
}
```

### HTTP Request
`GET api/OpcaoPergunta_submissaoController`


<!-- END_be2d3709b63a8071fc5f189857ced56f -->

<!-- START_e3982d6e557c80ff4239e57acf6bf6fd -->
## api/formulario
> Example request:

```bash
curl -X GET -G "http://localhost/api/formulario" 
```

```javascript
const url = new URL("http://localhost/api/formulario");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Não autorizado"
}
```

### HTTP Request
`GET api/formulario`


<!-- END_e3982d6e557c80ff4239e57acf6bf6fd -->

<!-- START_dc3561f74cc8c626815424b36482c6f8 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/OpcaoPerguntaSubmissao" 
```

```javascript
const url = new URL("http://localhost/api/OpcaoPerguntaSubmissao");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/OpcaoPerguntaSubmissao`


<!-- END_dc3561f74cc8c626815424b36482c6f8 -->

<!-- START_7662d1704ad921f3420e495beb6aed12 -->
## api/autenticacao/logout
> Example request:

```bash
curl -X POST "http://localhost/api/autenticacao/logout" 
```

```javascript
const url = new URL("http://localhost/api/autenticacao/logout");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/autenticacao/logout`


<!-- END_7662d1704ad921f3420e495beb6aed12 -->

<!-- START_aad160ead38b466e14803b0d4523da32 -->
## api/autenticacao/refresh
> Example request:

```bash
curl -X POST "http://localhost/api/autenticacao/refresh" 
```

```javascript
const url = new URL("http://localhost/api/autenticacao/refresh");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/autenticacao/refresh`


<!-- END_aad160ead38b466e14803b0d4523da32 -->

<!-- START_36ebc546c671d9361e5964d5afdaa705 -->
## api/autenticacao/me
> Example request:

```bash
curl -X POST "http://localhost/api/autenticacao/me" 
```

```javascript
const url = new URL("http://localhost/api/autenticacao/me");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/autenticacao/me`


<!-- END_36ebc546c671d9361e5964d5afdaa705 -->

<!-- START_cd7610514889a0fe2b9f1de3a4aecade -->
## api/observacao/teste
> Example request:

```bash
curl -X POST "http://localhost/api/observacao/teste" 
```

```javascript
const url = new URL("http://localhost/api/observacao/teste");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/observacao/teste`


<!-- END_cd7610514889a0fe2b9f1de3a4aecade -->

<!-- START_62248cea2f0c477cd22d1b5d09d6a1a9 -->
## api/observacao
> Example request:

```bash
curl -X GET -G "http://localhost/api/observacao" 
```

```javascript
const url = new URL("http://localhost/api/observacao");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Não autorizado"
}
```

### HTTP Request
`GET api/observacao`


<!-- END_62248cea2f0c477cd22d1b5d09d6a1a9 -->

<!-- START_189dd70f5114a31d30003101879512b6 -->
## api/autenticacao/login
> Example request:

```bash
curl -X POST "http://localhost/api/autenticacao/login" 
```

```javascript
const url = new URL("http://localhost/api/autenticacao/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/autenticacao/login`


<!-- END_189dd70f5114a31d30003101879512b6 -->

<!-- START_ef72d94bd6ee25c9112b18a98f8277f6 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/tecnico" 
```

```javascript
const url = new URL("http://localhost/api/tecnico");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/tecnico`


<!-- END_ef72d94bd6ee25c9112b18a98f8277f6 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET -G "http://localhost/login" 
```

```javascript
const url = new URL("http://localhost/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST "http://localhost/login" 
```

```javascript
const url = new URL("http://localhost/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST "http://localhost/logout" 
```

```javascript
const url = new URL("http://localhost/logout");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET -G "http://localhost/register" 
```

```javascript
const url = new URL("http://localhost/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST "http://localhost/register" 
```

```javascript
const url = new URL("http://localhost/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET -G "http://localhost/password/reset" 
```

```javascript
const url = new URL("http://localhost/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST "http://localhost/password/email" 
```

```javascript
const url = new URL("http://localhost/password/email");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET -G "http://localhost/password/reset/1" 
```

```javascript
const url = new URL("http://localhost/password/reset/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST "http://localhost/password/reset" 
```

```javascript
const url = new URL("http://localhost/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_cb859c8e84c35d7133b6a6c8eac253f8 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET -G "http://localhost/home" 
```

```javascript
const url = new URL("http://localhost/home");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET home`


<!-- END_cb859c8e84c35d7133b6a6c8eac253f8 -->


