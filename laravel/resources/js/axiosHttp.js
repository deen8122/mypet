import axios from "axios"

const httpClient = axios.create({
    baseURL: import.meta.env.VITE_API_URL,
    headers: {
        'Content-type': 'application/json',
    }
})

httpClient.interceptors.request.use(function (config) {
    const user = JSON.parse(localStorage.getItem('User'))
    if (user?.token) {
        config.headers.Authorization ='Bearer ' + user.token
    }
    if (user?.company) {
        config.headers.Company = user.company
    }

    return config
}, function (error) {
    return Promise.reject(error)
});

httpClient.interceptors.response.use(
  response => response,
  error => {
      if (error.code === 'ERR_NETWORK') {
          notification.error("Нет сети...")
      }

      const user = JSON.parse(localStorage.getItem('User'))
      if (error.response.status === 401) {
          if (user?.token) {
              localStorage.removeItem('User')
              router.push('/login')
          }
      }
      if (error.response.status === 402) {
          router.push('/payment-required')
      }
      if (error.response.status === 423) {
          router.push('/user-is-blocked')
      }
      if (error.response.status === 403) {
          notification.error('Нет доступа');
      }
      if (error.response.status) {
          let err = error?.response?.data?.errors?.[0] ?? error?.response?.data?.message ?? 'unhandled'
       //   notification.error(err);
      }

      return Promise.reject(error)
  }
)

export default httpClient
