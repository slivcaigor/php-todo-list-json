<script>
import axios from "axios";
const ApiUrl = "http://localhost/";

export default {
  data() {
    return {
      newTodo: "",
      todoList: [],
    };
  },
  methods: {
    toggleTaskCompleted(id) {
      axios
        .get(ApiUrl + "TaskCompletedApi.php?id=" + id)
        .then(() => {
          this.getAllData();
        })
        .catch((e) => {
          console.log(e);
        });
    },
    deleteTask(id) {
      axios
        .get(ApiUrl + "TaskDeleteApi.php?id=" + id)
        .then(() => {
          this.getAllData();
        })
        .catch((e) => {
          console.log(e);
        });
    },
    formSubmit(e) {
      e.preventDefault();
      const params = {
        params: {
          newTodo: this.newTodo,
        },
      };
      axios
        .get(ApiUrl + "TaskCreateApi.php", params)
        .then(() => {
          this.newTodo = "";
          this.getAllData();
        })
        .catch((e) => {
          console.log(e);
        });
    },
    getAllData() {
      axios
        .get(ApiUrl + "TaskReadApi.php")
        .then((res) => {
          const data = res.data;
          this.todoList = data;
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
  mounted() {
    this.getAllData();
  },
};
</script>

<template>
  <div>
    <h1>Ciao Mondo</h1>
    <ul>
      <li
        v-for="(todoElem, ind) in todoList"
        :key="ind"
        :class="{ taskCompleted: todoElem.completed }"
        @click="toggleTaskCompleted(todoElem.id)"
      >
        {{ todoElem.text }}
        <button @click="deleteTask(todoElem.id)">Elimina</button>
      </li>
    </ul>
    <form @submit="formSubmit">
      <input type="text" name="newTodo" v-model="newTodo" />
      <input type="submit" value="CREATE" />
    </form>
  </div>
</template>

<style lang="scss" scoped>
@use "../styles/general.scss" as *;
@use "../styles/partials/mixins" as *;
@use "../styles/partials/variables" as *;

.taskCompleted {
  text-decoration: line-through;
}

h1 {
  color: #888;
  font-size: 100px;
}

h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
  cursor: pointer;
}
a {
  color: #42b983;
}
</style>
