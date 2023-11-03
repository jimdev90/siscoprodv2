import axios from 'axios';

const routesApi =  (host_url) => {
    const options = {};
    options.baseURL = `${host_url}/api`;
    options.headers = {
        'accept': 'application/json',
    }
    const instance = axios.create(options);
    return instance;
}

const routesApp =  (host_url) => {
    const options = {};
    options.baseURL = `${host_url}`;
    options.headers = {
        'accept': 'application/json',
    }
    const instance = axios.create(options);
    return instance;
}

export {
    routesApi,
    routesApp
}
