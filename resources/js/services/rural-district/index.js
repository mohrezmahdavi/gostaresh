import axios from 'axios';

class RuralDistrictService {
    async listRuralDistricts(county_id = '') {
        return await this.fetchAsync(
            `/api/ruraldistricts?county_id=${county_id}`) 
    }

    async getRuralDistrictInfoById(id) {
        if (!id) throw new TypeError()
        return await this.fetchAsync(
            `/api/ruraldistricts${id}`)
    }

    async fetchAsync(url) {
        return axios.get(url)
            .then(response => response.data)
            .catch(error => console.log(error))
    }
}

export default new RuralDistrictService();