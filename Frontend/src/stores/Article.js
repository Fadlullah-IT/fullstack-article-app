import router from '@/router'
import { defineStore } from 'pinia'
import { useAuthStore } from './auth'

export const useArticleStore = defineStore('articleStore', {
  state: () => {
    return {
      errors: {},
    }
  },
  // Now the action will perform the function for our crud operation

  actions: {
    /*******************Get all Articles*******************/
    async getAllArticles() {
      const res = await fetch(`/api/articles`)
      const data = await res.json()
      return data
    },

    /*******************Get an Article*******************/
    async getArticle(article) {
      const res = await fetch(`/api/articles/${article}`)
      const data = await res.json()
      return data.article
    },

    /*******************Create an Article*******************/
    async createArticle(formData) {
      const res = await fetch('/api/articles', {
        method: 'POST',
        headers: {
          authorization: `bearer ${localStorage.getItem('token')}`,
        },
        body: JSON.stringify(formData),
      })
      const data = await res.json()
      if (data.errors) {
        this.errors = data.errors
      } else {
        router.push({ name: 'home' })
      }
    },

    /*******************Delete an Article*******************/
    async deleteArticle(article) {
      const authStore = useAuthStore()
      if (authStore.user.id === article.user.id) {
        const res = await fetch(`/api/articles/${article.id}`, {
          method: 'delete',
          headers: {
            Authorization: `Bearer ${localStorage.getItem('token')}`,
          },
        })
        const data = await res.json()
        if (res.ok) {
          router.push({ name: 'home' })
        }
        console.log(data)
      }
    },

    /*****************Update an Article*******************/
    async updateArticle(article, formData) {
      const authStore = useAuthStore()
      if (authStore.user.id === article.user.id) {
        const res = await fetch(`/api/articles/${article.id}`, {
          method: 'put',
          headers: {
            Authorization: `Bearer ${localStorage.getItem('token')}`,
          },
          body: JSON.stringify(formData),
        })
        const data = await res.json()
        if (data.errors) {
          this.errors = data.errors
        } else {
          router.push({ name: 'home' })
          this.errors = {}
        }
      }
    },
  },
})
