import axios from 'axios';

class CityService {
    async listCities(county_id = '') {
        return await this.fetchAsync(
            `/api/cities?county_id=${county_id}`) 
    }

    async getCityInfoById(id) {
        if (!id) throw new TypeError()
        return await this.fetchAsync(
            `/api/cities/${id}`)
    }

    async fetchAsync(url) {
        return axios.get(url)
            .then(response => response.data)
            .catch(error => console.log(error))
    }
}

export default new CityService();