import {reactive, onMounted} from "vue";
import https from '@/services/https.js'
export function useUsers() {
    const users = reactive({'users':[]})

    onMounted(async () => {
        users['users'] = await getUsers();
    })
    async function getUsers() {
        try {
            const {data} = await https.get('/api/users')
            return data;
        } catch (e) {
            console.log(e)
        }
    }

    return {users};
}