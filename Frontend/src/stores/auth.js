import router from '@/router'
import { defineStore } from 'pinia'

export const useAuthStore = defineStore('authStore', {
  state: () => {
    return {
      user: null,
      errors: {},
    }
  },
  actions: {
    //Get auth User (get user in local storage if there is a token) for our Authentication

    async getUser() {
      const token = localStorage.getItem('token')
      if (!token) {
        this.user = null
        return
      }

      const res = await fetch('/api/user', {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      })
      const data = await res.json()
      if (res.ok) {
        this.user = data
      } else {
        this.user = null
      }
    },

    // login or register user
    async authenticate(apiRoute, formData) {
      const res = await fetch(`/api/${apiRoute}`, {
        method: 'post',
        body: JSON.stringify(formData),
      })

      const data = await res.json()
      if (data.errors) {
        this.errors = data.errors
      } else {
        this.errors = {}
        localStorage.setItem('token', data.token)
        this.user = data.user
        // redirect
        router.push({ name: 'home' })
      }
    },

    // Logout user
    async Logout() {
      const res = await fetch('/api/logout', {
        method: 'post',
        headers: {
          authorization: `bearer ${localStorage.getItem('token')}`,
        },
      })
      const data = await res.json()

      if (res.ok) {
        this.user = null
        this.errors = {}
        localStorage.removeItem('token')
        router.push({ name: 'home' })
        // redirect after logging out
      }
    },
  },
})
