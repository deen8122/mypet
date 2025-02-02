export const baseRoutes = [
    {
        meta: {
            title: "Main",
        },
        path: "/",
        name: "home",
        component: () => import("@/views/HomeView.vue"),
    },
  {
    meta: {
      title: "RabbitMQ",
    },
    path: "/RabbitMQ",
    name: "RabbitMQ",
    component: () => import("@/views/RabbitMQ.vue"),
  },
    {
        meta: {
            title: "Test",
        },
        path: "/test",
        name: "test",
        component: () => import("@/views/Test.vue"),
    }
]
