package main

import (
    "fmt"
    "os"
)

func main() {
    file, err := os.Open("test.txt")
    if err != nil {
        // здесь перехватывается ошибка
        fmt.Println("Файл не найден")
        return
    }
    defer file.Close()

    // получить размер файла
    stat, err := file.Stat()
    if err != nil {
        return
    }
     fmt.Println("Размер: ",stat.Size())
    // чтение файла
    bs := make([]byte, stat.Size())
    _, err = file.Read(bs)
    if err != nil {
        return
    }

    str := string(bs)
    fmt.Println(str)
}