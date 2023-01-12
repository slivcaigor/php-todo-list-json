<script>
// importo libreria axios per efettuare richieste HTTP
import axios from "axios";
// constante che contine l'URL con cui comunica il componente
const ApiUrl = "http://localhost/";

export default {
  data() {
    return {
      // restituisce un oggetto con i dati del componente
      newTodo: "",
      // array vuoto per contenere la lista dei todo restituita dal server
      todoList: [],
    };
  },
  methods: {
    // al invio del modulo da parte del utente
    formSubmit(e) {
      // previene la ricarica della pagina
      e.preventDefault();
      // viene creato un oggetto "params" utilizzato per passare i parametri alla richiesta get
      const params = {
        // un parametro "newTodo" con il valore di "this.newTodo", ovvero la proprietà del componente contenente il nuovo todo
        params: {
          newTodo: this.newTodo,
        },
      };

      // invia una richiesta GET al server all'URL specificato dalla costante "ApiUrl" più "TaskCreateApi.php" e passano i parametri definiti
      axios.get(ApiUrl + "TaskCreateApi.php", params).then(() => {
        // una volta che la richiesta è stata completata, richiama il metodo "getAllData" per recuperare la lista dei todo dal server
        this.getAllData();
      });
    },
    // metodo con un'altra richiesta GET per recuperare la lista dei todo
    getAllData() {
      axios.get(ApiUrl + "TaskReadApi.php").then((res) => {
        // assegna la proprietà "data" dell'oggetto "res" (che contiene la risposta del server) a una costante "data"
        const data = res.data;
        // assegna i dati restituiti dal server alla proprietà "todoList" del componente.
        this.todoList = data;
      });
    },
    // toggle che prende come parametro un elemento dell'elenco e inverte il valore della proprietà "completed
    toggleCompleted(todoElem) {
      todoElem.completed = !todoElem.completed;
    },
  },
  // la funzione viene chiamata quando il componente viene montato
  mounted() {
    // recupera la lista dei todo dal server una volta che il componente è montato
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
        @click="toggleCompleted(todoElem)"
        :class="{ taskCompleted: todoElem.completed }"
      >
        {{ todoElem.text }}
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
