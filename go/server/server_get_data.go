package main

import (
    "encoding/json"
    "fmt"
    "net/http"
    "log"
)

type Person struct {
    Name string
    Age int
}

var people []Person

func main(){
   http.HandleFunc("/people",peopleHandler)
   http.HandleFunc("/check",checkHandler)

   log.Println("Server run")
   err := http.ListenAndServe("localhost:8080", nil)
   if err != nil {
        log.Fatal(err)
   }
}

func peopleHandler(w http.ResponseWriter, r *http.Request) {
    switch r.Method {
    case http.MethodGet:
        getPeople(w, r)
    case http.MethodPost:
        postPeople(w, r)
    default:
        http.Error(w, "Invalid http method", http.StatusMethodNotAllowed)
    }
}

func getPeople(w http.ResponseWriter, r *http.Request){
    json.NewEncoder(w).Encode(people)
    fmt.Fprint(w, "get people: '%v'",people)
}
func postPeople(w http.ResponseWriter, r *http.Request){
    var person Person
    err := json.NewDecoder(r.Body).Decode(&person)
    if err != nil {
        http.Error(w, err.Error(),http.StatusInternalServerError)
        return
    }

    people = append(people, person)
    fmt.Fprint(w, "people add: '%v'", person)
}
func checkHandler(w http.ResponseWriter, r *http.Request){
}