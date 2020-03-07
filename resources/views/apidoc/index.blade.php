<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="/docs/css/style.css" />
    <script src="/docs/js/all.js"></script>


          <script>
        $(function() {
            setupLanguages(["bash","javascript"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="/docs/images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <img src="/docs/images/logo.png" />
                    <div class="lang-selector">
                                  <a href="#" data-language-name="bash">bash</a>
                                  <a href="#" data-language-name="javascript">javascript</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li><a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a></li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <!-- START_INFO -->
<h1>Info</h1>
<p>Welcome to the generated API reference.
<a href="{{ route("apidoc", ["format" => ".json"]) }}">Get Postman Collection</a></p>
<!-- END_INFO -->
<h1>general</h1>
<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
<h2>api/login</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"login":9,"password":"enim"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "login": 9,
    "password": "enim"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Неверный логин\/пароль"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/login</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>login</code></td>
<td>integer</td>
<td>required</td>
<td>The id of the user.</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>optional</td>
<td>The id of the room.</td>
</tr>
</tbody>
</table>
<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->
<!-- START_00e7e21641f05de650dbe13f242c6f2c -->
<h2>api/logout</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Successfully logged out"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/logout</code></p>
<!-- END_00e7e21641f05de650dbe13f242c6f2c -->
<!-- START_1ae2cc25e1afb2b87a70a92c6cd5a56a -->
<h2>api/order/create</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "/api/order/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"price":3,"time":"nihil","from_street":"quo","from_house":"fugit","from_entrance":"sit","to_street":"recusandae","to_house":"eos","to_entrance":"possimus","comment":"necessitatibus","city_type":"ut"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/order/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "price": 3,
    "time": "nihil",
    "from_street": "quo",
    "from_house": "fugit",
    "from_entrance": "sit",
    "to_street": "recusandae",
    "to_house": "eos",
    "to_entrance": "possimus",
    "comment": "necessitatibus",
    "city_type": "ut"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/order/create</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>price</code></td>
<td>integer</td>
<td>required</td>
</tr>
<tr>
<td><code>time</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>from_street</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>from_house</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>from_entrance</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>to_street</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>to_house</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>to_entrance</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>comment</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>city_type</code></td>
<td>string</td>
<td>optional</td>
<td>required. usharal or intercity</td>
</tr>
</tbody>
</table>
<!-- END_1ae2cc25e1afb2b87a70a92c6cd5a56a -->
<!-- START_f9301c03a9281c0847565f96e6f723de -->
<h2>api/orders</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"city_type":"dolorum"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/orders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "city_type": "dolorum"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "message": "These credentials do not match our records."
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/orders</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>city_type</code></td>
<td>string</td>
<td>required</td>
<td>The usharal or intercity.</td>
</tr>
</tbody>
</table>
<!-- END_f9301c03a9281c0847565f96e6f723de -->
<!-- START_9d30346008ff546466a6f25b0ab71fad -->
<h2>api/order/confirm</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "/api/order/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"driver_id":17,"order_id":9}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/order/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "driver_id": 17,
    "order_id": 9
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/order/confirm</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>driver_id</code></td>
<td>integer</td>
<td>required</td>
</tr>
<tr>
<td><code>order_id</code></td>
<td>integer</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_9d30346008ff546466a6f25b0ab71fad -->
<!-- START_d52c5da2483ab63fece901e549a619bc -->
<h2>api/user/order/{id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/api/user/order/1?id=architecto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/user/order/1"
);

let params = {
    "id": "architecto",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "No query results for model [App\\Order] 1"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/user/order/{id}</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>optional</td>
<td>int required. Order id</td>
</tr>
</tbody>
</table>
<!-- END_d52c5da2483ab63fece901e549a619bc -->
<!-- START_cc05de6ef2d85155ed5ab0bdd0ea9909 -->
<h2>api/order/cancel/{id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/api/order/cancel/1?id=deleniti" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/order/cancel/1"
);

let params = {
    "id": "deleniti",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "No query results for model [App\\Order] 1"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/order/cancel/{id}</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>optional</td>
<td>int required. Order id</td>
</tr>
</tbody>
</table>
<!-- END_cc05de6ef2d85155ed5ab0bdd0ea9909 -->
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                              </div>
                </div>
    </div>
  </body>
</html>