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


<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## api/login
> Example request:

```bash
curl -X POST \
    "/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"login":9,"password":"ipsa"}'

```

```javascript
const url = new URL(
    "/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "login": 9,
    "password": "ipsa"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```
> Example response (404):

```json
{
    "message": "Неверный логин\/пароль"
}
```

### HTTP Request
`POST api/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `login` | integer |  required  | The id of the user.
        `password` | string |  optional  | The id of the room.
    
<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_00e7e21641f05de650dbe13f242c6f2c -->
## api/logout
> Example request:

```bash
curl -X GET \
    -G "/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Successfully logged out"
}
```

### HTTP Request
`GET api/logout`


<!-- END_00e7e21641f05de650dbe13f242c6f2c -->

<!-- START_1ae2cc25e1afb2b87a70a92c6cd5a56a -->
## api/order/create
> Example request:

```bash
curl -X POST \
    "/api/order/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"price":15,"time":"laudantium","from_street":"aliquam","from_house":"voluptas","from_entrance":"sit","to_street":"error","to_house":"laborum","to_entrance":"et","comment":"et","city_type":"nam"}'

```

```javascript
const url = new URL(
    "/api/order/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "price": 15,
    "time": "laudantium",
    "from_street": "aliquam",
    "from_house": "voluptas",
    "from_entrance": "sit",
    "to_street": "error",
    "to_house": "laborum",
    "to_entrance": "et",
    "comment": "et",
    "city_type": "nam"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/order/create`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `price` | integer |  required  | 
        `time` | string |  required  | 
        `from_street` | string |  required  | 
        `from_house` | string |  required  | 
        `from_entrance` | string |  required  | 
        `to_street` | string |  required  | 
        `to_house` | string |  required  | 
        `to_entrance` | string |  required  | 
        `comment` | string |  required  | 
        `city_type` | string |  optional  | required. usharal or intercity
    
<!-- END_1ae2cc25e1afb2b87a70a92c6cd5a56a -->

<!-- START_f9301c03a9281c0847565f96e6f723de -->
## api/orders
> Example request:

```bash
curl -X GET \
    -G "/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"city_type":"similique"}'

```

```javascript
const url = new URL(
    "/api/orders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "city_type": "similique"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "message": "These credentials do not match our records."
    }
}
```

### HTTP Request
`GET api/orders`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `city_type` | string |  required  | The usharal or intercity.
    
<!-- END_f9301c03a9281c0847565f96e6f723de -->

<!-- START_9d30346008ff546466a6f25b0ab71fad -->
## api/order/confirm
> Example request:

```bash
curl -X POST \
    "/api/order/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"order_id":11}'

```

```javascript
const url = new URL(
    "/api/order/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "order_id": 11
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/order/confirm`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `order_id` | integer |  required  | 
    
<!-- END_9d30346008ff546466a6f25b0ab71fad -->

<!-- START_d52c5da2483ab63fece901e549a619bc -->
## api/user/order/{id}
> Example request:

```bash
curl -X GET \
    -G "/api/user/order/tenetur" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "/api/user/order/tenetur"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Order] tenetur"
}
```

### HTTP Request
`GET api/user/order/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | int required. Order id

<!-- END_d52c5da2483ab63fece901e549a619bc -->

<!-- START_cc05de6ef2d85155ed5ab0bdd0ea9909 -->
## api/order/cancel/{id}
> Example request:

```bash
curl -X GET \
    -G "/api/order/cancel/ducimus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "/api/order/cancel/ducimus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Order] ducimus"
}
```

### HTTP Request
`GET api/order/cancel/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | int required. Order id

<!-- END_cc05de6ef2d85155ed5ab0bdd0ea9909 -->


