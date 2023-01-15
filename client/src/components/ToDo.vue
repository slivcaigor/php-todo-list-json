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
          console.e(e);
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
      if (!this.newTodo) {
        alert("Inserisci una task");
        return;
      }
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
  <section>
    <div class="ms_header p-5 d-flex justify-content-end">
      <img
        data-bs-toggle="modal"
        data-bs-target="#staticBackdrop"
        src="../assets/plus.png"
      />
    </div>
    <div class="ms_main">
      <div class="row gap-3">
        <div
          v-for="(todoElem, ind) in todoList"
          :key="ind"
          class="card p-2 col-4"
        >
          <div class="card-body">
            <div class="ms_card-header d-flex justify-content-between pb-3">
              <h5
                :class="{ taskCompleted: todoElem.completed }"
                class="card-title fs-4"
              >
                {{ todoElem.text }}
              </h5>

              <div class="dropdown">
                <img
                  aria-expanded="false"
                  data-bs-toggle="dropdown"
                  src="../assets/settings.png"
                />
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Edit...</a></li>
                  <li>
                    <a
                      @click="deleteTask(todoElem.id)"
                      class="dropdown-item"
                      href="#"
                      >Delete</a
                    >
                  </li>
                </ul>
              </div>
            </div>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Reprehenderit est, similique quis quo sint voluptas corrupti
              explicabo aperiam laborum distinctio rerum a inventore tempore
              repellendus ut qui id deleniti obcaecati!
            </p>
          </div>
          <div
            class="card-footer d-flex justify-content-between align-items-center"
          >
            <small class="text-muted gap-2 d-flex">
              <img src="../assets/work.png" />
              <img src="../assets/study.png" />
            </small>
            <div class="form-check d-flex align-items-center">
              <input
                @click="toggleTaskCompleted(todoElem.id)"
                class="form-check-input fs-5"
                type="checkbox"
                value=""
                id="flexCheckDefault"
              />
              <label class="form-check-label" for="flexCheckDefault">
                <h6>Done</h6>
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ms_modal">
      <!-- Modal -->
      <div
        class="modal fade"
        id="staticBackdrop"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h6
                class="modal-title fs-5"
                id="staticBackdropLabel"
                data-bs-dismiss="modal"
                aria-label="Close"
              >
                Cancel
              </h6>
              <h5 class="px-4 py-2 rounded-3" @click="formSubmit">Add</h5>
            </div>
            <!-- <div
              class="ms_task-alert d-flex justify-content-center align-items-center"
            >
              <p>Inserisci una task</p>
            </div> -->
            <div class="modal-body">
              <h4>Title</h4>
              <div class="input-group input-group mb-3">
                <input
                  placeholder="add a title..."
                  type="text"
                  class="form-control"
                  name="newTodo"
                  v-model="newTodo"
                  aria-label="Sizing example input"
                  aria-describedby="inputGroup-sizing-sm"
                />
              </div>

              <h4>Description</h4>
              <div class="input-group">
                <textarea
                  placeholder="add a description..."
                  class="form-control"
                  aria-label="With textarea"
                ></textarea>
              </div>

              <div class="pt-3">
                <h4>Tags</h4>
                <ul
                  class="d-flex ms_tags justify-content-between align-items-center"
                >
                  <li>
                    <img src="../assets/work.png" />
                    work
                  </li>
                  <li>
                    <img src="../assets/study.png" />
                    study
                  </li>
                  <li>
                    <img src="../assets/entertainment.png" />
                    entertainment
                  </li>
                  <li>
                    <img src="../assets/family.png" />
                    family
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped>
@use "../styles/general.scss" as *;
@use "../styles/partials/mixins" as *;
@use "../styles/partials/variables" as *;

section {
  width: 250px;
  height: 100vh;

  .ms_modal {
    .modal-content {
      padding: 15px;
      .ms_task-alert {
        background-color: $tags_fourth;
        border-radius: 8px;
        height: 50px;
        font-size: 17px;
      }
      .modal-header {
        border-bottom: none !important;
        h5 {
          background-color: $font_first;
          color: $outline;
          font-size: 17px;
          cursor: pointer;
        }
        h6 {
          cursor: pointer;
        }
      }

      .modal-body {
        .ms_tags {
          padding-top: 5px;
          img {
            width: 25px;
          }

          li {
            margin: 0 !important;
            padding: 10px;
            &:hover {
              background-color: #f9f9f8;
            }
          }
        }
        .form-control {
          background-color: #f9f9f8;
          border: 1px solid transparent !important;

          &:focus {
            background-color: #f9f9f8 !important;
            border-color: transparent !important;
            box-shadow: none !important;
          }
        }
        h4 {
          color: $font_first;
          font-size: 22px;
          padding-bottom: 5px;
        }
      }
      .modal-footer {
        border-top: none !important;
      }
    }
  }

  .ms_main {
    overflow: hidden;
    overflow-y: scroll;
    padding: 0px 50px;
    padding-top: 20px;
    height: calc(100vh - 200px);

    .dropdown {
      .dropdown-item:hover {
        background-color: transparent !important;
      }
      li[data-v-f7390aeb] {
        margin: 0 !important;
        width: 100%;
        &:first-child {
          border-bottom: 1px solid $font_second;
        }
      }
      a[data-v-f7390aeb] {
        color: $font_second !important;
      }
      .dropdown-item:active {
        color: $font_second !important;
      }
      .dropdown-menu.show {
        transform: translate(0px, 27px) !important;
      }

      .dropdown-menu {
        --bs-dropdown-link-active-color: $font_second !important;
        --bs-dropdown-link-active-bg: $font_second !important;
      }
    }
    .card-text {
      padding-bottom: 16px;
    }
    .col-4 {
      width: calc(100% / 3 - 11px) !important;
    }
    .ms_card-header {
      img {
        width: 35px;
        cursor: pointer;
      }
    }
    .card-footer {
      background-color: transparent !important;
      img {
        width: 35px;
      }
      .form-check {
        h6 {
          color: $font_first;
        }
      }
      .form-check-input {
        margin-top: 0 !important;
        margin-left: 0 !important;
        margin-right: 3px;
        cursor: pointer;
        background-color: transparent !important;
      }
      .form-check-input:active {
        filter: none !important;
      }
      .form-check-input:focus {
        border-color: $font_second !important;
        box-shadow: none !important;
      }
      .form-check-input:checked[type="checkbox"] {
        background-image: url(../assets/spunta.png) !important;
      }
      .form-check-input:checked {
        background-color: transparent !important;
        border-color: $font_second !important;
      }
    }

    .card {
      --bs-card-border-color: none !important;
      --bs-card-bg: #fff9de !important;
    }
  }
  .ms_header {
    img {
      width: 50px;
      cursor: pointer;
    }
  }
}

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
