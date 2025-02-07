package main

import (
	"fmt"
	"os"
)

func main() {
	// Получаем PID текущего процесса
	pid := os.Getpid()
	fmt.Printf("PID текущего процесса: %d\n", pid)

	// Предлагаем пользователю завершить процесс
	fmt.Println("Нажмите Enter, чтобы завершить процесс...")
	fmt.Scanln() // Ожидаем нажатия Enter

	// Завершаем программу с кодом 0 (успешное завершение)
	fmt.Println("Завершение программы.")
	os.Exit(0)
}