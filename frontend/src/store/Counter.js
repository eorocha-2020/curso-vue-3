import {defineStore} from 'pinia';

const useCounter = defineStore('counter', {
    state:() => ({ count: 0, name:"Joao"}),
    getters:{
        getCounter(state) {
            return `Counter: ${state.count}`
        }
    },
    actions: {
        increment() {
            this.count++
        }
    }
})

export {useCounter};