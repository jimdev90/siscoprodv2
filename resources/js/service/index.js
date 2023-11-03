import axios from 'axios';

export default (host_url) => {
    const options = {};
    options.baseURL = `${host_url}/api`;
    options.headers = {
        'accept': 'application/json',
    }
    const instance = axios.create(options);
    return instance;
}
