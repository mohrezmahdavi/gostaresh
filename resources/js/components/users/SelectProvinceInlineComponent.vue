<template>
  <div class="row">
    <input type="hidden" name="country_id" id="" value="1" />
    <div class="form-group col-md-3">
      <label class="col-form-label" for="province_id">استان</label>
      <div class="">
        <select
          v-if="flag_province"
          name="province_id"
          class="form-control"
          id="province_id"
          v-model="province_selected"
        >
          <option selected value="">انتخاب کنید</option>
          <option
            v-for="province in provinces"
            :value="province.id"
            :key="province.id"
          >
            {{ province.name }}
          </option>
        </select>
        <select v-else class="form-control" id="province_id"></select>
      </div>
    </div>
    <div class="form-group col-md-3">
      <label class=" col-form-label" for="county_id">شهرستان</label>
      <div class="">
        <select
          v-if="flag_county"
          name="county_id"
          class="form-control"
          id="county_id"
          v-model="county_selected"
        >
          <option selected value="">انتخاب کنید</option>
          <option
            v-for="county in counties"
            :value="county.id"
            :key="county.id"
          >
            {{ county.name }}
          </option>
        </select>
        <select v-else class="form-control" id="county_id"></select>
      </div>
    </div>

    <div class="form-group col-md-3">
      <label class=" col-form-label" for="city_id">شهر</label>
      <div class="">
        <select
          v-if="flag_city"
          name="city_id"
          class="form-control"
          id="city_id"
          v-model="city_selected"
        >
          <option selected value="">انتخاب کنید</option>
          <option v-for="city in this.cities" :value="city.id" :key="city.id">
            {{ city.name }}
          </option>
        </select>
        <select v-else class="form-control" id="city_id"></select>
      </div>
    </div>

    <div class="form-group col-md-3">
      <label class="col-form-label" for="rural_district_id"
        >دهستان</label
      >
      <div class="">
        <select
          v-if="flag_rural_district"
          name="rural_district_id"
          class="form-control"
          id="rural_district_id"
          v-model="rural_district_selected"
        >
          <option selected value="">انتخاب کنید</option>
          <option
            v-for="rural_district in this.rural_districts"
            :value="rural_district.id"
            :key="rural_district.id"
          >
            {{ rural_district.name }}
          </option>
        </select>
        <select v-else class="form-control" id="rural_district_id"></select>
      </div>
    </div>
  </div>
</template>

<script>
import ProvinceService from "../../services/province";
import CountyService from "../../services/county";
import CityService from "../../services/city";
import RuralDistrictService from "../../services/rural-district";

export default {
  props: {
    province_default: {
      default: "",
    },
    county_default: {
      default: "",
    },
    city_default: {
      default: "",
    },
    rural_district_default: {
      default: "",
    },
  },
  data() {
    return {
      country_selected: 1,

      count_province_changed: 0,
      count_county_changed: 0,

      provinces: [],
      province_selected: "",
      flag_province: true,

      counties: [],
      county_selected: "",
      flag_county: true,

      cities: [],
      city_selected: "",
      flag_city: true,

      rural_districts: [],
      rural_district_selected: "",
      flag_rural_district: true,
    };
  },
  mounted() {
    ProvinceService.listProvinces().then((data) => {
      this.provinces = data.data;
    });

    if (this.province_default != "") {
      this.province_selected = this.province_default;
    }

    if (this.county_default != "") {
      this.county_selected = this.county_default;
    }

    if (this.city_default != "") {
      this.city_selected = this.city_default;
    }

    if (this.rural_district_default != "") {
      this.rural_district_selected = this.rural_district_default;
    }
  },
  watch: {
    province_selected(newValue) {
      if (this.count_province_changed != 0) {
        this.county_selected = "";
      }
      if(newValue != "")
      {
        CountyService.listCounties(newValue).then((data) => {
          this.counties = [];
          this.counties = data.data;
        });
      }
      this.count_province_changed++;
    },
    county_selected(newValue) {
      if (this.count_county_changed != 0) {
        this.city_selected = "";
        this.rural_district_selected = "";
        this.rural_districts = [];
        this.cities = [];
      }

      if (newValue != "") {
        CityService.listCities(newValue).then((data) => {
          this.cities = data.data;
        });
        RuralDistrictService.listRuralDistricts(newValue).then((data) => {
          this.rural_districts = data.data;
        });
      }

      this.count_county_changed++;
    },
  },
};
</script>
