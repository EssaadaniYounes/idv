import axios from 'axios';
const domaine = "http://127.0.0.1:8000/api/";
export default {
    methods: {
        async api(url, method, data) {
            const request_header =
            {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem('user_token')
            }
            data = !data ? {} : data;
            method = !method ? "get" : method;

            return await axios({
                method: method,
                url: domaine + url,
                data: data,
                headers: request_header
            })
        }
    }
}