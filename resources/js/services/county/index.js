import axios from 'axios';

class CountyService {
    async listCounties(province_id = '', zone_id = '') {
        return await this.fetchAsync(
            `/api/counties?province_id=${province_id}&zone_id=${zone_id}`)
    }

    async getCountyInfoById(id) {
        if (!id) throw new TypeError()
        return await this.fetchAsync(
            `/api/counties/${id}`)
    }

    async fetchAsync(url) {
        return axios.get(url)
            .then(response => response.data)
            .catch(error => console.log(error))
    }
}

export default new CountyService();
