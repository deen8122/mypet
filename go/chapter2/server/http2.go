package main
import (
    "fmt"
    "net/http"
    "io"
    "os"
)
func main() {
   resp, err := http.Get("https://google.com")
   if err != nil {
         fmt.Println(err)
         return
   }
   defer resp.Body.Close()
   io.Copy(os.Stdout, resp.Body)

}