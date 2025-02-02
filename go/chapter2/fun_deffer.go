package main

import "fmt"

func first() {
    fmt.Println("1st")
}
func second() {
    fmt.Println("2nd")
}

func three() {
    fmt.Println("3nd")
}
func main() {
var x [2]int

defer func() {
        str := recover()
        fmt.Println("Ошибка!")
        fmt.Println(str)
    }()
    //panic("PANIC")
    //x[2] = 1;

 defer three()
 defer second()
    first()
}