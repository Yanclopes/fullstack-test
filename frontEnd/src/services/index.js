import axios from "axios";

const http = axios.create({
    baseURL: 'https://localhost:8000/api/',
    headers: {
        'Content-Type': 'application/json',
    },
});