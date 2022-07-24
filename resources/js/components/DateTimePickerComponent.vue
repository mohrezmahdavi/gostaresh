<template>
  <div>
    <date-picker
      v-model="date"
      format="YYYY-MM-DD HH:mm:ss"
      displayFormat="HH:mm:ss jYYYY-jMM-jDD"
      type="datetime"
      color="#009688"
      inputClass= 'form-control'
    ></date-picker>

    <input type="hidden" :name="name" :value="date">
  </div>
</template>

<script>
import VuePersianDatetimePicker from "vue-persian-datetime-picker";

export default {
  components: {
    datePicker: VuePersianDatetimePicker,
  },
  props: ['name','default_date'],
  created() {
    this.date = this.default_date;
  },
  data() {
    return {
      date: "",
    };
  },
};
</script>