package main

import (
	"fmt"
	"math/rand"
	"sync"
	"time"
)

// Order представляет заказ клиента
type Order struct {
	ID    int
	Dish  string
}

// Chef готовит блюда
func chef(id int, orders <-chan Order, readyDishes chan<- Order, wg *sync.WaitGroup) {
	defer wg.Done()
	for order := range orders {
		fmt.Printf("Повар %d готовит блюдо: %s (заказ %d)\n", id, order.Dish, order.ID)
		time.Sleep(time.Duration(rand.Intn(3)+1) * time.Second) // Время приготовления
		readyDishes <- order
		fmt.Printf("Повар %d завершил блюдо: %s (заказ %d)\n", id, order.Dish, order.ID)
	}
}

// Waiter доставляет блюда клиентам
func waiter(id int, readyDishes <-chan Order, wg *sync.WaitGroup) {
	defer wg.Done()
	for dish := range readyDishes {
		fmt.Printf("Официант %d доставляет блюдо: %s (заказ %d)\n", id, dish.Dish, dish.ID)
		time.Sleep(time.Duration(rand.Intn(2)+1) * time.Second) // Время доставки
		fmt.Printf("Официант %d доставил блюдо: %s (заказ %d)\n", id, dish.Dish, dish.ID)
	}
}

func main() {
	rand.Seed(time.Now().UnixNano())

	// Каналы для заказов и готовых блюд
	orders := make(chan Order, 10)
	readyDishes := make(chan Order, 10)

	// WaitGroup для поваров и официантов
	var chefsWg sync.WaitGroup
	var waitersWg sync.WaitGroup

	// Запуск поваров
	numChefs := 3
	chefsWg.Add(numChefs)
	for i := 1; i <= numChefs; i++ {
		go chef(i, orders, readyDishes, &chefsWg)
	}

	// Запуск официантов
	numWaiters := 2
	waitersWg.Add(numWaiters)
	for i := 1; i <= numWaiters; i++ {
		go waiter(i, readyDishes, &waitersWg)
	}

	// Клиенты делают заказы
	numOrders := 10
	for i := 1; i <= numOrders; i++ {
		order := Order{ID: i, Dish: fmt.Sprintf("Блюдо %d", i)}
		fmt.Printf("Клиент сделал заказ: %s (заказ %d)\n", order.Dish, order.ID)
		orders <- order
	}

	// Закрываем канал заказов после того, как все заказы сделаны
	close(orders)

	// Ожидаем завершения всех поваров
	chefsWg.Wait()

	// Закрываем канал готовых блюд после завершения всех поваров
	close(readyDishes)

	// Ожидаем завершения всех официантов
	waitersWg.Wait()

	fmt.Println("Все заказы обработаны, ресторан закрывается.")
}