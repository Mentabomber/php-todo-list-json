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
  mounted() {
    axios.get('http//localhost/php/index.php')
      .then(response => {
        this.tasks = response.data;
      });
  }
}
</script>

<template>
  <h1>To do List</h1>
  <div class="container">
    <div v-for="task in tasks">
      <span>{{ task }}</span>
    </div> 
  </div>
  <form @submit.prevent="onSubmit">
      <label for="task">task </label>
      <input type="text" name="task" id="task" v-model="newTask">
      <br />
      <input type="submit" value="CREATE NEW Task">
    </form>
</template>

<style scoped>

</style>
