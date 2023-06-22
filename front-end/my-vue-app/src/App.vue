<script >
import AppMain from './components/AppMain.vue';
import axios from 'axios';

export default{
  data(){
    return{
      tasks: [],
      newTask: "",
    };
  },
}
methods: {
  onSubmit() {

    const url = "http://localhost/php/tasks.php";
    const data = this.newTask;
    const headers = {
      headers: {'Content-Type': 'multipart/form-data'}
    };
    axios.post(url, data, headers)
      .then (response => {
        this.tasks = response.data;
        this.newTask = "";
      })
      .catch(error => console.error("error", error));
  }

},
mounted() {};

</script>

<template>
  <h1>To do List</h1>
  <div class="container">
    <!-- <div></div> v-for -->
  </div>
</template>

<style scoped>

</style>
