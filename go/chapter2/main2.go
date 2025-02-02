package main

import "fmt"

// this is a comment
const x string = "Hello World 2"
func main() {
    slice11 := []int{6,7,8}
    slice21 := make([]int, 2)
    copy(slice21, slice11)
    fmt.Println(slice11, slice21)
    fmt.Println("==========")


//-----------
    slice1 := []int{1,2,3}
    slice2 := append(slice1, 4, 5)
    fmt.Println(slice1, slice2)

var sli []float64
    sli1 := make([]float64, 5)
    sli2 := make([]float64, 5, 10)
    fmt.Println(sli)
fmt.Println(sli1)
fmt.Println(sli2)

var x [5]float64
    x[0] = 98
    x[1] = 93
    x[2] = 77
    x[3] = 82
    x[4] = 83

    var total float64 = 0
    for _, value := range x {
        total += value
    }
    fmt.Println(total / float64(len(x)))
}