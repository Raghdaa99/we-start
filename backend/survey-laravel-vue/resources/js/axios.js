import axios from 'axios';
import { useStore } from './stores';

const axiosClient = axios.create({
    baseURL:'http://127.0.0.1:8000/api',
})

axiosClient.interceptors.request.use(function (config) {
    // Do something before request is sent
    //every reguest from axios client , it will pass authorization token
    config.headers.Authorization  = `Bearer ${useStore().user.token}`
    return config;
  })

axiosClient.interceptors.response.use(response => {
    return response;
  }, error => {
    if (error.response.status === 401) {
      sessionStorage.removeItem('TOKEN')
      router.push({name: 'Login'})
    } else if (error.response.status === 404) {
      router.push({name: 'NotFound'})
    }
    return error;
  })

export default axiosClient
