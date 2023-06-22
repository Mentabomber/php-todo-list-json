<script >
import AppMain from './components/AppMain.vue';
import axios from 'axios';

export default{
  data(){
    return{
      tasks: [],
      newTask: {
        name: "",
        completed : false
      },
    };
  },
  methods: {
    
    onSubmit() {

      const url = "http://localhost/quarto esercizio/php-todo-list-json/php/postTask.php";
      const data = this.newTask;
      const headers = {
        headers: {'Content-Type': 'multipart/form-data'}
      };
      axios.post(url, data, headers)
        .then (response => {
          this.tasks = response.data;
          this.newTask.name = "";
        })
        .catch(error => console.error("error", error));
    }

  },
  mounted() {
    axios.get('http://localhost/quarto esercizio/php-todo-list-json/php/index.php')
      .then(response => {
        this.tasks = response.data;
      });
  }
}
</script>

<template>
  <h1>To do List</h1>
  <div class="container">
    <div v-for="(task, index) in this.tasks"
    :key="index">
      <span>{{ task.name }}</span>
    </div> 
  </div>
  <form @submit.prevent="onSubmit">
      <label for="task">task </label>
      <input type="text" name="task" id="task" v-model="newTask.name">
      <br />
      <input type="submit" value="CREATE NEW Task">
    </form>
</template>

<style scoped>

</style>
