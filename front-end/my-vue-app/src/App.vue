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
      updatedTask: "",
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
          this.newTask.completed = false;
        })
        .catch(error => console.error("error", error));
    },
    onClick(index){
      const url = "http://localhost/quarto esercizio/php-todo-list-json/php/taskCompleted.php";
      // console.log(this.updatedTask);
      console.log(index);
      const headers = {
        headers: {'Content-Type': 'multipart/form-data'}
      };
      axios.post(url, index, headers)
        .then (response => {
              this.tasks = response.data;
              console.log(response);
            })
          .catch(error => console.error("error", error));
      // if (this.tasks[index].completed){
        
      //   this.tasks[index].completed = false;
      //   this.updatedTask = this.tasks[index].completed;
      //   axios.post(url, this.updatedTask, headers)
      //     // .then (response => {
      //     //   this.tasks = response.data;
      //     // })
      //     .catch(error => console.error("error", error));
      // }
      // else{
      //   this.tasks[index].completed = true;
      //   this.updatedTask = this.tasks[index].completed;
      //   axios.post(url, this.updatedTask, headers)
      //   .catch(error => console.error("error", error));
      // }
      // console.log(this.updatedTask);
      
    },
    onClickDelete(index) {
      console.log(index, "indice");
      const url = "http://localhost/quarto esercizio/php-todo-list-json/php/deleteTask.php";

      const data = {"index": index}
      const headers = {
        headers: {'Content-Type': 'multipart/form-data'}
      };
      axios.post(url, data, headers)
        .then (response => {

          const data = response.data;
          this.tasks = data;

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
      <div class="flex" v-if="task.completed === true">
        <span v-if="task.completed === true" class="task-completed" @click="onClick(index)">{{ task.name }}</span>
        <div class="img-container"><img @click="onClickDelete(index)" src="trash-can-solid.svg" alt=""></div>
      </div>
      <div class="flex" v-else> 
        <span @click="onClick(index)">{{ task.name }}</span> 
        <div class="img-container"><img @click="onClickDelete(index)" src="trash-can-solid.svg" alt=""></div>
      </div>
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
.task-completed{
  text-decoration: line-through;
}
span{
  cursor: pointer;
}
.img-container{
  width: 25px;
  height: 25px;
}

img{
  width: 100%;
  height: 100%;
  cursor: pointer;
}
.flex{
  display: flex;
  justify-content: space-between;
}
</style>
