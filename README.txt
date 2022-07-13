
:::START:::





:::API:::
// index
curl \
  --request GET \
  --header "Content-Type: application/json" \
  http://localhost:8080/api/user-review?access_token=<token>

// by id
curl \
  --request GET \
  --header "Content-Type: application/json" \
  http://localhost:8080/api/user-review/id/<id>?access_token=<token>

// by ip
curl \
  --request GET \
  --header "Content-Type: application/json" \
  http://localhost:8080/api/user-review/ip/<ip>?access_token=<token>

// get all authors
curl \
  --request GET \
  --header "Content-Type: application/json" \
  http://localhost:8080/api/user-review/author?access_token=<token>


// create
curl \
  --request POST \
  --header "Content-Type: application/json" \
  --data '{"name":"Actor_ex","email":"Actor_ex@email.com","review":"data_ex","rating":"2","advantage":"advantage_ex"}' \
  http://localhost:8080/api/user-review/create?access_token=<token>

// update
curl \
  --request POST \
  --header "Content-Type: application/json" \
  --data '{"id":"1","name":"Actor_ex_2","email":"Actor_ex_2@email.com","review":"data_ex_2","rating":"3","advantage":"advantage_ex_2"}' \
  http://localhost:8080/api/user-review/update?access_token=<token>

