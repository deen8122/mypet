package main

import (
    "os"
    "bufio"
    "log"
   // "strings"
    "fmt"
    "unicode"
)

func main() {
    lines, err := readLines("input.txt")

    if err != nil {
        log.Fatalf("readLines: %s", err)
    }

    var result []string
    for _, item := range lines {

        if( checkPhones(item )){
            fmt.Println("true")
             result = append(result,item);
        }
        //arr:= strings.Split(item, " ")
       // result = append(result, "Server: " + arr[0] + ", Username: "+ arr[1] + ", Key: " + arr[2] );
    }
    writeLines(result, "output.txt")
    fmt.Println(result)
}

func checkPhones(phone string) bool {
// Проверяем длину номера
	if len(phone) < 11 || len(phone) > 16 {
		return false
	}

	// Проверяем, что номер начинается с '+'
	if phone[0] != '+' {
		return false
	}

	// Проверяем, что все остальные символы — цифры
	for _, char := range phone[1:] {
		if !unicode.IsDigit(char) {
			return false
		}
	}

	return true
}
func readLines(path string) ([]string, error) {
    file, err := os.Open(path)
    if err != nil {
        return nil, err
    }
    defer file.Close()
    var lines []string

    scanner := bufio.NewScanner(file)
    for scanner.Scan() {
        lines = append(lines, scanner.Text())
    }
    return lines, scanner.Err()
}

func writeLines(lines []string, path string) error {
    file, err := os.OpenFile(path, os.O_APPEND|os.O_CREATE|os.O_WRONLY, 0644)
    if err != nil {
        return err
    }

    for _, line := range lines {
        file.WriteString(line + "\n")
    }

    return file.Close()
}