package main

import "fmt"

// this is a comment
const x string = "Hello World 2"
func main() {
    fmt.Println( x )
 for i := 1; i <= 10; i++ {
       if i % 2 == 0 {
            fmt.Println(i, "even")
        } else {
            fmt.Println(i, "odd")
        }
    }
//===========
    i := 1
        for i <= 10 {
            fmt.Println(i)
            i = i + 1
        }

    //-------------
     for i := 1; i <= 10; i++ {
            fmt.Println(i)
        }
}