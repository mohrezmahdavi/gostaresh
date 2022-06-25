<template>
  <div>
    <l-map
      @click="onMapClick"
      style="height: 300px"
      :zoom="zoom"
      :center="center"
    >
      <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
      <template v-if="markerLatLng != ''">
        <l-marker  :lat-lng="markerLatLng"></l-marker>
      </template>
      
    </l-map>
    <input type="hidden" name="latitude" :value="latitude" />
    <input type="hidden" name="longitude" :value="longitude" />
  </div>
</template>

<script>
import { latLng,Icon } from "leaflet";
import {
  LMap,
  LTileLayer,
  LMarker,
  LPopup,
  LTooltip,
  LIcon,
} from "vue2-leaflet";

delete Icon.Default.prototype._getIconUrl;
Icon.Default.mergeOptions({
  iconRetinaUrl: require('leaflet/dist/images/marker-icon-2x.png'),
  iconUrl: require('leaflet/dist/images/marker-icon.png'),
  shadowUrl: require('leaflet/dist/images/marker-shadow.png'),
});
import 'leaflet/dist/leaflet.css';


export default {
  components: {
    LMap,
    LTileLayer,
    LMarker,
    LPopup,
    LTooltip,
    LIcon,
  },
  props: {
    latitude_default: {
      default: "",
      type: Number,
    },
    longitude_default: {
      default: "",
      type: Number,
    },
  },
  data() {
    return {
      latitude: '',
      longitude: '',
      zoom: 5,
      center: latLng(35.69722, 51.40655),
      markerLatLng: '',
      url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
      attribution:
        '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
    };
  },
  mounted() {
    if (this.latitude_default != '' && this.longitude_default != '')
    {
      this.latitude = parseFloat(this.latitude_default);
      this.longitude = parseFloat(this.longitude_default);
      this.center = latLng(this.latitude, this.longitude);
      this.markerLatLng = latLng(this.latitude, this.longitude);

    }
  },
  methods: {
    onMapClick(l) {
    
        this.markerLatLng =  latLng(parseFloat(l.latlng.lat),parseFloat(l.latlng.lng))
        this.latitude = parseFloat(l.latlng.lat);
        this.longitude = parseFloat(l.latlng.lng);
      },
  },
};
</script>