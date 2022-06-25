import axios from 'axios';

class ProvinceService {
    async listProvinces() {
        return await this.fetchAsync(
            `/api/provinces`) 
    }

    async getProvinceInfoById(id) {
        if (!id) throw new TypeError()
        return await this.fetchAsync(
            `/api/provinces/${id}`)
    }

    async fetchAsync(url) {
        return axios.get(url)
            .then(response => response.data)
            .catch(error => console.log(error))
    }
}

export default new ProvinceService();
