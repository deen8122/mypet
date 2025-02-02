package main

import "fmt"

func main() {
  x := make(map[string]int)
  x["key"] = 10
  x["aaa"] = 12
   fmt.Println(x)

   elements := map[string]map[string]string{
            "H": map[string]string{
            "name":"Hydrogen",
            "state":"gas",
        },
        "He": map[string]string{
            "name":"Helium",
            "state":"gas",
        },
        "Li": map[string]string{
            "name":"Lithium",
            "state":"solid",
        },
        "Be": map[string]string{
            "name":"Beryllium",
            "state":"solid",
        },
        "B":  map[string]string{
            "name":"Boron",
            "state":"solid",
        },
        "C":  map[string]string{
            "name":"Carbon",
            "state":"solid",
        },
        "N":  map[string]string{
            "name":"Nitrogen",
            "state":"gas",
        },
        "O":  map[string]string{
            "name":"Oxygen",
            "state":"gas",
        },
        "F":  map[string]string{
            "name":"Fluorine",
            "state":"gas",
        },
        "Ne":  map[string]string{
            "name":"Neon",
            "state":"gas",
        },
    }

/*
   Доступ к элементу карты может вернуть два значения вместо одного.
    Первое значение это результат запроса, второе говорит, был ли запрос успешен.
*/
    if el, ok := elements["Li"]; ok {
        fmt.Println(el["name"], el["state"])
    }
   // fmt.Println(ok)

   elements2 := map[string]string{
       "H": "Hydrogen",
       "He": "Helium",
       "Li": "Lithium",
       "Be": "Beryllium",
       "B": "Boron",
       "C": "Carbon",
       "N": "Nitrogen",
       "O": "Oxygen",
       "F": "Fluorine",
       "Ne": "Neon",
   }
    fmt.Println(elements2["B"])

}