import {defineStore} from "pinia";

export const useStore = defineStore({
    id: 'store',
    state: () => ({
        user: {
            data: {},
            token: sessionStorage.getItem('TOKEN'),
        },
        questionTypes: ["text", "select", "radio", "checkbox", "textarea"]

    }),
    getters: {
        getQuestionTypes: (state) => state.questionTypes
    },
    actions: {
        setUser(data) {
            this.user.data = data.user
            this.user.token = data.token
            sessionStorage.setItem('TOKEN', data.token)
        },
        logout(){
            this.user.data = {};
            this.user.token = null;
            sessionStorage.removeItem('TOKEN');
        },

    }
})
